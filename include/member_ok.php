<?
	if($_POST['action']){
		//��й�ȣ ��ȣȭ
		if($_POST['pw']) $_POST['pw'] = md5($_POST['pw']);
		if($_POST['re_pw']) $_POST['re_pw'] = md5($_POST['re_pw']);
		
		//�׼� ���� ���� �˻�
		switch($_POST['action']){
			case 'insert' :
				$member = total("select * from member where email='{$_POST['email']}'");
				access($member == 0, "�̹� ��ϵ� �̸����Դϴ�.");
				$add_sql .= ", lv=1";
				$msg = "ȸ�������� �Ϸ�Ǿ����ϴ�.";
				$url = $get_page;
			break;
			case 'pw_change':
				$_POST['action'] = "update";
				$member = fetch("select * from member where email='{$_SESSION['email']}'");
				access($_POST['pw'] == $member['pw'], "���� ��й�ȣ�� ��ġ���� �ʽ��ϴ�.");
				$_POST['pw'] = $_POST['re_pw'];
				$cancel .= "re_pw/";
				$msg = "��й�ȣ�� ����Ǿ����ϴ�.";
				$url = $get_page;
			break;
			case 'update':
				$add_sql .= " where email='{$_POST['email']}'";
				$msg = "�����Ǿ����ϴ�.";
				$url = $get_page;
			break;
		}
		
		//����
		$cancel .= "action/";
		$column = get_column($_POST, $cancel);
		query($_POST['action'], "member", "{$column} {$add_sql}");
		
		//�������̵�
		if($msg) alert($msg);
		move($url);
	}
?>