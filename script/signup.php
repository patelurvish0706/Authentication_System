<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/validate.css">
    <title>SignUp Status</title>
    </head>
<body>

<?php

    function goBackButton() {
        return '
            <div class="goback">
            <p>click on Go Back button to fix error.</p>
            <button onclick="goBack()">Go Back</button>
            <script>
                function goBack() {
                    history.back();
                }
            </script>
            <div>
        ';
    }

    
    // --- Username --- 
    
    if(empty($_POST["Username"])){
        die("<h2> Username is required. </h2>".goBackButton());
        
    }

    if (strpos($_POST["Username"], ' ') !== false) {
        die("<h2>Username cannot contain spaces.</h2>".goBackButton());
    }    

    // --- NewPassword ---
    
    if(empty($_POST["NewPassword"])){
        die("<h2>Password is required.</h2>".goBackButton());
    }
    
    if (strlen($_POST["NewPassword"]) < 8){
        die("<h2>Password must be atleast 8 characters.</h2>".goBackButton());
    }

    if (! preg_match("/[a-z]/i", $_POST["NewPassword"])){
        die("<h2>Password must contain at least a Uppercase and Lowercasel etter.</h2>".goBackButton());
    }

    if (! preg_match("/[A-Z]/", $_POST["NewPassword"])){
        die("<h2>Password must contain al least a Capital letter.</h2>".goBackButton());
    }

    if (! preg_match("/[0-9]/", $_POST["NewPassword"])){
        die("<h2>Password must contain al least a Numeber.</h2>".goBackButton());
    }

    // --- RePassword ---

    if(empty($_POST["RePassword"])){
        die("<h2>Confirm Password is required.</h2>".goBackButton());
    }

    if($_POST["RePassword"] !== $_POST["NewPassword"]){
        die("<h2>Confirm Password must match.</h2>".goBackButton());
    }
    
    // --- Email ---

    if ( ! filter_var($_POST["Email"], FILTER_VALIDATE_EMAIL)){
        die("<h2>Please enter valid Email.</h2>".goBackButton());
    }

    // --- Save Data and go Else Error

    require_once __DIR__ . '/database.php';
 
    $username = $_POST['Username'];
    $email = $_POST['Email'];
    $password = $_POST['NewPassword'];

    $password_hash = password_hash($password, PASSWORD_DEFAULT);
    
    $sql = "INSERT INTO users (Uname, email, password_hash) VALUES (?, ?, ?)";
    $stmt = $mysqli->prepare($sql);
    
    if ($stmt === false) {
        die('Error preparing statement: ' . $mysqli->error);
    }
    
    $stmt->bind_param('sss', $username, $email, $password_hash);
    
    
    if ($stmt->execute()) {      
        
        echo "<h2 style='color:black;'>Signup success.</h2>
        <p>Redirecting to the Login page.</p>
        <p><a href='../login.php'>click here</a> &nbsp to redirect manually.</p>";
        echo '<meta http-equiv="refresh" content="5;url=../login.php">';
    
    mysqli_close($mysqli);
    exit;
    
    } else {
        $error_code = $stmt->errno;
    
        $error_message = $stmt->error;
        
        if ($error_code === 1062) {
            mysqli_close($mysqli);
            echo "<h2>Email already exists!</h2>"."<p>Choose another Email.</p>".goBackButton();
            echo '<script type="text/javascript">
              setTimeout(function() {
                  history.back();
              }, 5000); // 5000 milliseconds (5 seconds)
          </script>';
            exit;
        }
    
        echo 'Error inserting record: ' . $error_message . ' (Error Code: ' . $error_code . ')';
    }
    
    
    $stmt->close();
    
    $mysqli->close();
    
?>
    
</body>
</html>
    