function selectText(node)
{
    if (document.body.createTextRange) {
        const range = document.body.createTextRange();
        range.moveToElementText(node);
        range.select();
    } else if (window.getSelection) {
        const selection = window.getSelection();
        const range = document.createRange();
        range.selectNodeContents(node);
        selection.removeAllRanges();
        selection.addRange(range);
    } else {
        console.warn("Could not select text in node: Unsupported browser.");
    }            
}

let pageItemNumber = 0
function addPage()
{
    $("tbody").append("<tr>"+
        "<td class=nodetest1 onkeydown='cycleInputPosition(event, this)' contenteditable=true>" + "content" +  "</td>"+
        "<td class=nodetest2 onkeydown='cycleInputPosition(event, this)' contenteditable=true>" + "content" +  "</td>"+
        "<td class=nodetest3 onkeydown='cycleInputPosition(event, this)' contenteditable=true>" + "content" +  "</td>"+
        "<td class=nodetest4 onkeydown='cycleInputPosition(event, this)' contenteditable=true>" + "content" +  "</td>"+
    "</tr>")
    selectText(document.querySelectorAll(".nodetest1")[pageItemNumber])
    pageItemNumber++
}
function requestCreatePage(pageToAdd)
{
    $.ajax({
        url: `/gamestation/admin/viewGen.php`,
        type: "POST",
        contentType: "application/x-www-form-urlencoded",
        data: "pageAdded=" + pageToAdd
    })
}
function cycleInputPosition(ev, node)
{
    if (ev.key == "Enter" && node.nextElementSibling != null)
    {
        node.nextElementSibling.focus()
        ev.preventDefault()
        selectText(node.nextElementSibling)
    }
    if (ev.key == "Enter" && node.nextElementSibling == null)
    {
        node.blur()
        $("tbody tr td").attr("contenteditable", "false")
        requestCreatePage(document.querySelectorAll(".nodetest1")[pageItemNumber - 1].innerHTML)
    }
}
function requestRemovePage(pageToRemove)
{
    let fileNameToDelete = {pageRemoved: pageToRemove}
    
    $.ajax({
        url: `/gamestation/admin/viewGen.php`,
        type: "DELETE",
        // make json data as server php cannot use super global like $_POST to get data
        // data: "{'pageRemoved':" + pageToRemove + "}"
        data: JSON.stringify(fileNameToDelete)
    })
}