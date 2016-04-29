<script>
    var ref = document.referrer;
    if(!ref){
        window.location = "../index.php";
    }
</script>
<!DOCTYPE html>
<html>
<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


require_once 'DBConfig.php'; 

$reviewer_id = $_POST['reviewer_id'];

if(isset($_POST['action'])){
    if ($_POST['action']=='remove') {
        $admin->remove_paper_by_id($reviewer_id,$_POST['paper_id']);
    }
    elseif ($_POST['action']=='add') {
        $admin->add_paper_by_id($reviewer_id, $_POST['paper_id']);
    }
}

$paper_all = $admin->get_all_papers();
$paper_applied = $admin->get_papers($reviewer_id);
$paper_left = $admin->get_papers_diff($reviewer_id);

//echo count($paper_left);
?>
<table border="1">
<?php foreach ($paper_applied as $paper) { ?>
<tr>
    <th>Username:</th>
    <td><?php echo $admin->get_name_by_id($paper['user_id']);?></td>    
    <th>Paper name:</th>
    <td><?php echo $paper['file_name'];?></td>
    <td><button onclick="remove_paper('<?php echo $paper['paper_id']; ?>')">Remove</button></td>
</tr>
<form id="<?php echo 'r'.$paper['paper_id']; ?>" action="paper.php" method="post">
    <input type="hidden" name="reviewer_id" value="<?php echo $reviewer_id; ?>">
    <input type="hidden" name="paper_id" value="<?php echo $paper['paper_id']; ?>">
    <input type="hidden" name="action" value="remove">
</form>
<?php } ?>
</table>


<!--for add new paper to the current reviewer-->
<select id="mySelect">
<?php foreach($paper_left as $paper){?>
    <option value="<?php echo $paper['paper_id'];?>">
        <?php echo $paper['paper_id'].'   '.$admin->get_name_by_id($paper['user_id']).'   '.$paper['file_name']?>
    </option>
<?php } ?>
</select>

<button onclick="add_paper()">Add</button>
<?php foreach ($paper_left as $paper) { ?>
    <form id="<?php echo 'a'.$paper['paper_id']; ?>" action="paper.php" method="post">
        <input type="hidden" name="reviewer_id" value="<?php echo $reviewer_id; ?>">
        <input type="hidden" name="paper_id" value="<?php echo $paper['paper_id']; ?>">
        <input type="hidden" name="action" value="add">
    </form>
<?php } ?>


<!--For go back-->
<form id="back_form" action="info.php" method="post">
    <input type="hidden" name="reviewer_id" value="<?php echo $reviewer_id;?>">
</form>
<a href="#" onclick="goback()">Back</a>

<script>
    function goback(){
        document.getElementById('back_form').submit();
    }
    function remove_paper(pid){
        document.getElementById('r'+pid).submit();
    }
    function add_paper(){
        var pid = document.getElementById("mySelect").value;
        document.getElementById("demo").innerHTML = pid;
        document.getElementById('a'+pid).submit();
    }
</script>




<p id="demo"></p>



</html>