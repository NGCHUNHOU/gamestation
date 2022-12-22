let makeSidebarFlex = function () {
    let sidebarItems = document.querySelectorAll('div.sidebar-wrapper ul.nav li.nav-item')
    if (document.querySelector(".sidebar").dataset.displaystatus === "collapsed")
    {
    for (let i = 0; i < sidebarItems.length; i++) {
        sidebarItems[i].querySelector('a.nav-link p').style.display = "none"
        sidebarItems[i].querySelector('a.nav-link').style.display = "inline-block"
        sidebarItems[i].querySelector('i.material-icons.sidebar-icon').style.float = "none"
        sidebarItems[i].querySelector('i.material-icons.sidebar-icon').style.margin = 0 
    }
        document.querySelector('div.sidebar-wrapper').style.transition = "0.5s width"
        document.querySelector('div.sidebar-wrapper').style.width = "100%"
        document.querySelector('div.sidebar-wrapper').style.display = "inline-block"
        document.querySelector('div.sidebar div.logo').style.display = "none"
        document.querySelector('div.sidebar').style.width = "90px"
        document.querySelector('div.sidebar').style.display = "inline-block"
        $('.sidebar-btn').css({
            "transition": "0.5s left",
            "left": "30%"
        })
        document.querySelector('.main-panel').style.width = "calc(100% - 90px)"
        document.querySelector('span.material-icons.sidebar-btn').innerText = "arrow_forward"
    }
    else if (document.querySelector(".sidebar").dataset.displaystatus === "expanded")
    {
    for (let i = 0; i < sidebarItems.length; i++) {
        sidebarItems[i].querySelector('a.nav-link p').removeAttribute("style")
        sidebarItems[i].querySelector('a.nav-link').removeAttribute("style")
        sidebarItems[i].querySelector('i.material-icons.sidebar-icon').removeAttribute("style")
        sidebarItems[i].querySelector('i.material-icons.sidebar-icon').removeAttribute("style")
    }
        document.querySelector('div.sidebar-wrapper').removeAttribute("style")
        document.querySelector('div.sidebar-wrapper').removeAttribute("style")
        document.querySelector('div.sidebar-wrapper').removeAttribute("style")
        document.querySelector('div.sidebar div.logo').removeAttribute("style")
        document.querySelector('div.sidebar').removeAttribute("style")
        document.querySelector('div.sidebar').removeAttribute("style")
        document.querySelector('.sidebar-btn').removeAttribute("style")
        document.querySelector('span.material-icons.sidebar-btn').innerText = "arrow_back"
    }
}
makeSidebarFlex()

// making sidebar collapseable or expandable
$('.sidebar-btn').on('click', () => {
    // console.log(document.querySelector(".sidebar").dataset.displaystatus)
    if (document.querySelector(".sidebar").dataset.displaystatus == "collapsed")
    {
        document.querySelector(".sidebar").dataset.displaystatus = "expanded"
    }
    else if (document.querySelector(".sidebar").dataset.displaystatus == "expanded")
    {
        document.querySelector(".sidebar").dataset.displaystatus = "collapsed"
    }
})

let highlightNavItem = (target) =>
{
    let navItemCollection = document.querySelectorAll("div.sidebar-wrapper ul.nav li.nav-item")
    for (let i = 0; i < navItemCollection.length; i++) {
            navItemCollection[i].classList.remove("active")
    }
    target.classList.add("active")
}

let ajaxRequest = (action) =>
{
   $.ajax(
       {
           contentType: "application/x-www-form-urlencoded",
           method: "POST",
           url: "/admin/state.php",
           data: `state=${action}`
       }
   ) 
}
let target = document.querySelector(".sidebar")
let observer = new MutationObserver((mutations) => {
    mutations.forEach((mutation) => {
        let sidebarItems = document.querySelectorAll('div.sidebar-wrapper ul.nav li.nav-item')
        if (mutation.attributeName === "data-displaystatus" && mutation.target.getAttribute(mutation.attributeName) === "collapsed")
        {
            for (let i = 0; i < sidebarItems.length; i++) {
                sidebarItems[i].querySelector('a.nav-link p').style.display = "none"
                sidebarItems[i].querySelector('a.nav-link').style.display = "inline-block"
                sidebarItems[i].querySelector('i.material-icons.sidebar-icon').style.float = "none"
                sidebarItems[i].querySelector('i.material-icons.sidebar-icon').style.margin = 0 
            }
                document.querySelector('div.sidebar-wrapper').style.transition = "0.5s width"
                document.querySelector('div.sidebar-wrapper').style.width = "100%"
                document.querySelector('div.sidebar-wrapper').style.display = "inline-block"
                document.querySelector('div.sidebar div.logo').style.display = "none"
                document.querySelector('div.sidebar').style.width = "90px"
                document.querySelector('div.sidebar').style.display = "inline-block"
                $('.sidebar-btn').css({
                    "transition": "0.5s left",
                    "left": "30%"
                })
                document.querySelector('.main-panel').style.width = "calc(100% - 90px)"
                // document.querySelector(".sidebar").dataset.displaystatus = "collapsed"
                document.querySelector('span.material-icons.sidebar-btn').innerText = "arrow_forward"
                ajaxRequest("collapsed")
            }
    else if (mutation.attributeName === "data-displaystatus" && mutation.target.getAttribute(mutation.attributeName) === "expanded")
    {
    for (let i = 0; i < sidebarItems.length; i++) {
        sidebarItems[i].querySelector('a.nav-link p').removeAttribute("style")
        sidebarItems[i].querySelector('a.nav-link').removeAttribute("style")
        sidebarItems[i].querySelector('i.material-icons.sidebar-icon').removeAttribute("style")
        sidebarItems[i].querySelector('i.material-icons.sidebar-icon').removeAttribute("style")
    }
        document.querySelector('div.sidebar-wrapper').removeAttribute("style")
        document.querySelector('div.sidebar-wrapper').removeAttribute("style")
        document.querySelector('div.sidebar-wrapper').removeAttribute("style")
        document.querySelector('div.sidebar div.logo').removeAttribute("style")
        document.querySelector('div.sidebar').removeAttribute("style")
        document.querySelector('div.sidebar').removeAttribute("style")
        document.querySelector('.sidebar-btn').removeAttribute("style")
        document.querySelector('.main-panel').style.width = "calc(100% - 260px)"
        document.querySelector('span.material-icons.sidebar-btn').innerText = "arrow_back"
        ajaxRequest("expanded")
    }
        })
    })
observer.observe(target,
    {
        subtree: true,
        attributes: true,
        childList: true
    }
)