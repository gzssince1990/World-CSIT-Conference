<script>
    var ref = document.referrer;
    if(!ref){
        window.location = "index.php";
    }
</script>
<form action="upload.php" method="post" enctype="multipart/form-data">
    
    <input type="hidden" name="username" value="<?php echo $_SESSION['username']?>">
    <table>
        <tr>
            <td>Paper Title</td>
            <td><input type="text" name="paperTitle" id="paperTitle"></td>
        </tr>
        <tr>
            <td>Author</td>
            <td><input type="text" name="author" id="author"></td>
        </tr>
        <tr>
            <td>Affiliation</td>
            <td><input type="text" name="affiliation" id="affiliation"></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><input type="text" name="email" id="email"></td>
        </tr>
        <tr>
            <td>Select PDF file to upload:</td>
            <td><input type="file" name="fileToUpload" id="fileToUpload"></td>
        </tr>
        <tr>
            <td><input type="submit" value="Submit" name="submit"></td>
        </tr>
    </table>
</form>