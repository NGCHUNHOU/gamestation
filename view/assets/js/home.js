let home = function() 
{
    if (window.location.pathname === "/")
    {
        let body = document.querySelector('body')
        body.style.background = "#173F5A"
         let elements = ['h1', 'h2']
         for (let i = 0; i < elements.length; i++)
         {
             document.querySelector(elements[i]).style.color =  "rgba(255,255,255,.8)"
         }
    }
}

module.exports.home = home()