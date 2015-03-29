<?php
    session_start();
    include_once '/include/class_user.php';
	include_once'/include/config.php';
	
	$sql = "SELECT name, href FROM cities ORDER BY id";
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
	<!--home page-->
	<div id="home" data-role="page" data-title="YUG: Home">
    	<div data-role="header" data-position="fixed" data-id="header">
        	<h1>YUG</h1>
        </div><!--home header-->
		<div data-role="content">
        	Welcome the first university guide in Yemen
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
    <!--sana'a page-->
    <div id="sanaa" data-role="page" data-title="YUG: Sana'a">
    	<div data-role="header" data-position="fixed" data-id="header">
			<h1>Sana'a</h1>
            <a href="#home" data-icon="home" data-iconpos="notext">Home</a>
        </div><!--sana'a header-->
		<div data-role="content">
        	<div id="videos" class="ui-grid-b">
            	<div class="ui-block-a">
            	<a href="#"><div class="movietitle">fgfghg</div>
            	<img src="images/video_edgeui.jpg"></a></div>
                <div class="ui-block-b">
            	<a href="#"><div class="movietitle">fgfghg</div>
            	<img src="images/video_whatisedge.jpg"></a></div>
                <div class="ui-block-c">
            	<a href="#"><div class="movietitle">fgfghg</div>
            	<img src="images/video_uploader.jpg"></a></div>
                <div class="ui-block-a">
            	<a href="#"><div class="movietitle">fgfghg</div>
            	<img src="images/video_toggle.jpg"></a></div>
                <div class="ui-block-b">
            	<a href="#"><div class="movietitle">fgfghg</div>
            	<img src="images/video_edgeui.jpg"></a></div>
                <div class="ui-block-c">
            	<a href="#"><div class="movietitle">fgfghg</div>
            	<img src="images/video_whatisedge.jpg"></a></div>             
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
    </div><!--sana'a page-->
    <!--taiz page-->
    <div id="taiz" data-role="page" data-title="YUG: Taiz">
    	<div data-role="header" data-position="fixed" data-id="header">
			<h1>Taiz</h1>
        	<a href="#home" data-icon="home" data-iconpos="notext">Home</a>
        </div><!--taiz header-->
		<div data-role="content">the universities of Taiz city</div>
        <div data-role="footer" data-position="fixed" data-id="footer">
        	<div data-role="navbar">
            	<ul>
                    <li><a href="admin.php" data-ajax="false" data-role="button" data-icon="star" data-mini="true">Admin</a></li>
                    <li><a href="#about" data-rel="dialog" data-role="button" data-icon="info" data-mini="true">About</a></li>
                </ul>
            </div><!--footer navbar-->
        </div><!--footer buttons-->
    </div><!--taiz page-->
    <!--aden page-->
    <div id="aden" data-role="page" data-title="YUG: Aden">
    	<div data-role="header" data-position="fixed" data-id="header">
			<h1>Aden</h1>
        	<a href="#home" data-icon="home" data-iconpos="notext">Home</a>
        </div><!--aden header-->
		<div data-role="content">the universities of Aden city</div>
        <div data-role="footer" data-position="fixed" data-id="footer">
        	<div data-role="navbar">
            	<ul>
                    <li><a href="admin.php" data-ajax="false" data-role="button" data-icon="star" data-mini="true">Admin</a></li>
                    <li><a href="#about" data-rel="dialog" data-role="button" data-icon="info" data-mini="true">About</a></li>
                </ul>
            </div><!--footer navbar-->
        </div><!--footer buttons-->
    </div><!--aden page-->
    <!--hodaidah page-->
    <div id="hodaidah" data-role="page" data-title="YUG: Hodaidah">
    	<div data-role="header" data-position="fixed" data-id="header">
			<h1>Hodaidah</h1>
        	<a href="#home" data-icon="home" data-iconpos="notext">Home</a>
        </div><!--hodaidah header-->
		<div data-role="content">the universities of Hodaidah city</div>
        <div data-role="footer" data-position="fixed" data-id="footer">
        	<div data-role="navbar">
            	<ul>
                    <li><a href="admin.php" data-role="button" data-icon="star" data-mini="true">Admin</a></li>
                    <li><a href="#about" data-rel="dialog" data-role="button" data-icon="info" data-mini="true">About</a></li>
                </ul>
            </div><!--footer navbar-->
        </div><!--footer buttons-->
    </div><!--hodaidah page-->
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
