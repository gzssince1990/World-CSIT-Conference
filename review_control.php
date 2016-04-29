<script>
    var ref = document.referrer;
    if(!ref){
        window.location = "index.php";
    }
</script>

<?php

if($_SESSION['table'] == 'reviewer'){
    $DB_table = 'reviewer';
    $dir = 'uploads/';
    require_once 'DBConfig.php';
    $files = $user->get_papers($_SESSION['username']);
}
else{
    $dir = 'uploads/'.$username.'/';
    if(!file_exists($dir)){
        mkdir($dir,0777);
    }

    $files = scandir($dir);

    if(count($files)<3){
        echo 'No file submission yet.';
    }
}

foreach ($files as $index=>$file){
    if($file!='.' and $file!='..'){
        //$fileStr = substr($file,0, strripos($file, '.'));
        $path = $dir.$file;
        echo "<button onclick=\"test('$path')\">$file</button>".'<br>';
    }
}

?>

<br>
<div id="frameDiv">
    <iframe id="frame" src="http://www.w3schools.com" width='700px' height='700px' type='application/pdf'></iframe>
</div>    
<script type="text/javascript">
    document.getElementById('frameDiv').style.display = 'none';
    
    function test(path){
        var pdfWindow = document.getElementById('frame').contentWindow;
        pdfWindow.location.href = path;
        if(document.getElementById('frameDiv').style.display === 'none'){
            document.getElementById('frameDiv').style.display = 'block';
        }
    }

</script>

