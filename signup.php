<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Online Registration</title>
    <link rel = "stylesheet" type = "text/css" href = "styles.css">
</head>
<body>
    <?php 
    $action = 'signup.php';
    include_once 'header.php';
    include 'login_form_before.php';
    $referrer = filter_input(INPUT_SERVER, 'HTTP_REFERER');
    if (!isset($referrer)) {
        header('Location: index.php');
    }
    else{
        if(substr($referrer, strripos($referrer, '/')+1) == $action){
            $referrer = filter_input(INPUT_POST, 'ref');
        }
    }

    $signup_action = filter_input(INPUT_POST, 'action');
    if(isset($signup_action)){
        if($signup_action == 'signup'){
            $username = filter_input(INPUT_POST, 'username');
            $password = filter_input(INPUT_POST, 'password');
            $password_check = filter_input(INPUT_POST, 'password_check');
            $identity = filter_input(INPUT_POST, 'identity');
            $first_name = filter_input(INPUT_POST, 'first_name');
            $last_name = filter_input(INPUT_POST, 'last_name');
            $title = filter_input(INPUT_POST, 'title');
            $company = filter_input(INPUT_POST, 'company');
            $organization = filter_input(INPUT_POST, 'organization');
            $address = filter_input(INPUT_POST, 'address');
            $phone_number = filter_input(INPUT_POST, 'phone_number');
            $email = filter_input(INPUT_POST, 'email');
            
            echo $username;
            echo $password;
            echo $password_check;
            echo $identity;
            echo $first_name;
            echo $last_name;
            echo $title;
            echo $company;
            echo $organization;
            echo $address;
            echo $phone_number;
            echo $email;
            
            $DB_table = 'auth';
            require_once 'DBConfig.php';
            $error = $user->register($username,$password,$password_check,
                    $identity,$first_name,$last_name,$title,$company,$organization,
                    $address,$phone_number,$email);
            
            
        }//end of registration;
    }
    
    ?>
    
    <form action="signup.php" method="post" autocomplete="on">
        <input type="hidden" name="action" value="signup">
        <input type="hidden" name="ref" value=<?php echo $referrer;?>>
        
        <table>
            <tbody>    
                <tr>
                    <th>Username</th>
                    <th><input type="text" name="username" value=<?php echo isset($username) ? $username:'';?>></th>
                    <td><?php if(isset($error['username'])){echo $error['username'];}?></td>
                </tr>


                <tr>
                    <th>Enter Password</th>
                    <th><input type="password" name="password" value=<?php echo isset($password) ? $password:'';?>></th>
                    <td><?php if(isset($error['password'])){ echo $error['password'];}?></td>
                </tr>


                <tr>
                    <th>Re-enter Password</th>
                    <th><input type="password" name="password_check" value=<?php echo isset($password_check) ? $password_check:''; ?>></th>
                    <td><?php if(isset($error['passchek'])){ echo $error['passchek'];}?></td>
                    <?php //echo $error['passchek'];?>
                </tr>
                
                <tr>
                    <th>Select your identity:</th>
                    <th>
                        <select name="identity">
                            <option <?php echo isset($identity)&&($identity=='Author') ? 'selected':''; ?>>Author</option>
                            <option <?php echo isset($identity)&&($identity=='Presenter') ? 'selected':''; ?>>Presenter</option>
                            <option <?php echo isset($identity)&&($identity=='Student') ? 'selected':''; ?>>Student</option>
                            <option <?php echo isset($identity)&&($identity=='Regular Attendee') ? 'selected':''; ?>>Regular Attendee</option>
                            <td><?php if(isset($error['identity'])){ echo $error['identity'];}?></td>
                        </select>
                    </th>
                </tr>
                
            <tr>
                <th>First Name</th>
                <th><input type="text" name="first_name"></th>
            </tr>

            <tr>
                <th>Last Name</th>
                <th><input type="text" name="last_name"></th>
            </tr>

            <tr>
                <th>Title</th>
                <th><input type="text" name="title"></th>
            </tr>

            <tr>
                <th>Company</th>
                <th><input type="text" name="company"></th>
            </tr>

            <tr>
                <th>Organization</th>
                <th><input type="text" name="organization"></th>
            </tr>

            <tr>
                <th>Address</th>
                <th><input type="text" name="address"></th>
            </tr>

            <tr>
                <th>Phone Number</th>
                <th><input type="tel" name="phone_number"></th>
            </tr>

            <tr>
                <th>Email Address</th>
                <th><input type="email" name="email"></th>
            </tr>
                
                
                <tr>
                    <th><input type="submit" class="myButton" value="Submit"></th>
                    <th><input type="reset" class="myButton" value="Clear"></th>
                </tr>
            </tbody>
        </table>
    </form>
    
    <?php
    include_once 'footer.php';
    ?>
</body>
</html>
