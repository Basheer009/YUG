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

	
	
	<link rel="stylesheet" href="_/css/jquery.mobile-1.4.5.min.css" />
	<script src="_/js/jquery.js"></script>
	<script src="_/js/jquery.mobile-1.4.5.min.js"></script>

	<script src="_/js/myscript.js"></script>
	<link rel="stylesheet" href="_/css/mystyles.css" />
    
    <link href="_/css/bootstrap.min.css" rel="stylesheet" type="text/css">
</head>
<body>
	<!--home page-->
	<div id="home" data-role="page" data-title="YUG: Home">
    	<div data-role="header" data-position="fixed" data-id="header">
        	<h1>YUG</h1>
        </div><!--home header-->
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
    <div id="<?php $i = $o['idname']; echo $i?>" data-role="page" data-title="YUG: <?php echo $row['name']?>">
    	<div data-role="header" data-position="fixed" data-id="header">
			<h1><?php echo $o['name']?></h1>
            <a href="#home" data-icon="home" data-ajax="false" data-iconpos="notext">Home</a>
        </div><!-- header-->
		<div data-role="content">
        	<div class="row">
            	<?php
				$sql1 = "SELECT * FROM universities WHERE cityname = '$i'";
				 foreach($link->query($sql1) as $r){ ?>
                <div class="col-md-4 thumbnail">
                    <img src="_/css/images/a.png" alt="<h1>LIU</h1>"/>
                    <div align="center">
                    <h2><?php echo $r['name'] ?></h2>
                    <h1><?php echo $r['address'] ?></h1>
                    <h1><?php echo $r['contact'] ?></h1>
                    <p><?php echo $r['de'] ?></p>
                    </div>
                </div><?php } ?>
            </div>   
        </div><!--content-->
        <div data-role="footer" data-position="fixed" data-id="footer">
        	<div data-role="navbar">
            	<ul>
                    <li><a href="admin.php" data-ajax="false" data-role="button" data-icon="star" data-mini="true">Admin</a></li>
                    <li><a href="#about" data-rel="dialog" data-role="button" data-icon="info" data-mini="true">About</a></li>
                </ul>
            </div><!--footer navbar-->
        </div><!--footer buttons-->
    </div><!--sana'a page--><?php } ?>
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
    <script src="_/js/bootstrap.min.js"></script>
</body>
</html>
