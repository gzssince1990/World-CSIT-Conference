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

require_once 'DBConfig.php';

$reviewer_id = $_POST['reviewer_id'];
$reviewer = $admin->get_user_by_id($reviewer_id);
?>

<label>First name:     <?php echo $reviewer['first_name'];?></label><br>
<label>Last name :     <?php echo $reviewer['last_name'];?></label><br>
<label>Username:       <?php echo $reviewer['username'];?></label><br>
<label>Identity:       <?php echo $reviewer['identity'];?></label><br>
<label>Title:          <?php echo $reviewer['title'];?></label><br>
<label>Company:        <?php echo $reviewer['company'];?></label><br>
<label>Organization:   <?php echo $reviewer['organization'];?></label><br>
<label>Address:        <?php echo $reviewer['address'];?></label><br>
<label>Phone Number:   <?php echo $reviewer['phone_number'];?></label><br>
<label>Email:          <?php echo $reviewer['email'];?></label><br>

<br>

<form id="edit_form" action="edit.php" method="post">
    <input type="hidden" name="reviewer_id" value="<?php echo $reviewer_id?>">
</form>

<form id="delete_form" action="list.php" method="post">
    <input type="hidden" name="reviewer_id" value="<?php echo $reviewer_id?>">
    <input type="hidden" name="action" value="delete">
</form>

<button onclick="submit_form('edit_form')">Edit</button>
<button onclick="submit_form('delete_form')">Delete</button>

<a href="list.php">Back</a>

<script>
    function submit_form(target){
        document.getElementById(target).submit();
    }
</script>