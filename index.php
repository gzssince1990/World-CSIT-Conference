<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>World Congress CS-IT Conferences</title>
    <link rel = "stylesheet" type = "text/css" href = "styles.css">
</head>

<body>
    <?php 
    $action = 'index.php';
    $content_source = 'index.html';
    include_once 'header.php';
    include_once 'session_control.php';
    include_once $content_source;
    include_once 'footer.php';
    ?>
</body>
</html>