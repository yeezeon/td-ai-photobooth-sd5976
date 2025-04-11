<html>
<head>
	<title>TOUCHDESIGNER - PHOTOBOOTH - Share</title>

	<style>

		* {
			padding: 0;
			margin: 0;
			color: #FFF;
			font-family: Verdana, Helvetica, Sans-serif;
			font-size: 10px;
		}

		body { 
			background-color: #CCCCCC;
			background-image: linear-gradient(#333333, #666666); 
		}

		#MainContainer {
			display: block;
			position: relative;
			width: 95%;
			max-width: 600px;
			margin: 0 auto 0;
			padding-top: 40px;

		}

		

		#img {
			display: block;
			position: relative;
			width:100%;
			max-width: 1000px;
			margin: 0 auto 0;
		}

		#message {
			display: block;
			width: 100%;
			max-width: 600px;
			font-size: 2em;
			text-align: center;
			margin: 0 auto 0;
			margin-top: 40px;
			margin-bottom: 40px;
			font-weight: bold;
		}



	</style>
	
</head>
<body>
	<div id="MainContainer">

		
			

		<div id="img">
			<img src="/photos/<?php echo $_GET['id']; ?>.jpg" width="100%" />
		</div>

		<div id="message">Please share with your friends and family. You can press and hold on the image to save to your phone.</div>

		

		
	<div>
<body>
</html>