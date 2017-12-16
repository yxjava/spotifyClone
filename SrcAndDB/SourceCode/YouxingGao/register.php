<?php
        require("config.php");
        if(!empty($_POST))
        {
            // Ensure that the user fills out fields
            if(empty($_POST['username']))
            { die("Please enter a username."); }
            if(empty($_POST['password']))
            { die("Please enter a password."); }
            if(preg_match("/^[0-9]{3}-[0-9]{4}-[0-9]{4}$/", $_POST['phone_number'])) {
               die("Invalid phone number");// $phone is not valid
             }
             if($_POST['password']!= $_POST['rpassword']){
                 die("please confirm your password");
             }
            // Check if the username is already taken
            $query = "
                SELECT
                    1
                FROM User
                WHERE
                    uname = :username
            ";
            $query_params = array( ':username' => $_POST['username'] );
            try {
                $stmt = $db->prepare($query);
                $result = $stmt->execute($query_params);
            }
            catch(PDOException $ex){ die("Failed to run query: " . $ex->getMessage()); }
            $row = $stmt->fetch();
            if($row){ die("This username is already in use"); }
            $query = "
                SELECT
                    1
                FROM User
                WHERE
                     uphone = :phone
            ";
            $query_params = array(
                ':phone' => $_POST['phone_number']
            );
            try {
                $stmt = $db->prepare($query);
                $result = $stmt->execute($query_params);
            }
            catch(PDOException $ex){ die("Failed to run query: " . $ex->getMessage());}
            $row = $stmt->fetch();
            if($row){ die("This phone number is already registered"); }

            // Add row to database
            $query = "
                INSERT INTO User (
                    uage,
                    uname,
                    uphone,
                    upassword,
                    salt
                    
                ) VALUES (
                    :age,
                    :username,
                    :phone,
                    :password,
                    :salt
                    
                )
            ";

            // Security measures
            $salt = dechex(mt_rand(0, 2147483647)) . dechex(mt_rand(0, 2147483647));
            $password = hash('sha256', $_POST['password'] . $salt);
            for($round = 0; $round < 65536; $round++){ $password = hash('sha256', $password . $salt); }
            $query_params = array(
                ':age' => $_POST['age'],
                ':username' => $_POST['username'],
                ':phone' => $_POST['phone_number'],
                ':password' => $password,
                ':salt' => $salt
               
            );
            try {
                $stmt = $db->prepare($query);
                $result = $stmt->execute($query_params);
            }
            catch(PDOException $ex){ die("Failed to run query: " . $ex->getMessage()); }
        }
        header("Location: index.php");?>
