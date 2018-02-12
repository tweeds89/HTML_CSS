<?php

if($_SERVER['REQUEST_METHOD']=="POST"){
    
    require_once 'connection.php';
 
     
    $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    
    //Sprawdzenie pustych pól
    if(empty($first_name) || empty($last_name) || empty($email) || empty($username) || empty($password)){      
       echo "Należy uzupełnić wszystkie pola!";
       
    }else{      
        //Sprawdzenie poprawności znaków
        if (!preg_match("/^[a-zA-ZąĄćĆęĘłŁńŃóÓśŚźŹżŻ]*$/", $first_name) || !preg_match("/^[a-zA-ZąĄćĆęĘłŁńŃóÓśŚźŹżŻ]*$/", $last_name)){
           echo "Wprowadzono niedozwolone znaki!";
           
        }else{            
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                echo "Sprawdź poprawność adresu e-mail!"; 
                
           }else{
                $sql = "SELECT * FROM users WHERE username ='$username'";
                $result = $conn ->query($sql);
                $resultCheck = mysqli_num_rows($result);
                
                if($resultCheck > 0){
                   echo "Login jest zajęty!";  
                   
                }else{                 
                    $hashedPass = password_hash($password, PASSWORD_DEFAULT);
                    
                    //Wprowadzenie użytkownika do bazy
                    $sql = "INSERT INTO users (first_name, last_name, email,
                            username, password) VALUES ('$first_name', '$last_name', '$email',
                            '$username', '$hashedPass');";
                    $result= $conn ->query($sql);
                    echo "Rejestracja zakończona sukcesem!";   
                }
           }
        }
    }   
}else{
    header("Location: signupForm.php");
    exit();
}
  