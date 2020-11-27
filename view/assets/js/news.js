// change news page to white theme 
let news = function()
{
if (window.location.pathname === "/gamestation/news")
{
    let body = document.querySelector('body')
    body.style.background = "#fff"
    body.style.color = "#212529" 
}
}

let hoverCard = function() 
{
    if (window.location.pathname === "/gamestation/news")
    {
        let cardMain = document.querySelectorAll('.card') 
        for (let i = 0; i < cardMain.length; i++)
        {
            let cardChildren = 
            [
                cardMain[i].querySelector('.card-main'),
                cardMain[i].querySelector('.card-body p'),
                cardMain[i].querySelector('.card-body h5'),
                cardMain[i].querySelector('.card-text')
            ]
            for (let j = 0; j < cardChildren.length; j++)
            {
                cardMain[i].addEventListener('mouseover', () =>
                {
                    cardChildren[j].style.color = "#c51618"
                })
                cardMain[i].addEventListener('mouseout', () =>
                {
                    cardChildren[j].style.color = "rgb(33, 37, 41)"
                })
            }
        }

        // let cardStruct = [
        // document.querySelector('.card-main'),
        // document.querySelector('.card-body p'),
        // document.querySelector('.card-body h5'),
        // document.querySelector('.card-text')
        // ]

        // cardStruct[0].addEventListener('mouseover', () =>
        // {
        //     for (let i = 0; i < cardStruct.length; i++) {
        //         cardStruct[i].style.color = "#c51618";
        //     }
        // } 
        // )

        // cardStruct[0].addEventListener('mouseout', () =>
        // {
        //     for (let i = 0; i < cardStruct.length; i++) {
        //         cardStruct[i].style.color = "rgb(33, 37, 41)";
        //     }
        // } 
        // )
    }
}

module.exports.news = news
module.exports.hoverCard = hoverCard