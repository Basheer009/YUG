<?php
	session_start();
    include_once '/include/class_user.php';
    $user = new User();
    $id = $_SESSION['id'];

     if (!$user->get_session()){
       header("Location:login.php");
	   die();
    }

    if (isset($_GET['q'])){
        $user->user_logout();
        header("Location:login.php");
		die();
		}
?>
<!DOCTYPE html>
<html>
<head>
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
	<div id="admin" data-role="page" data-theme="b" data-title="YUG: Admin Console">
    	<div data-role="header" data-position="fixed" data-id="header">
        	<h1>Admin Console</h1>
            <a href="index.php#home" data-ajax="false" data-iconpos="notext" data-icon="home">Home</a>
        </div>
        <!--admin header-->
        <div data-role="controlgroup">
        	<a href="citiesconfig.php" data-ajax="false" data-role="button" data-mini="true">Cities</a>
            <a href="universitiesconfig.php" data-ajax="false" data-role="button" data-mini="true">Universities</a>
            <a href="usersconfig.php" data-ajax="false" data-role="button" data-mini="true">Users</a>
        </div>
		<div data-role="footer" data-position="fixed" data-id="footer">
       		<div data-role="navbar">
           		<ul>
                	<li><a id="logout" href="admin.php?q=logout" data-ajax="false" data-role="button" data-icon="alert" data-mini="true">Logout</a></li>
                	<li><a href="#about" data-role="button" data-rel="dialog" data-icon="info" data-mini="true">About</a></li>
           		</ul>
            </div><!--footer navbar-->
       	 </div><!--footer buttons-->
	</div>
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
					</div>
        </div><!--about page-->
    <script src="_/js/nativedroid.script.js"></script>
</body>
</html>