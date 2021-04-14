<?php
    if (!isset($_SESSION)) session_start();
    $file = fopen($_SERVER['DOCUMENT_ROOT']."/gamestation/admin/pages.json", "r") or die("unable to open page.json file");
    $pageState = fread($file, filesize($_SERVER['DOCUMENT_ROOT']."/gamestation/admin/"));
    $decodedPageState = json_decode($pageState, true);
    // print_r($decodedPageState);
    if (isset($_SESSION["isUserDataSet"]) AND $_SESSION["isUserDataSet"])
    {
        // let client pass through admin system
    }
    else
    {
        require_once $_SERVER["DOCUMENT_ROOT"]."/gamestation/admin/view/component/loading.php";
        // header("Location: ../../view/register.php");
        exit();
    }
?>
<body>
    <div class="wrapper ">
        <div class="sidebar" data-color="blue" data-background-color="white" data-displaystatus="<?php echo $decodedPageState["state"]?>">
            <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
            <div class="logo">
                <a href="http://www.creative-tim.com" class="simple-text logo-normal">GameStation</a>
            </div>
            <div class="sidebar-wrapper">
                <ul class="nav">
                    <li class="nav-item active" onclick="highlightNavItem(this)">
                        <a class="nav-link" href="/gamestation/admin/view/fullLinkAdminIndex.php">
                            <i class="material-icons sidebar-icon">dashboard</i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="nav-item" onclick="highlightNavItem(this)">
                        <a class="nav-link" href="#">
                            <i class="material-icons sidebar-icon">post_add</i>
                            <p>Posts</p>
                        </a>
                    </li>
                    <li class="nav-item" onclick="highlightNavItem(this)">
                        <a class="nav-link" href="#">
                            <i class="material-icons sidebar-icon">perm_media</i>
                            <p>Media</p>
                        </a>
                    </li>
                    
                    <li class="nav-item" onclick="highlightNavItem(this)">
                        <!-- <a class="nav-link" href="/gamestation/admin/view/component/pageEditor.php"> -->
                        <a class="nav-link" href="/gamestation/admin/view/component/pages.php">
                            <i class="material-icons sidebar-icon">web</i>
                            <p>Pages</p>
                        </a>
                    </li>

                    <li class="nav-item" onclick="highlightNavItem(this)">
                        <a class="nav-link" href="#">
                            <i class="material-icons sidebar-icon">account_box</i>
                            <p>Admin Profile</p>
                        </a>
                    </li>
                    <span class="material-icons sidebar-btn">
                        arrow_back
                    </span>
                    <!-- your sidebar here -->
                </ul>
            </div>
        </div>
        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
                <div class="container-fluid">
                    <div class="navbar-wrapper">
                        <a class="navbar-brand" href="javascript:;">Dashboard</a>
                    </div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
                    <div class="collapse navbar-collapse justify-content-end">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="javascript:;">
                                    <i class="material-icons">notifications</i> Notifications
                                </a>
                            </li>
                            <!-- your navbar here -->
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->
            <div class="content">
                <div class="container-fluid">
                    <!-- your content here -->
                </div>
            </div>