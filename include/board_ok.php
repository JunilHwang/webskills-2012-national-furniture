<?
	if($_POST['action']){
		//��й�ȣ ��ȣȭ
		if($_POST['pw']) $_POST['pw'] = md5($_POST['pw']);
		if($_POST['re_pw']) $_POST['re_pw'] = md5($_POST['re_pw']);
		$_POST = arr_change($_POST);
		
		//�׼� ���� ���� �˻�
		switch($_POST['action']){
			case 'insert' :
				$add_sql .= ", sidx='{$sidx}', date=now()";
				$msg = "�Խñ��� �ۼ��Ϸ�Ǿ����ϴ�.";
				$url = $get_page;
			break;
			case 'update' :
				$add_sql .= " where idx='{$idx}'";
				$msg = "�Խñ��� �����Ǿ����ϴ�.";
				$url = "{$get_page}view/{$idx}/";
			break;
		}
		
		//����
		$cancel .= "action/";
		$column = get_column($_POST, $cancel);
		query($_POST['action'], "board", "{$column} {$add_sql}");
		
		//�������̵�
		if($msg) alert($msg);
		move($url);
	}
?>