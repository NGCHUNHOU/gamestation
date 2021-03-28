<?php
    if (!isset($_SESSION)) session_start();
    $file = fopen("../../pages.json", "r") or die("unable to open page.json file");
    $pageState = fread($file, filesize("../../pages.json"));
    $decodedPageState = json_decode($pageState, true);
    // print_r($decodedPageState);
    if ($_SESSION["isUserDataSet"])
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
<!DOCTYPE html>
<html lang="en">

<head>
    <title>GameStation</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <script type="text/javascript" src="/gamestation/view/assets/js/jquery-3.4.1.min.js"></script>
    <!-- CodeMirror libraries -->
    <link rel="stylesheet" href="/gamestation/admin/node_modules/codemirror/lib/codemirror.css"/>
    <link rel="stylesheet" href="/gamestation/admin/node_modules/codemirror/theme/gruvbox-dark.css"/>
    <script type="text/javascript" src="/gamestation/admin/node_modules/codemirror/lib/codemirror.js"></script>
    <script type="text/javascript" src="/gamestation/admin/node_modules/codemirror/mode/xml/xml.js"></script>
    <script type="text/javascript" src="/gamestation/admin/node_modules/codemirror/mode/javascript/javascript.js"></script>
    <script type="text/javascript" src="/gamestation/admin/node_modules/codemirror/mode/htmlmixed/htmlmixed.js"></script>
    <script type="text/javascript" src="/gamestation/admin/node_modules/codemirror/mode/php/php.js"></script>
    <script type="text/javascript" src="/gamestation/admin/node_modules/codemirror/keymap/vim.js"></script>
    <script type="text/javascript" src="/gamestation/admin/node_modules/codemirror/addon/search/searchcursor.js"></script>
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <!-- Material Kit CSS -->
    <link href="/gamestation/admin/assets/css/material-dashboard.css" rel="stylesheet" />
    <!-- -->
</head>

<body>
    <div class="wrapper ">
        <div class="sidebar" data-color="blue" data-background-color="white" data-displaystatus=<?php echo $decodedPageState["state"] ?>>
            <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
            <div class="logo">
                <a href="#" class="simple-text logo-normal">GameStation</a>
            </div>
            <div class="sidebar-wrapper">
                <ul class="nav">
                    <li class="nav-item" onclick="highlightNavItem(this)">
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

                    <li class="nav-item active" onclick="highlightNavItem(this)">
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
                    <div class="viewPanel" style="width: 100%; height: calc(100vh - 123px)">
                        <table class="styled-table" style="width: inherit;">
                            <thead>
                                <tr>
                                    <th>View Page</th>
                                    <th>Description</th>
                                    <th>Preview Path</th>
                                    <th>Keyword</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <!-- <a href="/gamestation/admin/view/component/pageEditor.php">test.html</a> -->
                                        <form style="margin: 0;" action="/gamestation/admin/view/component/pageEditor.php" method="post">
                                            <input type="hidden" name="pageName" value="test.html">
                                            <button type="submit" style="border: none; padding: 0; color: #2196f3; cursor: pointer; font-weight: 300;">test.html</button>
                                        </form>
                                    </td>
                                    <td>A test page for demo</td>
                                    <td><a href="/gamestation/admin/view/usrView/test.html">/usrView/test.html</a></td>
                                    <td>test</td>
                                </tr>
                                <tr class="active-row">
                                    <td>
                                        <!-- <a href="/gamestation/admin/view/component/pageEditor.php">test2.html</a> -->
                                        <form style="margin: 0;" action="/gamestation/admin/view/component/pageEditor.php" method="post">
                                            <input type="hidden" name="pageName" value="test2.html">
                                            <button type="submit" style="border: none; padding: 0; color: #2196f3; cursor: pointer; font-weight: 300;">test2.html</button>
                                        </form>
                                    </td>
                                    <td>A test2 page for demo</td>
                                    <td><a href="/gamestation/admin/view/usrView/test2.html">/usrView/test2.html</a></td>
                                    <td>test2</td>
                                </tr>
                                <!-- and so on... -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <footer class="footer">
                <div class="container-fluid">
                    <nav class="float-left">
                        <ul>
                            <li>
                                <a href="#">
                                    ©Copyright 2020 GameStation a Social Networking Service for Gaming Discussion and News. All Rights Reserved.
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <div class="copyright float-right">
                        &copy;
                        <script>
                            document.write(new Date().getFullYear())
                        </script>, made with <i class="material-icons">favorite</i> by
                        <a href="#" target="_blank">GameStation</a>.
                    </div>
                    <!-- your footer here -->
                </div>
            </footer>
        </div>
    </div>
    <script src="/gamestation/admin/assets/js/sidebar.js"></script>
    <script src="/gamestation/admin/assets/js/dist/webeditorBundle.js"></script>
    <script>
        loadViewText("test")
    </script>
</body>
</html>
