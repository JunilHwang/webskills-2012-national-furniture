<?
	if($_POST['action']){
		//鍮諛踰 명
		if($_POST['pw']) $_POST['pw'] = md5($_POST['pw']);
		if($_POST['re_pw']) $_POST['re_pw'] = md5($_POST['re_pw']);
		
		//≪ 媛 곕 寃
		switch($_POST['action']){
			case 'insert' :
				$parent = $idx ? $idx : 0;
				$menu = fetch("select * from menu where parent='{$parent}' order by od desc limit 1");
				$od = $menu['od'] ? $menu['od']+1 : 0;
				$add_sql .= ", od='{$od}', parent='{$parent}'";
				$msg = "硫닿 異媛듬.";
				$url = $get_page;
			break;
			case 'update' :
				$add_sql .= " where idx='{$idx}'";
				$msg = "硫닿 듬.";
				$url = $get_page;
			break;
		}
		
		//荑쇰━
		$cancel .= "action/";
		$column = get_column($_POST, $cancel);
		query($_POST['action'], "menu", "{$column} {$add_sql}");
		
		//댁대
		if($msg) alert($msg);
		move($url);
	}
?>