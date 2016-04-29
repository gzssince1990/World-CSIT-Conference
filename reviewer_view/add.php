<script>
    var ref = document.referrer;
    if(!ref){
        window.location = "../index.php";
    }
</script>
<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<form action="list.php" method="post">
    <label>First name</label><input type="text" name="first_name"><br>
    <label>Last name</label><input type="text" name="last_name"><br>
    <label>username</label><input type="text" name="username"><br>
    <label>password</label><input type="text" name="password"><br>
    <input type="hidden" name="action" value="insert">
    <input type="submit" value="Add"><br>
</form>

<a href="list.php">Back</a>
