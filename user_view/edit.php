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
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $identity = $_POST['identity'];
        $title = $_POST['title'];
        $company = $_POST['company'];
        $organization = $_POST['organization'];
        $address = $_POST['address'];
        $phone_number = $_POST['phone_number'];
        $email = $_POST['email'];
        
        $admin->update_by_uname($username,$password,$identity,
                $first_name,$last_name,$title,$company,$organization,$address,
                $phone_number,$email);
        echo 'Updated!';
    }
}

$reviewer_id = $_POST['reviewer_id'];
$reviewer = $admin->get_user_by_id($reviewer_id);

?>

<form action="edit.php" method="post">
    <label>First name: </label>
    <input type="text" name="first_name" value="<?php echo $reviewer['first_name'];?>">
    <br>
    
    <label>Last name:  </label>
    <input type="text" name="last_name" value="<?php echo $reviewer['last_name'];?>">
    <br>
    
    <label>username:  </label>
    <label><?php echo $reviewer['username'];?></label>
    <input type="hidden" name="username" value="<?php echo $reviewer['username'];?>">
    <br>
    
    <label>password:  </label>
    <input type="text" name="password">
    <br>
    
    <label>Identity</label>
    <select name="identity">
        <option <?php echo ($reviewer['identity']=='Author') ? 'selected':''; ?>>Author</option>
        <option <?php echo ($reviewer['identity']=='Presenter') ? 'selected':''; ?>>Presenter</option>
        <option <?php echo ($reviewer['identity']=='Student') ? 'selected':''; ?>>Student</option>
        <option <?php echo ($reviewer['identity']=='Regular Attendee') ? 'selected':''; ?>>Regular Attendee</option>
    </select>
    <br>
    
    <label>Title:  </label>
    <input type="text" name="title" value="<?php echo $reviewer['title'];?>">
    <br>
    
    <label>Company:  </label>
    <input type="text" name="company" value="<?php echo $reviewer['company'];?>">
    <br>
    <label>Organization:  </label>
    <input type="text" name="organization" value="<?php echo $reviewer['organization'];?>">
    <br>
    <label>Address:  </label>
    <input type="text" name="address" value="<?php echo $reviewer['address'];?>">
    <br>
    <label>Phone Number:  </label>
    <input type="text" name="phone_number" value="<?php echo $reviewer['phone_number'];?>">
    <br>
    <label>Email:  </label>
    <input type="text" name="email" value="<?php echo $reviewer['email'];?>">
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