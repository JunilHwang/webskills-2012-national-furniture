<?
	if($_POST['action']){
		//��й�ȣ ��ȣȭ
		if($_POST['pw']) $_POST['pw'] = md5($_POST['pw']);
		if($_POST['re_pw']) $_POST['re_pw'] = md5($_POST['re_pw']);
		
		//�׼� ���� ���� �˻�
		switch($_POST['action']){
			case 'insert' :
				$parent = $idx ? $idx : 0;
				$menu = fetch("select * from menu where parent='{$parent}' order by od desc limit 1");
				$od = $menu['od'] ? $menu['od']+1 : 0;
				$add_sql .= ", od='{$od}', parent='{$parent}'";
				$msg = "�޴��� �߰��Ǿ����ϴ�.";
				$url = $get_page;
			break;
			case 'update' :
				$add_sql .= " where idx='{$idx}'";
				$msg = "�޴��� �����Ǿ����ϴ�.";
				$url = $get_page;
			break;
		}
		
		//����
		$cancel .= "action/";
		$column = get_column($_POST, $cancel);
		query($_POST['action'], "menu", "{$column} {$add_sql}");
		
		//�������̵�
		if($msg) alert($msg);
		move($url);
	}
?>