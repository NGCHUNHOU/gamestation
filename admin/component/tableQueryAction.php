<div id="tableQueryAction.php" style="position: sticky; top:0; left: 170px; width: calc(100% - 170px); height: 25%;">
    <div class="grid-control" style="margin:15px;">
        <button id="addTableRowButton" type="button" class="btn btn-dark">Add New Row</button>
        <button id="removeTableRowButton"  type="button" class="btn btn-dark">Remove Row</button>
    </div>
</div>
<script>
    function tablePostStructure() {
        this.selectedRows = []
        this.postData = []
        this.tableName = ""
        this.postType = ""
        this.tablename = ""
        this.init = (PostData = [], hasCheckbox = true) => {
            this.tableName = $(".sidebar-frame a[data-isclicked=true]").text()
            this.postData = PostData
            this.postType = "insert"

            if (hasCheckbox) {
                // post data without checkbox
                this.postData.shift()
            }
        }
        this.initRows = (indexes = []) => {
            this.tableName = $(".sidebar-frame a[data-isclicked=true]").text()
            this.selectedRows = indexes
            this.postType = "delete"
        }
    }

    let postPayload = new tablePostStructure("", [])
    
    class rowEditor {
        static getCheckbox = (node) => {
            let checkbox = $(node.target).siblings("td:first").children().first()
            if (checkbox.length == 0)
                checkbox = $(node.target).children().first()

            return checkbox
        }
        static addRowCheckboxEdit = (e) => {
            let checkbox = rowEditor.getCheckbox(e)
            checkbox.css("display", "inline-block")
        }
        static removeRowCheckboxEdit = (e) => {
            let checkbox = rowEditor.getCheckbox(e)
            if (!checkbox.prop("checked"))
                checkbox.css("display", "none")
        }
        static postRequest = (tableData, hasCheckbox = true) => {
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "/admin/component/updateapi.php", true)
            xhr.setRequestHeader("Content-Type", "application/json")
            xhr.onreadystatechange = () => {
                if (xhr.readyState == 4 && xhr.status == 200)
                    console.log("successfully post request for /admin/component/updatenewsApi.php")
            }

            xhr.send(JSON.stringify(tableData))
        }
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

            postPayload.init(postData)
            rowEditor.postRequest(postPayload)
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
        static removeRow = (e) => {
            let checkboxes = $("#tableItemsContainer tr td:first-child input:checked")
            let rowIndexes = []
            checkboxes.parent().next().each((index, checkedRowindex) => {
                rowIndexes.push($(checkedRowindex).text())
            })
            
            postPayload.initRows(rowIndexes)
            rowEditor.postRequest(postPayload)

            let selectedRows = checkboxes.parent().parent()
            // to do: check if post request is ok
            selectedRows.remove()
        }
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
        $("#tableItemsContainer tr").on("mouseenter", rowEditor.addRowCheckboxEdit)
        $("#tableItemsContainer tr").on("mouseleave", rowEditor.removeRowCheckboxEdit)
    })
</script>
