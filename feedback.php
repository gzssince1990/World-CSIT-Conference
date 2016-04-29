<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Comments and feedback</title>
    <link rel = "stylesheet" type = "text/css" href = "styles.css">
</head>
<body>
    <?php 
    
    $action = 'feedback.php';
    $content_source = 'feedback.html';
    include_once 'header.php';
    include_once 'session_control.php';
    
    if (isset($_POST['comments'])) {
        $comments = $_POST['comments'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $username = $_SESSION['username'];
        
        $DB_table = 'comment';
        require_once 'DBConfig.php';
        $user->add_comment($username, $comments,$phone, $email);
    }
    
    include_once 'footer.php';
    ?>
</body>
</html>