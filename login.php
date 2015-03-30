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

	<link rel="stylesheet" href="_/css/jquery.mobile-1.4.5.min.css" />
	<script src="_/js/jquery.js"></script>
	<script src="_/js/jquery.mobile-1.4.5.min.js"></script>

	<script src="_/js/myscript.js"></script>
	<link rel="stylesheet" href="_/css/mystyles.css" />
	
</head>
<body>
	<!--login page-->
    <div id="login" data-role="page" data-title="YUG: login">
    	<div data-role="header" data-position="fixed" data-id="header">
        	<h1>Login</h1>
        </div><!--login header-->
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
    <div id="about" data-role="page" data-title="YUG: About">
    	<div data-role="header" data-id="header">
        	<h1>About</h1>
        </div><!--about header-->
        <div data-role="content">
        	<h2 align="center">Developers</h2>
            <p>kjhsk jvhsdavsdh fkjhabs dvybvoasdhb vhdsbvh jsadbv</p>
        </div>
        
    </div><!--about page-->
</body>
</html>
