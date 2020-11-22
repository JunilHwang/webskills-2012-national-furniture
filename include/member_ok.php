<?
	if($_POST['action']){
		//비밀번호 암호화
		if($_POST['pw']) $_POST['pw'] = md5($_POST['pw']);
		if($_POST['re_pw']) $_POST['re_pw'] = md5($_POST['re_pw']);
		
		//액션 값에 따라 검사
		switch($_POST['action']){
			case 'insert' :
				$member = total("select * from member where email='{$_POST['email']}'");
				access($member == 0, "이미 등록된 이메일입니다.");
				$add_sql .= ", lv=1";
				$msg = "회원가입이 완료되었습니다.";
				$url = $get_page;
			break;
			case 'pw_change':
				$_POST['action'] = "update";
				$member = fetch("select * from member where email='{$_SESSION['email']}'");
				access($_POST['pw'] == $member['pw'], "현재 비밀번호가 일치하지 않습니다.");
				$_POST['pw'] = $_POST['re_pw'];
				$cancel .= "re_pw/";
				$msg = "비밀번호가 변경되었습니다.";
				$url = $get_page;
			break;
			case 'update':
				$add_sql .= " where email='{$_POST['email']}'";
				$msg = "수정되었습니다.";
				$url = $get_page;
			break;
		}
		
		//쿼리
		$cancel .= "action/";
		$column = get_column($_POST, $cancel);
		query($_POST['action'], "member", "{$column} {$add_sql}");
		
		//페이지이동
		if($msg) alert($msg);
		move($url);
	}
?>