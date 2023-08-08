<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Register Here!</title>   
</head>
<body>
    
    <div class="signUp">
        <h2>Sign-up here.</h2>
        
        <form action="script/signup.php" method="POST" novalidate>
            
            <p class="error" id="username-error"></p>
            <input type="text" name="Username" id="Username" placeholder="Username" />
            
            <p class="error" id="email-error"></p>
            <input type="email" name="Email" id="Email" placeholder="E-mail" />
            
            <p class="error" id="password-error"></p>
            <input type="password" name="NewPassword" id="password" placeholder="New Password" /> 
            <div class="check">
                <input type="checkbox" id="showPassword"  />
                <label for="showPassword">Show Password</label>                
            </div>
            
            <p class="error" id="rePassword-error"></p>
            <input type="password" name="RePassword" id="password2" placeholder="Re-Enter Password" />
            <div class="check">
                <input type="checkbox" id="showPassword2"  />
                <label for="showPassword2">Show Password</label>
            </div>
            
            <input type="submit" name="submit" id="submit" value="&nbsp; Sign Up &nbsp;" />
            <p id="submit-title"></p>
            
        </form> 
        
        <script src="script/SignUpValidation.js"></script>
        
        <p>Sign up already? <a href="login.php">Login here</a></p>
        
        <div class="sec-title">
            Security is an essential component for privacy.
        </div>
        
        <!-- SCRIP FOR SHOW PASSWORD -->
        
        <script>
            
            var password = document.getElementById('password');
            var password2 = document.getElementById('password2');
            var showPassword = document.getElementById('showPassword');
            var showPassword2 = document.getElementById('showPassword2');
            
            showPassword.addEventListener('click', (event) => {
                if (showPassword.checked) {
                    password.type = 'text';
                } else {
                    password.type = 'password';
                }
            });
                        
            showPassword2.addEventListener('click', (event) => {
                if (showPassword2.checked) {
                    password2.type = 'text';
                } else {
                    password2.type = 'password';
                }
            });
            
        </script> 
        
    </div>    
    
</body>
</html>