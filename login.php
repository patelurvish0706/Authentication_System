<?php   // --- Login.php ---

    $is_invalid = false;

    if($_SERVER["REQUEST_METHOD"] === "POST"){

        $mysqli = require __DIR__ . '/script/database.php';

        $sql = sprintf("SELECT * FROM users WHERE email = '%s'", $mysqli->real_escape_string($_POST["email"]));

        $result = $mysqli->query($sql);

        $user = $result->fetch_assoc();

        if ($user){
            
            // password_verify convert password to hash itself and compare to hash
            
            if (password_verify($_POST["Password"],$user["password_hash"])){

                session_start();

                session_regenerate_id();

                $_SESSION["user_id"] = $user["id"];
                
                header ("Location:index.php");
                exit;

            }
        }
    
        $is_invalid = true;

    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style/style.css">
    <title>Login Here!</title>
</head>
<body>

    <div class="logIn">
        <h2>Log-In here.</h2>

        <?php if($is_invalid): ?>
            <style> .error{ display: block; } </style>
            <p class="error" id="login-error">Invalid Login.</p>
            <script>
                const loginError = document.getElementById("login-error");

                setTimeout(() => {
                    loginError.style.display = "none";
                }, 6000);
            </script>

        <?php endif; ?>
    
    
        <form action="" method="POST" novalidate>

            <input type="email" name="email" id="Email" placeholder="E-mail" value="<?= htmlspecialchars($_POST["email"] ?? "") ?>">
            <p class="error" id="email-error"></p>
                
            <input type="password" name="Password" id="password" placeholder="Password">
            <div class="check">
                <input type="checkbox" id="showPassword"  />
                <label for="showPassword">Show Password</label>
            </div>
                
            <p class="error" id="password-error"></p>
                
            <p><a href="#">Forgot Password</a></p>
            <input type="submit" value="&nbsp; Log In &nbsp;">

        </form>

        <p>Not a member? <a href="signup.php">Register here</a></p>
            
        <div class="sec-title">
            Security is an essential component for privacy.
        </div>
            
    </div>
            
    <script>
        const password = document.getElementById('password');
        const showPassword = document.getElementById('showPassword');
        
        showPassword.addEventListener('click', (event) => {
            if (showPassword.checked) {
                password.type = 'text';
            } else {
                password.type = 'password';
            }
        });
    </script>
    
</body>
</html>