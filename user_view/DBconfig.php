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
$DB_host = "localhost";
$DB_user = "root";
$DB_pass = "";
$DB_name = "user_info";

try
{
     $DB_con = new PDO("mysql:host={$DB_host};dbname={$DB_name}",$DB_user,$DB_pass);
     $DB_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
     echo $e->getMessage();
}


include_once '../class/admin.php';
$admin = new ADMIN($DB_con);
