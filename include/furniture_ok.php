<?
	if($_POST['action']){
		//파일 업로드
		if(is_uploaded_file($_FILES['file']['tmp_name'])){
			$file_name = file_uploaded($_FILES['file']);
			$file = $_FILES['file']['name'];
			$add_sql .= ", file='{$file}', file_name='{$file_name}'";
			@unlink("{$_SERVER['DOCUMENT_ROOT']}/furniture/{$_POST['up_file']}");
		}
		
		//액션 값에 따라 검사
		switch($_POST['action']){
			//가구신청
			case 'hope' :
				$_POST['action'] = "insert"; 
				$add_sql .= ", now=0, name='{$_SESSION['name']}', email='{$_SESSION['email']}'";
				$msg = "가구 신청이 완료되었습니다.";
				$url = $get_page;
			break;
			
			//가구추가
			case 'add' :
				$_POST['action'] = "insert"; 
				$add_sql .= ", now=1";
				$msg = "가구가 추가되었습니다.";
				$url = $get_page;
			break;
			
			//희망가구 추가
			case 'hope_add' :
				$_POST['action'] = 'update';
				$add_sql .= " now=1, name='', email='' where idx='{$_POST['idx']}'";
				$msg = "추가되었습니다.";
				$url = $get_page;
			break;
		}
		
		//쿼리
		$cancel .= "action/idx/";
		$column = get_column($_POST, $cancel);
		query($_POST['action'], "furniture", "{$column} {$add_sql}");
		
		//페이지이동
		if($msg) alert($msg);
		move($url);
	}
?>