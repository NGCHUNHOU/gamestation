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
function requestCreatePage(pageToAdd, description, path, keyword)
{
    let actionPages = [`/gamestation/admin/viewGen.php`, `/gamestation/admin/view/component/pages.php`];
    actionPages.forEach(actionPage => {
        $.ajax({
            url: actionPage,
            type: "POST",
            contentType: "application/x-www-form-urlencoded",
            data: "pageAdded=" + pageToAdd + "&description=" + description + "&path=" + path + "&keyword=" + keyword
        })
    });
}
// class pageStatus
// {
//     constructor(pageName, pagePath)
//     {
//         this.pageName = pageName
//         this.pagePath = pagePath
//         this.statusCode = null
//         this.checkPageFileExists(this.pageName, this.pagePath)
//     }
//     checkPageFileExists(pageName, pagePath)
//     {
//      $.ajax(
//         {
//             url: pagePath + "/" + pageName,
//             type: "GET",
//             contentType: "application/x-www-form-urlencoded",
//             success: (data,textStatus, xhr) => {
//                 self.statusCode = xhr.status
//             }
//         })
//     }
//     testing()
//     {
//         this.statusCode = 999
//     }
// }
function checkPageFileExistsAndReload(pageName, pagePath)
{
     $.ajax(
        {
            url: pagePath + "/" + pageName,
            type: "GET",
            contentType: "application/x-www-form-urlencoded",
            success: (data,textStatus, xhr) => {
                console.log(xhr.status)
                if (xhr.status === 200)
                {
                    window.location.reload()
                }
                else 
                {
                    return false
                }
            },
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
    if (ev.key == "Tab" && node.nextElementSibling != null)
    {
        node.nextElementSibling.focus()
        ev.preventDefault()
        selectText(node.nextElementSibling)
    }
    if (ev.key == "Enter" && node.nextElementSibling == null)
    {
        node.blur()
        $("tbody tr td").attr("contenteditable", "false")
        requestCreatePage(document.querySelectorAll(".nodetest1")[pageItemNumber - 1].innerHTML, 
                          document.querySelectorAll(".nodetest2")[pageItemNumber - 1].innerHTML,
                          document.querySelectorAll(".nodetest3")[pageItemNumber - 1].innerHTML,
                          document.querySelectorAll(".nodetest4")[pageItemNumber - 1].innerHTML,
        )
        checkPageFileExistsAndReload(document.querySelectorAll(".nodetest1")[pageItemNumber - 1].innerHTML, document.querySelectorAll(".nodetest3")[pageItemNumber - 1].innerHTML)
    }
}
function requestRemovePage(nodeList)
{
    let fileToDeleteArray = []
    for (let i = 0; i < nodeList.length; i++) {
        if (nodeList[i] !== undefined)
        {
            fileToDeleteArray.push({
                pageRemove: nodeList[i].nextElementSibling.value,
                pageRemovePath: nodeList[i].nextElementSibling.nextElementSibling.value,
            })
        }
    }
    $.ajax({
        url: `/gamestation/admin/viewGen.php`,
        type: "DELETE",
        // reload page after delete
        success: (data, textStatus, xhr) =>
        {
            if (xhr.status === 200)
            {
                window.location.reload()
            }
        },
        // make json data as server php cannot use super global like $_POST to get data
        // data: "{'pageRemoved':" + pageToRemove + "}"
        data: JSON.stringify(fileToDeleteArray)
    })
}
function removeAllPages(isChecked)
{
    if (isChecked == true)
    {
        let pagesList = document.querySelectorAll("input.removePage")
        for (let i = 0; i < pagesList.length; i++) {
            pagesList[i].checked = true
        }
    }
}