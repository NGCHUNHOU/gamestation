<?php
    // $viewFile = fopen("../usrView/$_POST[pageName]", "r");
    $viewFile = fopen($_SERVER["DOCUMENT_ROOT"]."/".$_POST["pagePath"]."/".$_POST["pageName"], "r");
    if (filesize($_SERVER["DOCUMENT_ROOT"]."/".$_POST["pagePath"]."/".$_POST["pageName"]) != 0 )
    {
        $content = array("pageName" => $_POST['pageName'] ,"pageContent" => fread($viewFile, filesize($_SERVER["DOCUMENT_ROOT"]."/".$_POST["pagePath"]."/".$_POST["pageName"])));
    }
    else 
    {
        $content = null;
    }
    $jcontent = json_encode($content);
    $writeFile = fopen("pages.json", "w");
    fwrite($writeFile, $jcontent);

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
                        <textarea name="preivew-form-commet" id="" cols="30" rows="10" class="codemirror-textarea">
                            <!-- webeditor script will append content from view -->
                        </textarea>
                    <br>
                    <div class="row">
                        <div class="col-12 btnEditorControl" style="display: flex; flex-direction: row-reverse;">
                            <button class="btn btn-primary" id="manageBtn">Manage</button>
                            <button class="btn btn-primary" id="viewBtn">Preview</button>
                            <button class="btn btn-primary" onclick="ajaxData('<?php echo $_POST['pageName']; ?>', '<?php echo $_POST['pagePath']; ?>')" id="saveBtn">Save</button>
                            <button class="btn btn-primary" id="editBtn">Edit</button>
                        </div>
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
