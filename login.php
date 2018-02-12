<?php 
require_once 'connection.php';
session_start();

if($_SERVER['REQUEST_METHOD']=="POST"){
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    
    if(empty($username) || empty($password)){
        echo "Uzupełnij wszystkie pola!";
        
    }else{
        $sql = "SELECT * FROM users WHERE username = '$username' OR email = '$username'";
        $result = $conn -> query($sql);
        $resultRow = mysqli_num_rows($result);
        
        if($resultRow < 1){
            echo "Nieprawidłowy login lub hasło!";
            
        }else{
            
            while($row = mysqli_fetch_assoc($result)){
                
                $hashedPasswordCheck = password_verify($password, $row['password']);
                
                if($hashedPasswordCheck == false){
                     echo "Nieprawidłowy login lub hasło!";
                
                }else{
                    $_SESSION['id'] = $row['id'];
                    $_SESSION['username'] = $row['username'];
                    $_SESSION['first_name'] = $row['first_name'];
                    $_SESSION['last_name'] = $row['last_name'];
                    $_SESSION['username'] = $row['username'];
                    $_SESSION['email'] = $row['email'];
                    
                    echo "Jesteś zalogowany";
                  
                }                
            }
        }
    }    
}





?>