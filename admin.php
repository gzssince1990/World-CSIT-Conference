<!DOCTYPE html>
<script>
    var ref = document.referrer;
    if(!ref){
        window.location = "index.php";
    }
</script>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>General Information</title>
    <link rel = "stylesheet" type = "text/css" href = "styles.css">
    <style type="text/css">
        .tabDiv {
            display: none;
        }
        .tabDiv:target{
            display: block;
        }
        label.tabLabel {
            background-color: darkgreen;
            color: white;
            height: 30px;
            width: 100px;
            display: inline-block;
            text-align: center;
        }
        label.tabLabel:hover {
            height: 50px;
        }
        
    </style>

</head>
<body>
    <?php 
    //$action = 'hotel.php';
    //$content_source = 'hotel.html';
    include_once 'header.php';
    //include_once 'session_control.php';
    ?>
    
    <script>
     function display(focusDiv){
         document.getElementById(focusDiv).style.display = 'block';
         if(focusDiv.localeCompare('reviewerDiv')!==0){
             document.getElementById('reviewerDiv').style.display = 'none';
         }
         if(focusDiv.localeCompare('presenterDiv')!==0){
             document.getElementById('presenterDiv').style.display = 'none';
         }
         if(focusDiv.localeCompare('attendeeDiv')!==0){
             document.getElementById('attendeeDiv').style.display = 'none';
         }
     }
    </script>
    
    <br><br>

    <label onclick="display('reviewerDiv')" class="tabLabel">reviewers</label>
    <label onclick="display('presenterDiv')" class="tabLabel">presenters</label>
    <label onclick="display('attendeeDiv')" class="tabLabel">users</label>

    
    <!--Div for reviewers-->
    <div id="reviewerDiv" name="reviewerDiv" class="tabDiv">
        <iframe name="reviewerFrame" src="reviewer_view/list.php" width="550" height="400"></iframe>
    </div> 
    
    <!--Div for presentee-->
    <div id="presenterDiv" name="presenterDiv" class="tabDiv">
        <iframe name="presenterFrame" src="presenter_view/list.php" width="550" height="400"></iframe>
    </div>
    
    <!--Div for attendees-->
    <div id="attendeeDiv" name="attendeeDiv" class="tabDiv">
        <iframe name="attendeeFrame" src="user_view/list.php" width="550" height="400"></iframe>
    </div>
    
    <?php
    include_once 'footer.php';
    ?>
</body>
</html>