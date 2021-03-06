<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>GTP Login</title>
        <link href="css/styles.css" type="text/css" rel="stylesheet"/>
    </head>
    <body>
        <audio src="media/soundtrack/morse.mp3" loop autoplay></audio>

        <div id="tea_picture">
            <img srcset="
            media/images/teapic1x.png, 
            media/images/teapic2x.png, 
            media/images/teapic3x.png, 
            media/images/teapic4x.png" 
            src="media/images/teapic4x.png" alt="Picture of tea" width="100%" height="250px">
            <div class="header">
                <h1 >Grand Tea Party</h1>
            </div>
         </div>
        
        <nav class="topnav">
			<div class="topnav-left">
				<a href="index.html">Home</a>
                <a href="contacts.html">Contacts</a>
                <a href="goals.html">Our Goals</a>
                <a href="works.html">Our Works</a>
                <a href="chatroom.html">Chatroom</a>
			</div>
        
			<div class="topnav-right">
				<a class="active" href="login.php">Log in</a>
				<a href="register.php">Register</a>
			</div>
        </nav>
    
        
        <div class="form-container">
            <div>
                <form action="php/login.php" method="post">
                    <img id ="user-avatar" src="media/images/user-avatar.png" alt="User avatar">
                    <h2>GTP Login</h2>
                    <div>
                        <input id="usrname" type="text" name="mailusrname" placeholder="Enter Username/Email" required>
                        <input id="psw" type="password" name="psw" placeholder="Enter Password" required>
                        <button type="submit" name="login">Login</button>
                        <input id="rmb" type="checkbox" checked="checked" name="remember">
                        <label id="rmb-label">Remember Me</label>
                    </div>
                </form>
            </div>
        </div>

        <hr>
        
        <footer>
			Official website of the Grand Tea Party.<br>
			<p class="paragraph" id="code" title="Decipher this. Its vigenere then caesar.">
				qk hgse6969 "t dwur tmr ebcnayja vd t" yb ehcx eyanhlcj vlai yuc zqipeiqga. qo wtsh ic wfvrphq fzy jlu ffpcz.
			</p>
		</footer>
    </body>
</html>