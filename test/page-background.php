<?php
	$url = $_SERVER['REQUEST_URI'];
	$pageName = explode('/', $url);
	$pageName = end($pageName);
	if($pageName=='start-test.php') ?>
		style="background: url('images/stall-back.png') no-repeat;"
		<?php
	if($pageName=='select-language.php') ?>
		style="background: url('images/stall-back.png') no-repeat;"
	<?php
	if($pageName=='select-language.php')
	echo "Hi"	;
?>				