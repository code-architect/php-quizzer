<html>
	<head>
		<title>Examination Page</title>
		<link rel="stylesheet" type="text/css" href="_css/style.css">
		<style type="text/css">
			.confirm-class{background-color:#00CC00;}
		</style>
	</head>
	<body>
		<div id="wrapper">
			<div id="content"<?php
								$url = $_SERVER['REQUEST_URI'];
								$pageName = explode('/', $url);
								$pageName = end($pageName);
								if($pageName=='examination-bengali.php'){?>
									style="background: url('images/exam-bengali-back.png') no-repeat;"
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
						<textarea class="exam-box" disabled>একটি পথচারী নিয়ার পারাপারের যখন পথচারীরা অপেক্ষা করছে রাস্তা পার হওয়ার জন্য, আপনি উচিত</textarea>
						<img src="images/no-horn.jpg" height="100" width="100" style="margin-left:25px;margin-bottom:5px;"/>	
					</div>	
				</div>
				<div id="exam-answer" style="background:url('../images/exam-answer-01.png') no-repeat;">
					<div style="margin-left:130px;">
						<div style="margin-left:-50px;margin-top:35px;float:left;">
							<input type="radio" name="ans" value="1"/>
						</div>
						<div>
							<textarea class="ans-box" disabled>সাউন্ড শিং ও এগিয়ে</textarea>
						</div>
					</div>	
				</div>
				<div id="exam-answer">
					<div style="margin-left:130px;">
						<div style="margin-left:-50px;margin-top:10px;float:left;">
							<input type="radio" name="ans" value="2"/>
						</div>
						<div>
							<textarea class="ans-box" style="background-color:green;margin-top:-20px;" disabled>মন্দীভূত, সাউন্ড শিং ও পাস</textarea>
						</div>
					</div>	
				</div>
				<div id="exam-answer">
					<div style="margin-left:130px;">
						<div style="margin-left:-50px;margin-top:-20px;float:left;">
							<input type="radio" name="ans" value="3"/>
						</div>
						<div>
							<textarea class="ans-box" style="margin-top:-40px;" disabled>গাড়ির বন্ধ করুন এবং না হওয়া পর্যন্ত পেক্ষা পথচারীরা ক্রুশ রাস্তা এবং তারপর এগিয়ে</textarea>	
						</div>	
					</div>	
				</div>
				<div id="exam-answer"> <!-- Footer Controls -->
						<div style="margin-top:-30px;float:left;background: url('images/exam-footer-bengali.png');height:97px;width:625px;">
							<div style="float:left;margin-top:30px;margin-left:5px;"><!-- Answer Submit Button -->
							<input type="submit" value="নিশ্চিত করা" class="confirm-class" style="height:38px;width:123px;">	
							</div>
							<div style="float:left;margin-top:35px;margin-left:40px;color:#089D99;font-weight:bold;font-size:30px; ">
								0/0
							</div>
							<div style="float:left;margin-top:35px;margin-left:140px;color:#FF0733;font-weight:bolder;font-size:30px; "><!-- Timer -->
								20
							</div>
							<div style="float:left;margin-top:35px;margin-left:180px;color:#089D99;font-weight:bold;font-size:30px; "><!-- Page Count -->
								1
							</div>
						</div>	
				</div>
			</div>
		</div>
	</body>
</html>