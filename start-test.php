<?php include 'admin/includes/all.php'; ?>
<?php
$_SESSION['cName'] = $_REQUEST['cName'];
?>
<html>
	<head>
		<title>Start Test</title>
		<link rel="stylesheet" type="text/css" href="test/_css/style.css">
	</head>
	<body>
		<div id="wrapper">
			<div id="content"<?php
								$url = $_SERVER['REQUEST_URI'];
								$pageName = explode('/', $url);
								$pageName = end($pageName);
								if($pageName=='start-test.php'||$pageName=='select-language.php'){?>
									style="background: url('test/images/stall-back.png') no-repeat;"
								<?php
									}
								?>>
				<div id="header">
					<h1>STALL</h1>
				</div>
				<div id="middle">
					<textarea style="resize:none;height:360px;width:660px;margin-left:50px;margin-top:-10px;background-color:#eeeeee;font-style: italic;font-size: 15.5px;">**Screen Test Aid for Issue of Learner License (STALL) is a computerized test procedure for evaluating the ability of an applicant in Traffic Signs te Rules as part of the Central Motor Vehicle Act 1988.
**The candidate should take the position at the allocated client and start the exam.
**Option to write the exam in the local regional language is provided The candidate can select any language of his/her choice from the list of available languages that are displayed on the next screen and choose an Exam mode (Exam with Audio /Exam without Audio) to start the exam.
**Question along with 2/3/4 options are displayed on the exam screen. Candidate has to click on any one of the buttons provided against each option for exercising his/her answer and then press Contirrn button.
**The selected answer is validated and the correct answer is shown in Green colour. If the answer selected by the candidate is wrong then his/her selected answer is shown in Red colour.
**The score of the candidate, the attempting question and the seconds remaining for that question are displayed on the bottom part of the Exam screen.
**Immediate Result (Pass /Fail) will be displayed at the end of the exam. </textarea>
				</div>
				<div id="start-test-applicant-name">
					Applicant Name: <input type="text" style="background-color:#EEEEEE;color:6564EE;font-weight:bold;" value="<?php echo $_SESSION['cName'];?>" disabled/>
				</div>
				<div id="start-text-button">
					<a href="select-language.php"><input type="image" src="test/images/start-test.png"/></a>
				</div>
			</div>
		</div>
	</body>
</html>