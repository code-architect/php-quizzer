<html>
	<head>
		<title>STALL Test</title>
		<link rel="stylesheet" type="text/css" href="test/_css/style.css">
	</head>
	<body>
		<div id="wrapper">
			<div id="content"<?php
								$url = $_SERVER['REQUEST_URI'];
								$pageName = explode('/', $url);
								$pageName = end($pageName);
								if($pageName=='index.php'){?>
									style="background: url('test/images/stall-back.png') no-repeat;"
								<?php
									}
								?>>
				<div id="header">
					<h1>STALL</h1>
				</div>
				<div id="middle" style="text-align:center;">
					<h2>Enter Your Name To Start The Examination</h2>
				</div>
				<form action="start-test.php" method="POST">
				<div id="start-test-applicant-name">
					Applicant Name: <input type="text" style="background-color:#EEEEEE;color:6564EE;font-weight:bold;" name="cName"/>
				</div>
				<div id="start-text-button">
					<input type="submit" name="submitBtn" value="" style="background:url('test/images/start-test.png');width:185px;height:50px;margin-top:5px;"/></a>
				</div>
			</form>
			</div>
		</div>
	</body>
</html>