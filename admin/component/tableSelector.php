<?php 
    if (isset($_POST["tableName"])) {
        header("Content-Type: application/json");

        require_once $_SERVER['DOCUMENT_ROOT'] .'/envCenter.php';
        \envCenter::loadFile("admin/component/tableDisplayer.php");
        $obj = new tableDisplayer($_POST["tableName"]);
        $tableData = $obj->getTableData();
        $obj->deleteTableData();

        // clean up number string index so clientSide thread wont get number column index
        for ($i=0;$i<count($tableData);$i++) {
            for ($j=0;$j<count($tableData[$i]);$j++) {
                unset($tableData[$i][$j]);
            }
        }
        echo json_encode($tableData);
        exit;
    }
?>

<script>
    function objectPool() {
        this.data = {}
        this.limitPoolSize = (size) => {
            if (Object.keys(this.data).length > size) {
                console.log("pool size is overflowing, reset back to zero")
                this.data = {}
            }
        }
        this.getData = (tableName) => {
            if (this.data[tableName] != undefined)
                return this.data[tableName]
            return null
        }
        this.returnResource = (obj, tableName) => {
            this.data[tableName] = obj
        }
    }

    let pool = new objectPool()
    let poolSize = 5

    function passPostRequest(tableName) {
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "/admin/component/tableSelector.php", true)
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded")
        xhr.onreadystatechange = () => {
            pool.limitPoolSize(poolSize)
            if (xhr.readyState == 4 && xhr.status == 200) {
                let data = pool.getData(tableName)
                if (data == null) {
                    console.log("successfully post, toggling table")
                    data = JSON.parse(xhr.responseText)
                }
                pool.returnResource(data, tableName)

                $("#tableColumnsContainer tr").empty()
                $("#tableItemsContainer").empty()

                for (const [key, value] of Object.entries(data[0])) {
                    $("#tableColumnsContainer tr").append(`<th scope='col'>${key}</th>`)
                }
                for (let i=0;i<data.length;i++) {
                    $("#tableItemsContainer").append(`<tr id='${i}'></tr>`)
                    for (const [index, [key, value]] of Object.entries(Object.entries(data[i]))) {
                        $(`#tableItemsContainer tr#${i}`).append(`<td>${value}</td>`)
                    }
                }
            }
        }
        xhr.send(`tableName=${tableName}`)
    }

    [].slice.call(document.querySelector(".sidebar-frame").children).forEach((table) => {
        $(table).on("click", (e) => {
            // to prevent duplicate post requests
            if (e.target.getAttribute("data-isclicked") == "true")
                return

            passPostRequest(e.target.id)

            $(".sidebar-frame a").attr("data-isclicked", "false")
            e.target.setAttribute("data-isclicked", "true")
        }) 
    })
</script>