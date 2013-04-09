<!DOCTYPE html>
<html lang="en">
	<head>
		
		<meta charset="utf-8" />
		<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame
		Remove this if you use the .htaccess -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<title>ucApp</title>

		<meta name="description" content="" />
		<meta name="generator" content="Studio 3 http://aptana.com/" />
		<meta name="author" content="Alana" />
		<meta name="viewport" content="width=device-width" />
		<!-- Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
		<link rel="shortcut icon" href="/favicon.ico" />
		<link rel="apple-touch-icon" href="/apple-touch-icon.png" />
		<!-- Add styles and Google Fonts-->
<!-- Start iPhone -->


<!-- End iPhone -->
<link rel="stylesheet" type="text/css" href="styles.css" />

		<link href='http://fonts.googleapis.com/css?family=Lusitana:400,700' rel='stylesheet' type='text/css'>
			<!-- HIDE MENU BAR WHEN PAGE LOADS -->
	<script type="application/x-javascript">
		addEventListener('load', function() { 
			setTimeout(hideAddressBar, 0); 
		}, false);
		function hideAddressBar() { 
			window.scrollTo(0, 1); 
		}
	</script>
		<?php include("functions.php");?>
	</head>
	<body>
		<div id="radial-center" align="center">
			<div id="content">
				<h1>What Has the <span size="10">UC</span> Done? Spring 2012</h1>
                                
				<div id="container">
					<?php

					displayRandomizedText();
					
					//echo $newMessage->getHtml();// display the new text

					?>
				</div>
				<?php
				$btnText = generateBtnText();
				print('<a HREF="javascript:history.go(0)" class="btn">'.$btnText. '</a>');
				?>
			</div>
		</div>
		<footer>
			<p>
				
			</p>
		</footer>
	</body>
</html>