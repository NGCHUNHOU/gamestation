const $  = require('jquery')

window.setDailyNews = (target, day) =>
{
    $.ajax(
        {
            url: `http://localhost/gamestation/classes/pages/newsDataSheet.php?day=${day}`,
            success: (result) =>
            {
                let JSON_NewsData = JSON.parse(result)

                if (target.hasChildNodes())
                {
                    target.innerHTML = ''
                }

                for (let i = 0; i < JSON_NewsData.length; i++)
                {
                    let tr = document.createElement('tr')
                    let td = document.createElement('td')
                    let node = document.createTextNode(JSON_NewsData[i][0])
                        td.setAttribute('colspan', '7')
                        td.appendChild(node)
                        tr.appendChild(td)
                    target.appendChild(tr)
                }
            }
        }
    )
}