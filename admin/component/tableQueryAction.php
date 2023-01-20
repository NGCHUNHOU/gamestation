<div id="tableQueryAction.php" style="position: sticky; top:0; left: 170px; width: calc(100% - 170px); height: 25%;">
    <div class="grid-control" style="margin:15px;">
        <button id="addTableRowButton" type="button" class="btn btn-dark">Add New Row</button>
        <button id="removeTableRowButton"  type="button" class="btn btn-dark">Remove Row</button>
    </div>
</div>
<script>
    class rowEditor {
        static updateRow = (e) => {
            let tableRow = e.target.parentNode.parentNode

            // some code here to update table row by sqlite driver

            e.target.parentNode.innerText = e.target.value
            $(tableRow).find("input").remove()
        }
        static getinputCopyNode = () => {
            let rowCellInputNode = document.createElement("input")
            let rowCellNode = document.createElement("td")

            rowCellNode.appendChild(rowCellInputNode)

            // some code for focus or click event for input fields to allow multiple values update

            rowCellInputNode.addEventListener("keyup", (e) => {
                if (e.keyCode === 13)
                    rowEditor.updateRow(e)
            })

            return rowCellNode
        }
        static addNewRow = () => {
            const tableRowSum = $("#tableItemsContainer").children().length
            const tableCellSum = $("#tableItemsContainer tr:last-child").children().length
            let rowCellRowNode = document.createElement("tr")
            let rowCellNode = document.createElement("td")

            for (let i=0;i<tableCellSum;i++) {
                let inputCopyNode = rowEditor.getinputCopyNode()
                rowCellRowNode.appendChild(inputCopyNode)
            }
            
            $("#tableItemsContainer").append(rowCellRowNode)
        }
        static removeRow = () => {}
    }
    $('#tableDisplayer').ready(() => {
        $("#addTableRowButton").on("click", rowEditor.addNewRow)
        $("#removeTableRowButton").on("click", rowEditor.removeRow)
    })
</script>
