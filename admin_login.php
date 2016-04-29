

<form action="admin_login.php" method="post">
    <input type="text" name="username">
    <input type="password" name="password">
    <input type="submit" value="Submit">
</form>
<?php


/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if(isset($_POST['username'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
if($username=='admin' and $password=='admin'){ ?>
<script>
        window.location = "admin.php";
</script>
<?php 
}
else{?>

<?php 
    } 
} ?>
