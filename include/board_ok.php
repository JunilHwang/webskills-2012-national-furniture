<?
	if($_POST['action']){
		//鍮諛踰 명
		if($_POST['pw']) $_POST['pw'] = md5($_POST['pw']);
		if($_POST['re_pw']) $_POST['re_pw'] = md5($_POST['re_pw']);
		$_POST = arr_change($_POST);
		
		//≪ 媛 곕 寃
		switch($_POST['action']){
			case 'insert' :
				$add_sql .= ", sidx='{$sidx}', date=now()";
				$msg = "寃湲 깆猷듬.";
				$url = $get_page;
			break;
			case 'update' :
				$add_sql .= " where idx='{$idx}'";
				$msg = "寃湲 듬.";
				$url = "{$get_page}view/{$idx}/";
			break;
		}
		
		//荑쇰━
		$cancel .= "action/";
		$column = get_column($_POST, $cancel);
		query($_POST['action'], "board", "{$column} {$add_sql}");
		
		//댁대
		if($msg) alert($msg);
		move($url);
	}
?>