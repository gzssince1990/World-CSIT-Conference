<script>
    var ref = document.referrer;
    if(!ref){
        window.location = "../index.php";
    }
</script>
<style>
    label {
        color: blue;
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
    if($_POST['action']=='delete'){
        $reviewer_id = $_POST['reviewer_id'];
        
        $admin->delete_by_id($reviewer_id);
    }
    elseif($_POST['action']=='insert'){
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        $admin->insert($first_name,$last_name,
                $username,$password);
    }
}

$reviewers = $admin->get_presenters();

foreach ($reviewers as $reviewer){ ?>
    <form id="<?php echo $reviewer['username'];?>" action="info.php" method="post">
        <label onclick="go_to_info('<?php echo $reviewer['username'];?>')">
            <?php echo $reviewer['first_name'].' '.$reviewer['last_name'];?>
        </label>
        <input type="hidden" name="reviewer_id" value="<?php echo $reviewer['user_id']?>">
    </form>
<?php }?>


<script>
    function go_to_info(reviewer){
        document.getElementById(reviewer).submit();
    }
</script>