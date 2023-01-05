<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Database Editor</title>
    <meta name='description' content=""/>
    <meta name='keywords' content=""/>
    <meta name='author' content=""/>
    <meta name='viewport' content=""/>
    <link rel="icon" type="image/png" href="/view/assets/images/meteor-light-resized.svg" size="16x16">
    <link rel="stylesheet" href="/view/assets/css/bootstrap.min.css">
    <script type="text/javascript" src="/view/assets/js/bootstrap.min.js"></script>
</head>
<body>
    <?php
        require_once $_SERVER['DOCUMENT_ROOT'] .'/envCenter.php';
        envCenter::loadFile("admin/databaseEditor.php");
        databaseEditor::initComponents();
    ?>
</body>
</html>