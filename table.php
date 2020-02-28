<?php
	$grade = $_POST["grade"];
	switch($grade){
		case "grade1up":
		$html = file_get_contents('grade1up.html');
		print($html);
		break;
		case "grade2up":
		$html = file_get_contents('grade2up.html');
		print($html);
		break;
		case "grade3up":
		$html = file_get_contents('grade3up.html');
		print($html);
		break;
		case "grade4up":
		$html = file_get_contents('grade4up.html');
		print($html);
		break;
	}
?>