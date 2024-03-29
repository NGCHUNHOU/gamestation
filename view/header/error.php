<!DOCTYPE html>
<html lang="en">

<head>
    <title>GameStation | Biggest Gaming Forum and Gaming News </title>
    <meta name="author" content="<?php echo $this->get_siteinfo('author', 'error')?>">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0">
    <link rel="icon" type="image/png" href="view/assets/images/meteor-light-resized.svg" size="16x16">
    <script type="text/javascript" src="./view/assets/js/jquery-3.4.1.min.js"></script>
    <link rel="stylesheet" href="./view/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php $this->get_filepath('css_path', 'error') ?>">
    <script type="text/javascript" src="./view/assets/js/bootstrap.min.js"></script>
</head>

<body>
<header>
        <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 rem-pad">
                <div class="navbar navbar-expand-md navbar-dark bg-logo">
                    <div class="logo navbar-brand"><img src="<?php echo ['DOCUMENT_ROOT']. '/' ?>/view/assets/images/meteor-light-resized.svg" alt="logo" width="32"></div>
                    <button class="navbar-toggler" data-toggle="collapse" data-target="#headerlist">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="headerlist">
                    <ul class="navbar-nav header-list" data-iscapitailse='true'>
                        <li class="nav-item">
                            <a class="nav-link" href="./" target="_self">HOME</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./about" target="_self">ABOUT US</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./news" target="_self">NEWS</a>
                        </li>
                    </ul>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </header>   