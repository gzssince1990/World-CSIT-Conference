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
$reviewer = $admin->get_reviewer_by_id($reviewer_id);
?>

<label>First name: <?php echo $reviewer['first_name'];?></label><br>
<label>Last name : <?php echo $reviewer['last_name'];?></label><br>
<label>username:   <?php echo $reviewer['username'];?></label><br>
<label>password:   <?php echo $reviewer['password'];?></label><br>
<br>

<form id="edit_form" action="edit.php" method="post">
    <input type="hidden" name="reviewer_id" value="<?php echo $reviewer_id?>">
</form>

<form id="paper_form" action="paper.php" method="post">
    <input type="hidden" name="reviewer_id" value="<?php echo $reviewer_id?>">
</form>

<form id="delete_form" action="list.php" method="post">
    <input type="hidden" name="reviewer_id" value="<?php echo $reviewer_id?>">
    <input type="hidden" name="action" value="delete">
</form>


<button onclick="submit_form('edit_form')">Edit</button>
<button onclick="submit_form('paper_form')">Papers</button>
<button onclick="submit_form('delete_form')">Delete</button>

<a href="list.php">Back</a>

<script>
    function submit_form(target){
        document.getElementById(target).submit();
    }
</script>