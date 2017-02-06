<html>
	<head>
		<title>Examination Page</title>
		<link rel="stylesheet" type="text/css" href="_css/style.css">
	</head>
	<body>
		<div id="wrapper">
			<div id="content"<?php
								$url = $_SERVER['REQUEST_URI'];
								$pageName = explode('/', $url);
								$pageName = end($pageName);
								if($pageName=='examination.php'){?>
									style="background: url('images/exam-back.png') no-repeat;"
								<?php
									}
								?>>
				<div id="exam-header">
					<div id="exam-header-inner">
						<?php echo "Abishek Kundu";?>
					</div>
				</div>
				<div id="exam-question">
					<div style="margin-left:130px;">
						<textarea class="exam-box" disabled>Identify this traffic sign? Select the answer from below.</textarea>
						<img src="images/no-horn.jpg" height="100" width="100" style="margin-left:25px;margin-bottom:5px;"/>	
					</div>	
				</div>
				<div id="exam-answer" style="background:url('../images/exam-answer-01.png') no-repeat;">
					<div style="margin-left:130px;">
						<div style="margin-left:-50px;margin-top:35px;float:left;">
							<input type="radio" name="ans" value="1"/>
						</div>
						<div>
							<textarea class="ans-box" disabled>This is the traffic sign of "No Horn".</textarea>	
						</div>
					</div>	
				</div>
				<div id="exam-answer">
					<div style="margin-left:130px;">
						<div style="margin-left:-50px;margin-top:10px;float:left;">
							<input type="radio" name="ans" value="2"/>
						</div>
						<div>
							<textarea class="ans-box" style="margin-top:-20px;"disabled>This is the traffic sign of "No Overtaking".</textarea>	
						</div>
					</div>	
				</div>
				<div id="exam-answer">
					<div style="margin-left:130px;">
						<div style="margin-left:-50px;margin-top:-20px;float:left;">
							<input type="radio" name="ans" value="3"/>
						</div>
						<div>
							<textarea class="ans-box" style="margin-top:-40px;"disabled>This is the traffic sign of "No Parking".</textarea>	
						</div>	
					</div>	
				</div>
			</div>
		</div>
	</body>
</html>