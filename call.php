<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>World Congress CS-IT Conferences</title>
    <link rel = "stylesheet" type = "text/css" href = "styles.css">
</head>
<body>
    
    <?php 
    $action = 'call.php';
    $content_source = 'call.html';
    include_once 'header.php';
    include_once 'session_control';
    include_once $content_source;
    include_once 'footer.php';
    ?>
</body>
</html>