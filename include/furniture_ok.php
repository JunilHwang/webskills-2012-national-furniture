<?
	if($_POST['action']){
		//���� ���ε�
		if(is_uploaded_file($_FILES['file']['tmp_name'])){
			$file_name = file_uploaded($_FILES['file']);
			$file = $_FILES['file']['name'];
			$add_sql .= ", file='{$file}', file_name='{$file_name}'";
			@unlink("{$_SERVER['DOCUMENT_ROOT']}/furniture/{$_POST['up_file']}");
		}
		
		//�׼� ���� ���� �˻�
		switch($_POST['action']){
			//������û
			case 'hope' :
				$_POST['action'] = "insert"; 
				$add_sql .= ", now=0, name='{$_SESSION['name']}', email='{$_SESSION['email']}'";
				$msg = "���� ��û�� �Ϸ�Ǿ����ϴ�.";
				$url = $get_page;
			break;
			
			//�����߰�
			case 'add' :
				$_POST['action'] = "insert"; 
				$add_sql .= ", now=1";
				$msg = "������ �߰��Ǿ����ϴ�.";
				$url = $get_page;
			break;
			
			//������� �߰�
			case 'hope_add' :
				$_POST['action'] = 'update';
				$add_sql .= " now=1, name='', email='' where idx='{$_POST['idx']}'";
				$msg = "�߰��Ǿ����ϴ�.";
				$url = $get_page;
			break;
		}
		
		//����
		$cancel .= "action/idx/";
		$column = get_column($_POST, $cancel);
		query($_POST['action'], "furniture", "{$column} {$add_sql}");
		
		//�������̵�
		if($msg) alert($msg);
		move($url);
	}
?>