<html>
	<head>
		<title>Select Language</title>
		<link rel="stylesheet" type="text/css" href="test/_css/style.css">


        <script type="text/javascript">
            function noAudioDiv() {
                if (document.getElementById('english').checked)
                {
                    document.getElementById('noAudio').style.display = "block";

                    var link = document.getElementById("pageLink");
                    link.setAttribute('href', "exam/english_exam.php");
                    document.getElementById("pageLink").style.display = "block";

                } else if(document.getElementById('hindi').checked)
                {
                    document.getElementById('noAudio').style.display = "block";
                    var link = document.getElementById("pageLink");
                    link.setAttribute('href', "exam/hindi_exam.php");
                    document.getElementById("pageLink").style.display = "block";
                } else
                {
                    document.getElementById('noAudio').style.display = "block";
                    var link = document.getElementById("pageLink");
                    link.setAttribute('href', "exam/bengali_exam.php");
                    document.getElementById("pageLink").style.display = "block";
                }
            }
        </script>



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
				<div id="select-language-profile-pic">
					<img src="test/images/select-language-profile-picture.png">
				</div>
				<div id="select-language-name">
					<div class="titlebox">Applicant Name</div>
					<p style="margin-top:-5px;margin-right:110px;font-weight:bold;"><?php echo "Abhishek Kundu";?></p>
				</div>
				<div style="float:left;height:30px;margin-left:240px;margin-top:10px;">
					<div style="float:left;margin:5px;height:30px;width:100px;background-color:#2d32ff;color:#FFF;">
                        <input type="checkbox" id="english" name="selectLang" value="1" onclick="noAudioDiv()" /> English</div>
                    <div style="float:left;margin:5px;height:30px;width:100px;background-color:#4582b1;color:#FFF;"><input type="checkbox" id="hindi" name="selectLang" value="1" onclick="noAudioDiv()"/> Hindi</div>
                    <div style="float:left;margin:5px;height:30px;width:100px;background-color:#83052a;color:#FFF;"><input type="checkbox" id="bengali" name="selectLang" value="1" onclick="noAudioDiv()"/> Bengali</div>
				</div>
				<div style="float:left;margin-top:30px;margin-left:140px;height:100px;">
					<div style="float:left;margin-top:30px;display:none;" id="noAudio">

						<a id="pageLink"  href="exam/english_exam.php"><img src="test/images/no-audio.png"></a>
					</div>
				</div>
					<div style="float:left;margin-top:30px;margin-left:300px;">
					<a href="index.php"><img src="test/images/later.png"></a>
				</div>
				</div>				
			</div>
		</div>
        <script src="admin/media/js/jquery.js"></script>
	</body>
</html>