<?php
header("Content-Type:text/html; charset=UTF-8");
$course_number = $_POST['course_number'];
$new_sub_entry = $_POST['new_sub_entry'];
if ( !preg_match( "/(\D{2,3}\d{3})(\w+)/", $course_number, $course_number_match ) ){
	print("ERROR");
	die();
}
$data = file_get_contents('1071期末排考一覽表公告版1080104.csv');
$rows = explode("\n",$data);
$row = array();
$num = 0;
$flag = 1;
foreach($rows as $temprow) {
    $row[] = str_getcsv($temprow);
	if( isset($row[$num][4]) && isset($row[$num][5]) ){
		if( $row[$num][4] == $course_number_match[1] && $row[$num][5] == $course_number_match[2] ){			
			if ( preg_match( "/(304\s)(\S*)/", $row[$num][2] ) ){
				$new_sub_entry = "<div class='tm-timeline-item-inner'>".'<img src="teacher/'.$row[$num][7].'.jpg"'.$new_sub_entry;
			}
			else{
				$new_sub_entry = "<div class='tm-timeline-item-inner'>".'<img src="img/img-0'.rand(1,4).'.jpg"'.$new_sub_entry;
			}
			preg_match( "/(\d{4})\/(\d{1,2})\/(\d{1,2})/", $row[$num][9], $date );
			$date[2] = str_pad($date[2],2,'0',STR_PAD_LEFT);
			$date[3] = str_pad($date[3],2,'0',STR_PAD_LEFT);
			preg_match( "/(\d{2}):(\d{2}) ~ (\d{2}):(\d{2})/", $row[$num][10], $time );
			$new_sub_entry = $new_sub_entry.'<h3 class="tm-text-green tm-font-400">'.$row[$num][4].$row[$num][5].' '.$row[$num][6].'</h3>'
								.		'<p>教室: '.$row[$num][11].'<br>'.$row[$num][12].'</p>'
								.		'<a href="https://calendar.google.com/calendar/render?action=TEMPLATE&ctz=Asia/Taipei&text='.$row[$num][4].$row[$num][5].' '.$row[$num][6]
								.		'&dates='.$date[1].$date[2].$date[3].'T'.$time[1].$time[2].'00/'.$date[1].$date[2].$date[3].'T'.$time[3].$time[4].'00&details='.$row[$num][12].'&location='.$row[$num][11].'&trp=true" target="_blank">'
								.		'<input type="button" value="+" style="float:left; background-color:transparent;width:30px;height:30px;color:white;font-size:20px;"></a>'
								.		'<p class="tm-text-green float-right mb-0">'.$row[$num][9].' '.$row[$num][10].'</p>'
								.	'</div>'
								.'</div>'
							.'</div>';
			print ("$new_sub_entry");
			$flag = 0;
			die();
		}
	}
    $num++;
}
if( $flag == 1 ){	
	print("ERROR");
}
?>