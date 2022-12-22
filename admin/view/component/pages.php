<?php
    namespace admin\view\component;
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
        require_once $_SERVER["DOCUMENT_ROOT"]."/admin/view/component/loading.php";
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
    <script type="text/javascript" src="/view/assets/js/jquery-3.4.1.min.js"></script>
    <!-- CodeMirror libraries -->
    <link rel="stylesheet" href="/admin/node_modules/codemirror/lib/codemirror.css"/>
    <link rel="stylesheet" href="/admin/node_modules/codemirror/theme/gruvbox-dark.css"/>
    <script type="text/javascript" src="/admin/node_modules/codemirror/lib/codemirror.js"></script>
    <script type="text/javascript" src="/admin/node_modules/codemirror/mode/xml/xml.js"></script>
    <script type="text/javascript" src="/admin/node_modules/codemirror/mode/javascript/javascript.js"></script>
    <script type="text/javascript" src="/admin/node_modules/codemirror/mode/htmlmixed/htmlmixed.js"></script>
    <script type="text/javascript" src="/admin/node_modules/codemirror/mode/php/php.js"></script>
    <script type="text/javascript" src="/admin/node_modules/codemirror/keymap/vim.js"></script>
    <script type="text/javascript" src="/admin/node_modules/codemirror/addon/search/searchcursor.js"></script>
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <!-- Material Kit CSS -->
    <link href="/admin/assets/css/material-dashboard.css" rel="stylesheet" />
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
                        <a class="nav-link" href="/admin/view/fullLinkAdminIndex.php">
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
                        <!-- <a class="nav-link" href="/admin/view/component/pageEditor.php"> -->
                        <a class="nav-link" href="/admin/view/component/pages.php">
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
                    <div class="viewPanel" style="width: 100%; height: calc(100vh - 123px - 41px)">
                        <table class="styled-table" style="width: inherit;">
                            <thead>
                                <tr>
                                    <th>
                                        <form style='margin: 0;' action='/admin' method='post'>
                                        <input class="batchRemove" type='checkbox' name="batchRemove" value="removeALL" onclick="removeAllPages(this.checked)">
                                        View Page
                                        </form>
                                    </th>
                                    <th>Description</th>
                                    <th>Preview Path</th>
                                    <th>Keyword</th>
                                </tr>
                            </thead>
                            <tbody>
                                    <?php
                                        require_once $_SERVER["DOCUMENT_ROOT"]."/classes/db/db_basic.php";
                                        use classes\db\db_basic;
                                        class pagesList extends db_basic
                                        {
                                            public $pageAdded;
                                            public function __construct()
                                            {
                                                parent::__construct("localhost", "gamestation", "root", "");
                                                if (isset($_POST["pageAdded"]) AND isset($_POST["path"]) )
                                                { 
                                                    $pageAdded = array($_POST["pageAdded"], $_POST["path"], $_POST["description"], $_POST["keyword"]);
                                                    $this->storePagetoSQL($pageAdded[0], $pageAdded[1], $pageAdded[2], $pageAdded[3]);
                                                }
                                                $this->pageAdded = $this->queryALL("SELECT * FROM `pages`");
                                                $this->checkPageExists();
                                                $this->renderPageItems();
                                            }
                                            public function storePagetoSQL($pageName, $pagePath, $description, $keyword)
                                            {
                                                if (isset($_POST["pageAdded"]) AND isset($_POST["path"]) )
                                                {
                                                    $this->queryALL("INSERT INTO `pages` (`pagesNo`, `pageName`, `pagePath`, `description`, `keyword`, `usersID`) VALUES (NULL, '$pageName', '$pagePath', '$description', '$keyword', 1)");
                                                }
                                            }
                                            public function checkPageExists()
                                            {
                                                foreach ($this->pageAdded as $page => $value)
                                                {
                                                    if (!file_exists($_SERVER["DOCUMENT_ROOT"]."/".$value["pagePath"]."/".$value["pageName"]))
                                                    {
                                                        $this->queryALL("DELETE FROM `pages` WHERE `pageName` = '$value[pageName]' AND `pagePath` = '$value[pagePath]'");
                                                    }
                                                }
                                                $this->pageAdded = $this->queryALL("SELECT * FROM `pages`");
                                            }
                                            protected function renderPageItems()
                                            {
                                                foreach ($this->pageAdded as $page => $value) {
                                                    echo "<tr><td>
                                                        <form style='margin: 0;' action='/admin/view/component/pageEditor.php' method='post'>
                                                            <input type='checkbox' class='removePage' name='removePage' value='$value[pageName]'>
                                                            <input type='hidden' name='pageName' value='$value[pageName]'>
                                                            <input type='hidden' name='pagePath' value='$value[pagePath]'>
                                                            <button type='submit' style='border: none; padding: 0; color: #2196f3; cursor: pointer; font-weight: 300;'>$value[pageName]</button>
                                                        </form>
                                                    </td>
                                                    <td>$value[description]</td>
                                                    <td><a href=".$value['pagePath']."/".$value['pageName'].">$value[pagePath]</a></td>
                                                    <td>$value[keyword]</td></tr>";
                                                }
                                            }
                                        }

                                        $pageHandler = new pagesList;

                                        // foreach ($pageHandler->pageAdded as $page => $value) {
                                        //     echo "<tr><td>
                                        //         <form style='margin: 0;' action='/admin/view/component/pageEditor.php' method='post'>
                                        //             <input type='hidden' name='pageName' value='$value[pageName]'>
                                        //             <input type='hidden' name='pagePath' value='$value[pagePath]'>
                                        //             <button type='submit' style='border: none; padding: 0; color: #2196f3; cursor: pointer; font-weight: 300;'>$value[pageName]</button>
                                        //         </form>
                                        //     </td>
                                        //     <td>$value[description]</td>
                                        //     <td><a href=".$value['pagePath']."/".$value['pageName'].">$value[pagePath]</a></td>
                                        //     <td>$value[keyword]</td></tr>";
                                        // }
                                            // if (!$_SESSION) session_start();
                                            // if (isset($_POST["pageAdded"]) AND isset($_POST["path"]) )
                                            // {
                                            //     if (!is_array($_SESSION["pageAdded"]) AND !isset($_SESSION["pageAdded"]))
                                            //     {
                                            //         $_SESSION["pageAdded"] = array();
                                            //     }
                                            //     array_push($_SESSION["pageAdded"], array($_POST["pageAdded"], $_POST["path"], $_POST["description"], $_POST["keyword"]));
                                            // }
                                        // foreach ($_SESSION["pageAdded"] as $page => $value) {
                                        //     if (!file_exists($_SERVER["DOCUMENT_ROOT"]."/".$value[1]."/".$value[0]))
                                        //     {
                                        //         unset($_SESSION["pageAdded"][$page]);
                                        //     }
                                        // }
                                        // foreach ($_SESSION["pageAdded"] as $page => $value) {
                                        //     echo "<tr><td>
                                        //         <form style='margin: 0;' action='/admin/view/component/pageEditor.php' method='post'>
                                        //             <input type='hidden' name='pageName' value='$value[0]'>
                                        //             <input type='hidden' name='pagePath' value='$value[1]'>
                                        //             <button type='submit' style='border: none; padding: 0; color: #2196f3; cursor: pointer; font-weight: 300;'>$value[0]</button>
                                        //         </form>
                                        //     </td>
                                        //     <td>$value[2]</td>
                                        //     <td><a href=".$value[1]."/".$value[0].">$value[1]</a></td>
                                        //     <td>$value[3]</td></tr>";
                                        // }
                                        // echo '<pre>';
                                        // var_dump($_SESSION);
                                        // echo '</pre>';

                                        // if (isset($_SESSION["pageAdded"]))
                                        // {
                                        //     $pageName = $_SESSION["pageAdded"][0];
                                        //     $pagePath = $_SESSION["pageAdded"][1];
                                        //     echo "<tr><td>
                                        //         <form style='margin: 0;' action='/admin/view/component/pageEditor.php' method='post'>
                                        //             <input type='hidden' name='pageName' value='$pageName'>
                                        //             <button type='submit' style='border: none; padding: 0; color: #2196f3; cursor: pointer; font-weight: 300;'>$pageName</button>
                                        //         </form>
                                        //     </td>
                                        //     <td>A test page for demo</td>
                                        //     <td><a href='$pagePath'>$pagePath</a></td>
                                        //     <td>test</td></tr>";
                                        // }
                                                // print "<pre>";
                                                // print_r($userViewList);
                                                // print "</pre>";
                                    ?>
                            </tbody>
                        </table>
                    </div>
                        <div class="row">
                            <div class="col-12 btnEditorControl" style="display: flex; flex-direction: row-reverse;">
                                <button class="btn btn-primary">Save</button>
                                <button class="btn btn-primary" onclick="requestRemovePage(document.querySelectorAll('.removePage:checked'))">Remove</button>
                                <button class="btn btn-primary" onclick="addPage()">Add</button>
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
    <script src="/admin/assets/js/sidebar.js"></script>
    <script src="/admin/assets/js/dist/webeditorBundle.js"></script>
    <script src="/admin/assets/js/pages.js"></script>
</body>
</html>