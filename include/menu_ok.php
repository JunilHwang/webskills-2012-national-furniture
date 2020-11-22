<?
	if($_POST['action']){
		//비밀번호 암호화
		if($_POST['pw']) $_POST['pw'] = md5($_POST['pw']);
		if($_POST['re_pw']) $_POST['re_pw'] = md5($_POST['re_pw']);
		
		//액션 값에 따라 검사
		switch($_POST['action']){
			case 'insert' :
				$parent = $idx ? $idx : 0;
				$menu = fetch("select * from menu where parent='{$parent}' order by od desc limit 1");
				$od = $menu['od'] ? $menu['od']+1 : 0;
				$add_sql .= ", od='{$od}', parent='{$parent}'";
				$msg = "메뉴가 추가되었습니다.";
				$url = $get_page;
			break;
			case 'update' :
				$add_sql .= " where idx='{$idx}'";
				$msg = "메뉴가 수정되었습니다.";
				$url = $get_page;
			break;
		}
		
		//쿼리
		$cancel .= "action/";
		$column = get_column($_POST, $cancel);
		query($_POST['action'], "menu", "{$column} {$add_sql}");
		
		//페이지이동
		if($msg) alert($msg);
		move($url);
	}
?>