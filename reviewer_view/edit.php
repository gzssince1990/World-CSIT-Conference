<script>
    var ref = document.referrer;
    if(!ref){
        window.location = "../index.php";
    }
</script>
<style>
    button {
     background:none!important;
     border:none; 
     padding:0!important;
     font: inherit;
     /*border is optional*/
     border-bottom:1px solid #444; 
     cursor: pointer;
}
</style>

<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once 'DBConfig.php';

if(isset($_POST['action'])){
    if($_POST['action']=='update'){
        $reviewer_id = $_POST['reviewer_id'];
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        $admin->update_by_id($reviewer_id,$first_name,$last_name,
                $username,$password);
        echo 'Updated!';
    }
}

$reviewer_id = $_POST['reviewer_id'];
$reviewer = $admin->get_reviewer_by_id($reviewer_id);

?>

<form action="edit.php" method="post">
    <label>First name: </label>
    <input type="text" name="first_name" value="<?php echo $reviewer['first_name'];?>">
    <br>
    
    <label>Last name:  </label>
    <input type="text" name="last_name" value="<?php echo $reviewer['last_name'];?>">
    <br>
    
    <label>username:  </label>
    <input type="text" name="username" value="<?php echo $reviewer['username'];?>">
    <br>
    
    <label>password:  </label>
    <input type="text" name="password" value="<?php echo $reviewer['password'];?>">
    <br>
    
    <input type="hidden" name="reviewer_id" value="<?php echo $reviewer_id;?>">
    <input type="hidden" name="action" value="update">
    <input type="submit" value="Update"><br>
</form>

<form id="back_form" action="info.php" method="post">
    <input type="hidden" name="reviewer_id" value="<?php echo $reviewer_id;?>">
</form>

<a href="#" onclick="goback()">Back</a>

<script>
    function goback(){
        document.getElementById('back_form').submit();
    }
</script>