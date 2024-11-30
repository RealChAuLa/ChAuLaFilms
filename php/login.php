<?php

include "config.php" ;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "select * from logintbl where email = '$email' and password = '$password'";  

    $result = mysqli_query($conn, $sql);  
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $count = mysqli_num_rows($result);  
        
    if($count == 1){ 
        session_start();
        $_SESSION["loggedin"] = true ; 
        $_SESSION["userid"] = $row["username"];
        $_SESSION["uName"] = $row["first_name"];
        $_SESSION["userNo"] = $row["user_id"];
        $_SESSION["type"] = $row["type"];
        if ($_SESSION["type"] == "admin") {
            header("Location: ../admin.php");
        } else {
             header("Location: ../chaulafilms.php");
        }
        exit;
    }  
    else{
        $_SESSION["NOTloggedin"] = false ; 
        echo '<script>
            var count = 5;
            document.write("Username or password incorrect. Redirecting in ");
            var redirectTimer = setInterval(function() {
                
                if (count > 0) {
                    document.open();
                    document.write("Username or password incorrect. Redirecting in " + count + " seconds");
                    count--;
                } else {
                    clearInterval(redirectTimer);
                    window.location.href = "../ChAuLaFilms.php";
                }
            }, 1000);
          </script>';
        }  
        $conn->close();

}



