<script>
    var ref = document.referrer;
    if(!ref){
        window.location = "index.php";
    }
</script>
<?php
class ADMIN
{
    private $db;
 
    function __construct($DB_con)
    {
      $this->db = $DB_con;
    }
    
    public function get_reviewers() {
        $stmt = $this->db->prepare("SELECT * FROM reviewer");
        $stmt->execute();
        $rows=$stmt->fetchAll(PDO::FETCH_ASSOC);
        
        return $rows;
    }
    
    public function get_reviewer_by_id($rid){
        $stmt = $this->db->prepare("SELECT * FROM reviewer WHERE reviewer_id=:rid");
        $stmt->bindparam(":rid", $rid);
        $stmt->execute();
        $row=$stmt->fetch(PDO::FETCH_ASSOC);
        
        return $row;        
    }
    
    public function update_by_id($rid,$fname,$lname,$uname,$upass) {
        try {
            $stmt = $this->db->prepare("UPDATE reviewer SET first_name=:fname, "
                    . "last_name=:lname, username=:uname, password=:upass "
                    . "WHERE reviewer_id=:rid");

            $stmt->bindparam(":rid", $rid);
            $stmt->bindparam(":fname", $fname);
            $stmt->bindparam(":lname", $lname);
            $stmt->bindparam(":uname", $uname);
            $stmt->bindparam(":upass", $upass);            
            $result = $stmt->execute();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }

    }
    
    public function delete_by_id($rid) {
        try {
            $stmt = $this->db->prepare("DELETE FROM reviewer WHERE reviewer_id=:rid");
            $stmt->bindparam(":rid", $rid);
            $result = $stmt->execute();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }

    }
    
    public function insert($fname,$lname,$uname,$upass){
        $stmt = $this->db->prepare("INSERT INTO reviewer(first_name, last_name, "
                . "username,password) VALUES(:fname, :lname, :uname, :upass)");
        $stmt->bindparam(":fname", $fname);
        $stmt->bindparam(":lname", $lname);
        $stmt->bindparam(":uname", $uname);
        $stmt->bindparam(":upass", $upass);          
        $result = $stmt->execute();
    }
    
    public function get_papers($rid){
        $stmt = $this->db->prepare("SELECT * "
                . "FROM paper p "
                . "JOIN group_paper gp ON gp.paper_id=p.paper_id  "
                . "JOIN reviewer rv ON rv.reviewer_id=gp.group_id "
                . "WHERE rv.reviewer_id=:rid");

        $stmt->bindparam(":rid", $rid);
        $stmt->execute();
        $rows=$stmt->fetchAll(PDO::FETCH_ASSOC);

        return $rows;
    }
    
    public function get_papers_diff($rid) {
        $rows_applied = $this->get_papers($rid);
        $rows_all = $this->get_all_papers();
        $rows_left = [];
        
        foreach ($rows_all as $i => $paper) {
            $is_applied = false;
            foreach ($rows_applied as $j => $paper_applied) {
                if($paper['paper_id']==$paper_applied['paper_id']){
                    $is_applied = true;
                }
            }
            if(!$is_applied){
                $rows_left[] = $paper;
            }
        }

        
        
        return $rows_left;
    }
    
    public function get_all_papers(){
        $stmt = $this->db->prepare("SELECT * FROM paper");
        $stmt->execute();
        $rows=$stmt->fetchAll(PDO::FETCH_ASSOC);

        return $rows;
    }
    
    public function get_name_by_id($uid) {
        $stmt = $this->db->prepare("SELECT * FROM auth WHERE user_id=:uid");
        $stmt->bindparam(":uid",$uid);
        $stmt->execute();
        $row=$stmt->fetch(PDO::FETCH_ASSOC);
        
        return $row['username'];
    }
    
    public function remove_paper_by_id($rid,$pid) {
        try {
            $stmt = $this->db->prepare("DELETE FROM group_paper WHERE group_id=:rid AND paper_id=:pid");
            $stmt->bindparam(":rid", $rid);
            $stmt->bindparam(":pid", $pid);
            $result = $stmt->execute();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    
    public function add_paper_by_id($rid,$pid) {
        try {
            $stmt = $this->db->prepare("INSERT INTO group_paper(group_id, paper_id) VALUES(:rid,:pid)");
            $stmt->bindparam(":rid", $rid);
            $stmt->bindparam(":pid", $pid);
            $result = $stmt->execute();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    
    public function get_presenters() {
        $identity = 'Presenter';
        $stmt = $this->db->prepare("SELECT * FROM auth WHERE identity=:identity");
        $stmt->bindparam(":identity",$identity);
        $stmt->execute();
        $rows=$stmt->fetchAll(PDO::FETCH_ASSOC);
        
        return $rows;
    }
    
    public function get_user_by_id($uid) {
        $stmt = $this->db->prepare("SELECT * FROM auth WHERE user_id=:uid");
        $stmt->bindparam(":uid",$uid);
        $stmt->execute();
        $row=$stmt->fetch(PDO::FETCH_ASSOC);
        
        return $row;
    }
    
    public function update_by_uname($uname,$upass,$uid,
                $fname,$lname,$title,$company,$organ,$addr,
                $phone,$email){
        try {
            if(empty($upass)){
                $stmt = $this->db->prepare("UPDATE auth SET identity=:uid,"
                        . " first_name=:fname, last_name=:lname, title=:title,"
                        . " company=:company, organization=:organ, address=:addr,"
                        . " phone_number=:phone, email=:email "
                        . "WHERE reviewer_id=:rid");
            }
            else {
                $upass_hash = password_hash($upass, PASSWORD_DEFAULT);
                $stmt = $this->db->prepare("UPDATE auth SET identity=:uid,"
                        . " first_name=:fname, last_name=:lname, title=:title,"
                        . " company=:company, organization=:organ, address=:addr,"
                        . " phone_number=:phone, email=:email, password=:upass "
                        . "WHERE username=:uname");
                $stmt->bindparam(":upass", $upass_hash);            
            }
            
            $stmt->bindparam(":uname", $uname);
            $stmt->bindparam(":uid"  , $uid);
            $stmt->bindparam(":fname", $fname);
            $stmt->bindparam(":lname", $lname);
            $stmt->bindparam(":title", $title);
            $stmt->bindparam(":company", $company);
            $stmt->bindparam(":organ", $organ);
            $stmt->bindparam(":addr", $addr);
            $stmt->bindparam(":phone", $phone);
            $stmt->bindparam(":email", $email);
            $result = $stmt->execute();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    
    public function get_users() {
        $identity = 'Presenter';
        $stmt = $this->db->prepare("SELECT * FROM auth WHERE identity<>:identity");
        $stmt->bindparam(":identity",$identity);
        $stmt->execute();
        $rows=$stmt->fetchAll(PDO::FETCH_ASSOC);
        
        return $rows;
    }
    
    
    
    
    
    
    
    
    
    
    
    
        public function register($uname,$upass,$uchek,$uid)
    {        
        if(empty($uname)){
            $err['username'] = 'username is required';
        }
        elseif(empty($upass)) {
            $err['password'] = 'password is required';
        }
        elseif(empty($uchek)){
            $err['passchek'] = 'Please reenter your password';
        }
        elseif ($upass != $uchek) {
            $err['passchek'] = 'Passwords does not match';

        }
        elseif(empty($uid)){
            $err['identity'] = 'Identity is required';
        }
        else{
            try {
                $err = [];
                
                $query = "SELECT * FROM $this->table WHERE username='$uname'";
                echo $this->table;
                $result = $this->db->query($query);
                $row = $result->fetch();

                if($row['username'] == $uname){
                    $err['username'] = 'Username exists, please try another one';
                }
                else {
                    $new_password = password_hash($upass, PASSWORD_DEFAULT);
                    $stmt = $this->db->prepare("INSERT INTO $this->table(username,password,identity) VALUES(:uname, :upass, :uid)");

                    $stmt->bindparam(":uname", $uname);
                    $stmt->bindparam(":upass", $new_password);
                    $stmt->bindparam(":uid", $uid);            
                    $result = $stmt->execute();


                    //$query = "INSERT INTO auth(username,password)"
                            //. "VALUES(:username,:password)";
                    //$prepare = $db->prepare($query);
                    //$result = $prepare->execute(array(':username'=>$username,':password'=>$password));
                    if($result == 1){
                        header('Location: '. filter_input(INPUT_POST, 'ref'));
                        session_start();
                        $_SESSION['username'] = $uname;
                        $_SESSION['table'] = $this->table;
                    }
                    else {
                        echo 'Something wrong!';
                    }
                }

            }catch (PDOException $ex){
                echo $ex->getMessage();
            }
        }
        
        return $err;
    }
 
    public function login($uname,$upass,$is_hash)
    {
        $error_code = 1;
        if(empty($uname) or empty($upass))
        {
            $error_code = -2;
        }
        else
        {
            $stmt = $this->db->prepare("SELECT * FROM $this->table WHERE username=:uname");
            $stmt->bindparam(":uname", $uname);
            $stmt->execute();
            $row=$stmt->fetch(PDO::FETCH_ASSOC);
            
        
            if($stmt->rowCount() > 0)
            {
                
                if($is_hash and password_verify($upass, $row['password']))
                {
                    $_SESSION['username'] = $uname;
                    $_SESSION['table'] = $this->table;
                }
                elseif(!$is_hash and $upass == $row['password']){
                    $_SESSION['username'] = $uname;
                    $_SESSION['table'] = $this->table;
                }
                else
                {
                    $error_code = -1;
                }
            }
            else{
                $error_code = 0;
            }
        }
        return $error_code;
    }
 

    
   public function is_loggedin()
   {
      if(isset($_SESSION['user_session']))
      {
         return true;
      }
   }
 
   public function redirect($url)
   {
       header("Location: $url");
   }
 
   public function logout()
   {
        session_destroy();
        unset($_SESSION['user_session']);
        return true;
   }
}
?>
