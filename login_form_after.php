<?php
    if(!isset($login_as))
    {
        $login_as = $_SESSION['table']=='auth'?'User':'Reviewer';
    }
?>
<br><label><?php echo 'Logged in as a '.$login_as?></label>
<form style="text-align: right" action=<?php echo $action;?> method="post">
    <label>Welcome, </label>
    <label><?php echo $username;?></label>
    <input type="hidden" name="action" value="logout">
    <input type="submit" value="Log out" style="padding: 0;width: 40px; height: 15px; font-size: 9px;">
</form>
<br>
<br>

