<?php
    require("config.php");
   
    $submitted_username = '';
    if(!empty($_POST)){
        $query = "
            SELECT
                uid,
                uage,
                uname,
                uphone,
                upassword,
                salt
            FROM User
            WHERE
                uname = :username
        ";
        $query_params = array(
            ':username' => $_POST['username']
        );

        try{
            $stmt = $db->prepare($query);
            $result = $stmt->execute($query_params);
        }
        catch(PDOException $ex){ die("Failed to run query: " . $ex->getMessage()); }
        $login_ok = false;
        $row = $stmt->fetch();
        if($row){
            $check_password = hash('sha256', $_POST['password'] . $row['salt']);
            for($round = 0; $round < 65536; $round++){
                $check_password = hash('sha256', $check_password . $row['salt']);
            }
   
               
            if($check_password === $row['upassword']){
                
                $login_ok = true;
            }
        }
         
        if($login_ok){
            
            unset($row['salt']);
            unset($row['upassword']);
            $_SESSION['uid'] = $row['uid'];
            $_SESSION['flag'] = NUll;
            $_SESSION['search'] = NULL;
            header("Location: playify.php");
            die("Redirecting to: playify.php");
        }
        else{
            print("Login Failed.");
            $submitted_username = htmlentities($_POST['username'], ENT_QUOTES, 'UTF-8');
        }

    }
?>
