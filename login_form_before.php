<form style="text-align: right" action=<?php echo $action;?> method="post">
    <label>Login as a: </label>
    <select name="login_as">
        <option>User</option>
        <option>Reviewer</option>
    </select>
    <input type="text" size="10" name="username">
    <input type="password" size="10" name="password">
    <input type="submit" value="Login">
    <input type="hidden" name="action" value="login">
    <?php 
    $signup_link_visible= ($action=='signup.php')?'hidden':'visible';
    ?>
    <a href="signup.php" style="visibility: <?php echo $signup_link_visible?>;">
        <font size="2">Sign up</font>
    </a>
</form>
<br>
<br>