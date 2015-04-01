<?php
            session_start();
            include_once '/include/class_user.php';
            $user = new User();
        
            if (isset($_REQUEST['submit'])) { 
                extract($_REQUEST);   
                $login = $user->check_login($email, $password);
                if ($login) {
                    // login Success
                   header("Location:admin.php");
				   die();
                }else {
	        // login Failed
	        echo "<script>alert('Wrong username or password');</script>";
	    }
            }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>YUG</title>

	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

	<link rel="stylesheet" href="_/css/jquerymobile.nativedroid.css" />

	<link rel="stylesheet" href="_/css/jquery.mobile-1.4.5.min.css" />
	<script src="_/js/jquery.js"></script>
	<script src="_/js/jquery.mobile-1.4.5.min.js"></script>

	<script src="_/js/myscript.js"></script>
	<link rel="stylesheet" href="_/css/mystyles.css" />
	
</head>
<body>
	<!--login page-->
    <div id="login" data-role="page" data-theme="b" data-title="YUG: login">
    	<div data-role="header" data-position="fixed" data-id="header">
        	<h1>Login</h1>
        </div><!--login header-->
		<div data-nativedroid-plugin='lockscreen' data-nativedroid-background="http://farm8.staticflickr.com/7117/7659864532_e3d6b1432c_h.jpg" data-nativedroid-lockscreen-animation="fadeOut"  data-nativedroid-lockscreen-delay="25">
				<div class='inset'>
					<h3>Lockscreen</h3>
					<p>Hi, I'm a lockscreen. You see me because you where inactive for more than 30seconds.</p>
					<div class='unlock'><i class='icon-unlock'></i> Unlock me.</div>
				</div>
			</div>
        <div data-role="content">
        	<form method="post">
            	<label><h1>LOGIN</h1></label>
                <input name="email" type="email" placeholder="E-mail" required/><br>
                <input name="password" type="password" placeholder="Password" required/><br><br>
                <button data-inline="true" name="submit" type="submit" onClick="return(submitlogin());" value="Login">login</button>
            </form>
        </div><!--content-->
        <div data-role="footer" data-position="fixed" data-id="footer">
        	<div data-role="navbar">
            	<ul>
                    <li><a href="index.php" data-ajax="false" data-role="button" data-icon="home" data-mini="true">Home</a></li>
                    <li><a href="#about" data-rel="dialog" data-role="button" data-icon="info" data-mini="true">About</a></li>
                </ul>
            </div><!--footer navbar-->
        </div><!--footer buttons-->
    </div><!--login page-->
     <!--about page-->
    <div id="about" data-role="page" data-theme="b" data-title="YUG: About">
    	<div data-role="header" data-id="header">
        	<h1>About</h1>
        </div><!--about header-->
        <div data-role="content">
        	<h2 align="center">This project was done by: </h2>
			
			<div>
			<div style="float:left;">
			<img src="images/basheer.png" width="100px" />   
			<h2><code>Basheer Adel</h2>
			</div>
			<div style="float:right;">    
			<img src="images/hisham.png" width="100px" />   
			<h2><code>Hisham Ali</h2> 
			</div>
			</div>​
			<br><br><br><br><br><br><br><br>
			<div class='showastabs center nobg'>
                            <a href="dialog/index.html" data-rel="back" data-icon="delete" data-iconpos="right" data-role="button" data-inline="true">Cancel</a>
                    </div>
        </div><!--about page-->
    <script src="_/js/nativedroid.script.js"></script>
</body>
</html>
