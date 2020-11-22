<?
	if($_POST['action']){
		//비밀번호 암호화
		if($_POST['pw']) $_POST['pw'] = md5($_POST['pw']);
		if($_POST['re_pw']) $_POST['re_pw'] = md5($_POST['re_pw']);
		$_POST = arr_change($_POST);
		
		//액션 값에 따라 검사
		switch($_POST['action']){
			case 'insert' :
				$add_sql .= ", sidx='{$sidx}', date=now()";
				$msg = "게시글이 작성완료되었습니다.";
				$url = $get_page;
			break;
			case 'update' :
				$add_sql .= " where idx='{$idx}'";
				$msg = "게시글이 수정되었습니다.";
				$url = "{$get_page}view/{$idx}/";
			break;
		}
		
		//쿼리
		$cancel .= "action/";
		$column = get_column($_POST, $cancel);
		query($_POST['action'], "board", "{$column} {$add_sql}");
		
		//페이지이동
		if($msg) alert($msg);
		move($url);
	}
?>