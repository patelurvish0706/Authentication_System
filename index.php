<?php 

    session_start();

    if(isset($_SESSION["user_id"])){

        $mysqli = require __DIR__ . "/script/database.php";

        $sql = "SELECT * FROM users WHERE id={$_SESSION["user_id"]}";

        $user = $mysqli->query($sql)->fetch_assoc();

    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="style/index.css">
    <title>Hey Urvish!</title>
</head>

<body>

    <?php if(isset($user)){ ?>
            
    <div id="navos">
        <div id="title">Hey amigo! <?= htmlspecialchars($user["Uname"]) ?>.</div>
        <div id="inOut">
            <ul>
                <li><a href="script/logout.php">Logout</a></li>
            </ul>
        </div>
    </div>

    <div class="header">
        <p class="translateX" id="lit-title1" data-speed="-1.1">Hi, I am</p>
        <p class="translateX" id="Urvish" data-speed="-1">Urvish patel</p>
        <p class="translateX" id="Urvish2" data-speed="-0.5">Urvish patel</p>
        <p class="translateX" id="Urvish3" data-speed="-0.7">Urvish patel</p>
        <p class="translateX" id="lit-title2" data-speed="-0.3">Let me tell you about myself...</p>
    </div>
    <div class="section1" id="section1">
        <h2>Who i am?</h2><br><br>
        <p class="cont 1">
        I am a fresh graduate who just completed my diploma in Information Technology in June 2023. My creativity lies in creating unique and different things from one thing. I enjoy doing things that keep me busy and help me improve myself. I also enjoy reading new popular books, even if they are not related to IT, as they provide me with a lot of satisfaction.
        </p><br><br>
        <p class="cont 2">
        To the point, I am a <b>Front-end developer</b> skilled in HTML5, CSS, and my favorite, JavaScript. While I still do not fully understand some concepts of JavaScript, I am confident that I will eventually master them. One of my best habits is to learn until I fully understand something, and I am always willing to go the extra mile to get to the root of a problem.
        </p><br><br>
        <p class="cont 3">
        At this time, I am learning React. Even though I do not have a deep knowledge of JavaScript, I am confident that I will be able to learn it. The only reason why React seems complex to me is because I have never tried to do too many things with a single flow.
        </p><br><br><br><br><br><br>

        <h2>Frontend Skills</h2><br><br><br><br>

        <div class="pageFrame" id="pageFrame">

            <div class="skills-container">

                <div class="skill">
                    <span class="skill-name">HTML</span>
                    <div class="skill-bar">
                        <div class="skill-progress html-progress"></div>
                    </div>
                </div>

                <div class="skill">
                    <span class="skill-name">CSS</span>
                    <div class="skill-bar">
                        <div class="skill-progress css-progress"></div>
                    </div>
                </div>

                <div class="skill">
                    <span class="skill-name">JavaScript</span>
                    <div class="skill-bar">
                        <div class="skill-progress js-progress"></div>
                    </div>
                </div>

                <div class="skill">
                    <span class="skill-name">PHP</span>
                    <div class="skill-bar">
                        <div class="skill-progress php-progress"></div>
                    </div>
                </div>

                <div class="skill">
                    <span class="skill-name">MySQL</span>
                    <div class="skill-bar">
                        <div class="skill-progress mysql-progress"></div>
                    </div>
                </div>

            </div>

        </div>

        <br><br><br><br><br><br>
        <h2>Magic using these skills</h2><br><br><br><br>
        <div class="cont 3">
            <ul>
                <li>The Language Translator</li>
                <li><a href="https://github.com/patelurvish0706/Signup-login">Working Login and Signup Page.</a></li>
            </ul>
        </div>

        <br><br><br><br><br><br>
        <h2>How can i help you?</h2><br><br><br><br>
        <div class="cont 3">
            <ul>
                <li>In Projects</li>
                <li>Developing Webpage</li>
                <li>Web Application</li>
                <li>User Friendly UI</li>
            </ul>
        </div>



        <div class="section2">
            <div class="foo-box">
                <p class="copyR"> © All rights are reserved by Urvish Patel.</p>
            </div>
        </div>
    </div>

    <script>

        // slide left text 

        const translateX = document.querySelectorAll(".translateX");
        window.addEventListener("scroll", () => {
            let scroll = window.pageYOffset;
            translateX.forEach(element => {
                let speed = element.dataset.speed;
                element.style.transform = `translateX(${scroll * speed}px)`;

                // fade in fade out

                window.addEventListener("scroll", function () {
                    var section1 = document.querySelector(".section1");
                    var pageFrame = document.querySelector(".pageFrame");

                    if (window.scrollY > section1.offsetTop + 100) {
                        // section1.style.opacity = 0;
                        pageFrame.style.opacity = 1;
                    } else {
                        pageFrame.style.opacity = 0;
                        section1.style.opacity = 1;
                    }
                });



            })
        })


        // You can adjust the skill levels here from 0 to 100.
        var htmlSkillLevel = 90;
        var cssSkillLevel = 80;
        var jsSkillLevel = 70;
        var phpSkillLevel = 60;
        var mysqlSkillLevel = 50;

        // Set the progress width of each skill based on their skill level.
        document.querySelector('.html-progress').style.width = htmlSkillLevel + '%';
        document.querySelector('.css-progress').style.width = cssSkillLevel + '%';
        document.querySelector('.js-progress').style.width = jsSkillLevel + '%';
        document.querySelector('.php-progress').style.width = phpSkillLevel + '%';
        document.querySelector('.mysql-progress').style.width = mysqlSkillLevel + '%';


    </script>

    <?php }else{ ?>

        <div id="navos">
            <div id="title">Hey amigo! looks new to Here.</div>
            <div id="inOut">
                <ul>
                    <li><a href="signup.php">Sign Up</a></li>
                    <li><a href="login.php">Log In</a></li>
                </ul>
            </div>
            <p class="translateX" id="Urvish" data-speed="-1">Login pls.</p>
            <p class="translateX" id="Urvish2" data-speed="-0.5">Login pls.</p>
            <p class="translateX" id="Urvish3" data-speed="-0.7">Login pls.</p>
        </div>
        
        

    <?php } ?>

</body>

</html>