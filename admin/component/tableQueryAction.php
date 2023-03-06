<div id="tableQueryAction.php" style="position: sticky; top:0; left: 170px; width: calc(100% - 170px); height: 25%;">
    <div class="grid-control" style="margin:15px;">
        <button id="addTableRowButton" type="button" class="btn btn-dark">Add New Row</button>
        <button id="removeTableRowButton"  type="button" class="btn btn-dark">Remove Row</button>
    </div>
</div>
<script>
    class rowEditor {
        static updateRow = (e, postData) => {
            let tableRow = e.target.parentNode.parentNode

            $(tableRow).find("input").each((index, cell) => {
                postData.push(cell.value)
                cell.parentNode.innerText = cell.value
                cell.remove()
            })
            if (postData.length < 1) {
                console.log("failed to get user input row data, unable to update row into database table")
                tableRow.remove()
                return
            }

            let xhr = new XMLHttpRequest();
            xhr.open("POST", "/admin/component/updateapi.php", true)
            xhr.setRequestHeader("Content-Type", "application/json")
            xhr.onreadystatechange = () => {
                if (xhr.readyState == 4 && xhr.status == 200)
                    console.log("successfully post request for /admin/component/updatenewsApi.php")
            }

            let currentTableName = $(".sidebar-frame a[data-isclicked=true]").text()
            let tableData = {tableName: currentTableName, postData: postData}
            xhr.send(JSON.stringify(tableData))
        }
        static getinputCopyNode = (postData) => {
            let rowCellInputNode = document.createElement("input")
            let rowCellNode = document.createElement("td")

            rowCellNode.appendChild(rowCellInputNode)

            rowCellInputNode.addEventListener("keyup", (e) => {
                if (e.keyCode === 13)
                    rowEditor.updateRow(e, postData)
            })

            return rowCellNode
        }
        static addNewRow = () => {
            const tableRowSum = $("#tableItemsContainer").children().length
            const tableCellSum = $("#tableItemsContainer tr:last-child").children().length
            let rowCellRowNode = document.createElement("tr")
            let rowCellNode = document.createElement("td")

            let postData = []
            for (let i=0;i<tableCellSum;i++) {
                let inputCopyNode = rowEditor.getinputCopyNode(postData)
                rowCellRowNode.appendChild(inputCopyNode)
            }
            
            $("#tableItemsContainer").append(rowCellRowNode)
        }
        static removeRow = () => {}
        static selectAllRow = (eventNode) => {
            if (!eventNode.target.checked) {
                $(".item-checkbox").prop("checked", false)
                $(".item-checkbox").attr("style", "display: none")
                return
            }
            $(".item-checkbox").prop("checked", true)
            $(".item-checkbox").attr("style", "display: inline-block")
        }
    }
    $('#tableDisplayer').ready(() => {
        $("#addTableRowButton").on("click", rowEditor.addNewRow)
        $("#removeTableRowButton").on("click", rowEditor.removeRow)
        $("#selectall-checkbox").on("click", rowEditor.selectAllRow)
    })
</script>
