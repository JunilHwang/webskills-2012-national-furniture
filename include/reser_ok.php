<?
	if($_POST['action']){		
    	switch($_POST['action']){
			//가구예약
			case 'insert':
				$_POST['date'] = implode("-", $_POST['date']);
				$now = strtotime(date("Y-m-d"));
				$re_date = strtotime(date("{$_POST['date']}"));
				access($re_date >= $now, "지난 날짜에는 예약할 수 없습니다.");
				if($_SESSION['lv']){
					$msg = "예약되었습니다.";
					include_once("{$_SERVER['DOCUMENT_ROOT']}/include/zip.php");
				} else {
					$number = str_pad(rand(0, 99999),5,0,0);
					$add_sql .= ", number='{$number}'";
					$cancel .= "name/email/";
					$msg = "예약번호는 [{$number}] 입니다.";
				}
				$add_sql .= ", now=1";
				sql("update furniture set num=num-{$_POST['re']} where idx='{$_POST['fidx']}'");
				$url = $get_page;
			break;
			
			//예약취소
			case 'delete' :
				$add_sql .= " idx = '{$_POST['idx']}'";
				$msg = "예약이 취소되었습니다.";
				$url = "{$get_page}now/";
			break;
			
			//예약수정
			case 'modify' :
				$_POST['action'] = 'update';
				$_POST['date'] = implode("-", $_POST['date']);
				$now = strtotime(date("Y-m-d"));
				$re_date = strtotime(date("{$_POST['date']}"));
				access($re_date >= $now, "지난 날짜에는 예약할 수 없습니다.");
				$add_sql .= " where idx='{$idx}'";
				$msg = "수정되었습니다.";
				$url = "{$get_page}now/";
			break;
			
			//예약허가
			case 'lend' :
				$_POST['action'] = 'update';
				$add_sql .= " now=2 where idx='{$_POST['idx']}'";
				$msg = "대여되었습니다.";
				$url = $get_page;
			break;
			
			//반납대기
			case 'return' :
				$_POST['action'] = 'update';
				$add_sql .= " now=3 where idx='{$_POST['idx']}'";
				$msg = "반납신청 되었습니다.";
				$url = "{$get_pgae}now/";
			break;
			
			//반납
			case 'clear' :
				$_POST['action'] = 'delete';
				$add_sql .= " idx = '{$_POST['idx']}'";
				$re = fetch("select * from reser where idx='{$_POST['idx']}'");
				$fur = fetch("select * from furniture where idx='{$re['fidx']}'");
				sql("update furniture set num=num+{$re['re']} where idx='{$_POST['idx']}'");
				$msg = "반납되었습니다.";
				$url = $get_page;
			break;
        }
		//쿼리
		$cancel .= "action/idx/";
		$column = get_column($_POST, $cancel);
		query($_POST['action'], "reser", "{$column} {$add_sql}");
		
		//페이지이동
		if($msg) alert($msg);
		move($url);
	}
?>