<!DOCTYPE html>
<html lang="en">
<head>
<title><?php echo $pageData->pageTitle; ?></title>
<meta name='description' content="<?php echo $pageData->pageDescription; ?>"/>
<meta name='keywords' content="<?php echo $pageData->pageKeywords; ?>"/>
<meta name='author' content="<?php echo $pageData->pageAuthor; ?>"/>
<meta name='viewport' content="<?php echo $pageData->pageViewport; ?>"/>
<link rel="icon" type="image/png" href="/view/assets/images/meteor-light-resized.svg" size="16x16">
    <script type="text/javascript" src="/view/assets/js/jquery-3.4.1.min.js"></script>
    <!-- bootstrap is already included into main.css -->
    <!-- <link rel="stylesheet" href="/view/assets/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="/view/assets/css/main.css">
    <script type="text/javascript" src="/view/assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/node_modules/animejs/lib/anime.min.js"></script>
    <style>
        @media all and (min-width: 992px) {
	.navbar .nav-item .dropdown-menu{ display: none; }
	.navbar .nav-item:hover .dropdown-menu{ display: block; }
	.navbar .nav-item .dropdown-menu{ margin-top:0; }
	.navbar .nav-item .dropdown-menu-dark{ background: #161b22 }
	.navbar .nav-item .dropdown-menu-dark .dropdown-item{ color: rgba(255,255,255,.7); font-weight: 600; }
	.navbar .nav-item .dropdown-menu-dark .dropdown-item:hover, .navbar .nav-item .dropdown-menu-dark .dropdown-item:focus, 
    .navbar .nav-item .dropdown-menu-dark .dropdown-item:active
    { background: #292A44}
}	 
    </style>
</head>
<body>
    <header style="position: relative">
        <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 rem-pad">
                <div class="navbar navbar-expand-md navbar-dark bg-logo">
                    <div class="logo navbar-brand"><img rel="preload" src="/view/assets/images/meteor-light-resized.svg" alt="logo" width="32"></div>
                    <button class="navbar-toggler" data-toggle="collapse" data-target="#headerlist">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="headerlist">
                    <ul class="navbar-nav header-list" data-iscapitailse='true'>
                        <li class="nav-item" style="z-index: 2;">
                            <a class="nav-link" href="/" target="_self">Home</a>
                        </li>
                        <li class="nav-item" style="z-index: 2;">
                            <a class="nav-link" href="/about" target="_self">About Us</a>
                        </li>
                        <li class="nav-item" style="z-index: 2;">
                            <a class="nav-link" href="/news" target="_self">News</a>
                        </li>
                        <!-- <li class="nav-item dropdown" style="z-index: 2;">
                            <a class="nav-link dropdown-toggle" href="/dropdown" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                               DROPDOWN 
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </li> -->
                        <li class="nav-item dropdown" style="z-index: 2;">
                            <a class="nav-link dropdown-toggle" href="/guides">
                                Guides 
                            </a>
                            <div class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="/guides/guide1">PS4</a>
                                <a class="dropdown-item" href="#">PC</a>
                                <a class="dropdown-item" href="#">Xbox One</a>
                                <a class="dropdown-item" href="#">Xbox 360</a>
                                <a class="dropdown-item" href="#">PS Vita</a>
                                <a class="dropdown-item" href="#">Switch</a>
                                <a class="dropdown-item" href="#">3DS</a>
                                <a class="dropdown-item" href="#">Wii U</a>
                                <a class="dropdown-item" href="#">iPhone</a>
                                <a class="dropdown-item" href="#">iPad</a>
                                <a class="dropdown-item" href="#">Android</a>
                            </div>
                        </li>
                    </ul>
                    </div>
                </div>
            </div>
        </div>
      </div>
      <div class="navigator" style="position: absolute; bottom: 0; height: 4px; background: #3d3e59; opacity: 0.3;"></div>
      <div class="hoverBlock" style="position: absolute; bottom: 0; z-index: 1"></div>
    </header>
<script>
    function setCurrentItemPosition(currentItems, hoverItem)
    {
        let navigator = document.querySelector(".navigator")
        let hover = document.querySelector(".hoverBlock")
        let header = document.getElementsByTagName("header")[0]
        let activeItems = currentItems
        let currentPageName = window.location.pathname.replace("/", "")
        currentPageName  = currentPageName == "" ? "home" : currentPageName
        let currentItem = null
        for (let i = 0; i < currentItems.length; i++)
        {
            let activeItemArray = [activeItems[i].href.split("/"), activeItems[i].href.split("/").length - 1]
            let activeItem = activeItemArray[0][activeItemArray[1]]
            if (activeItem === "")
            {
                currentItem = activeItems[0]
            }
            if (activeItem == currentPageName)
            {
                currentItem = activeItems[i]
            }
        }
        let itemShape = currentItem.getBoundingClientRect()
        let headerShape = header.getBoundingClientRect()
        navigator.style.left = itemShape.left + "px"
        navigator.style.width = itemShape.width + "px"
        let navigatorHt = navigator.style.height.replace("px", "")

        hoverItem(hover, itemShape, headerShape, navigatorHt)
    }
    setCurrentItemPosition(document.querySelectorAll(".nav-link"), (hoverItem, itemShape, headerShape, navigatorHt) => {
        hoverItem.style.left = itemShape.left + "px"
        hoverItem.style.top = 0
        hoverItem.style.width = itemShape.width + "px"
        hoverItem.style.height = headerShape.height - navigatorHt + "px"
    })
</script>