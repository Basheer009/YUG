<?php
    session_start();
    include_once '/include/class_user.php';
	include_once'/include/config.php';
	
	$sql = "SELECT name, href, idname FROM cities ORDER BY id";
	
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
	<!--home page-->
	<div id="home" data-role="page" data-theme="b" data-title="YUG: Home">
    	<div data-role="header" data-position="fixed" data-id="header">
        	<h1>YUG</h1>
        </div><!--home header-->
        <div data-nativedroid-plugin='lockscreen' data-nativedroid-background="http://farm8.staticflickr.com/7117/7659864532_e3d6b1432c_h.jpg" data-nativedroid-lockscreen-animation="fadeOut"  data-nativedroid-lockscreen-delay="25">
				<div class='inset'>
					<h3>Lockscreen</h3>
					<p>Hi, I'm a lockscreen. You see me because you where inactive for more than 30seconds.</p>
					<div class='unlock'><i class='icon-unlock'></i> Unlock me.</div>
				</div>
			</div>
        <div data-role="controlgroup">
        <?php foreach($link->query($sql) as $row) {?>
            <a href="<?php echo $row['href'] ?>" data-ajax="false" data-transition="pop" data-role="button" data-mini="true"><?php echo $row['name'];?></a>
            <?php }?>
        </div><!--button list-->
        <div data-role="footer" data-position="fixed" data-id="footer">
        	<div data-role="navbar">
            	<ul>
                    <li><a href="admin.php" data-ajax="false" data-role="button" data-icon="star" data-mini="true">Admin</a></li>
                    <li><a href="#about" data-rel="dialog" data-role="button" data-icon="info" data-mini="true">About</a></li>
                </ul>
            </div><!--footer navbar-->
        </div><!--footer buttons-->
    </div><!--home page-->
    <!--city page-->
    <?php foreach($link->query($sql) as $o){?>
    <div id="<?php $i = $o['idname']; echo $i?>" data-role="page" data-theme="b" data-title="YUG: <?php echo $row['name']?>">
    	<div data-role="header" data-position="fixed" data-id="header">
			<h1><?php echo $o['name']?></h1>
            <a href="#home" data-icon="home" data-ajax="false" data-iconpos="notext">Home</a>
        </div><!-- header-->
		<div data-role="content">
        		<ul data-nativedroid-plugin='cards'>
            	<?php
				$sql1 = "SELECT * FROM universities WHERE cityname = '$i'";
				 foreach($link->query($sql1) as $r){ ?>
                
                	<li data-cards-type='text'>
                    	<div align="center" style="max-width:350px;">
                        <img width="350px" src="_/css/images/a.png">
                        <h1 style="background-color:#666;"><code><?php echo $r['name'] ?></code></h1>
                        <h3><?php echo $r['address'] ?></h3>
                        <p><?php echo $r['de'] ?></p></div>
                    </li>
                <?php } ?>  </ul> 
        </div><!--content-->
        <div data-role="footer" data-position="fixed" data-id="footer" data-tap-toggle="false" data-theme='b'>
        	<div data-role="navbar">
            	<ul>
                    <li><a href="admin.php" data-ajax="false" data-icon="star" >Admin</a></li>
                    <li><a href="#about" data-rel="dialog"  data-icon="info" >About</a></li>
                </ul>
            </div><!--footer navbar-->
        </div><!--footer buttons-->
    </div><!--sana'a page--><?php } ?>
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
