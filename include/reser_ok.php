<?
	if($_POST['action']){		
    	switch($_POST['action']){
			//��������
			case 'insert':
				$_POST['date'] = implode("-", $_POST['date']);
				$now = strtotime(date("Y-m-d"));
				$re_date = strtotime(date("{$_POST['date']}"));
				access($re_date >= $now, "���� ��¥���� ������ �� �����ϴ�.");
				if($_SESSION['lv']){
					$msg = "����Ǿ����ϴ�.";
					include_once("{$_SERVER['DOCUMENT_ROOT']}/include/zip.php");
				} else {
					$number = str_pad(rand(0, 99999),5,0,0);
					$add_sql .= ", number='{$number}'";
					$cancel .= "name/email/";
					$msg = "�����ȣ�� [{$number}] �Դϴ�.";
				}
				$add_sql .= ", now=1";
				sql("update furniture set num=num-{$_POST['re']} where idx='{$_POST['fidx']}'");
				$url = $get_page;
			break;
			
			//�������
			case 'delete' :
				$add_sql .= " idx = '{$_POST['idx']}'";
				$msg = "������ ��ҵǾ����ϴ�.";
				$url = "{$get_page}now/";
			break;
			
			//�������
			case 'modify' :
				$_POST['action'] = 'update';
				$_POST['date'] = implode("-", $_POST['date']);
				$now = strtotime(date("Y-m-d"));
				$re_date = strtotime(date("{$_POST['date']}"));
				access($re_date >= $now, "���� ��¥���� ������ �� �����ϴ�.");
				$add_sql .= " where idx='{$idx}'";
				$msg = "�����Ǿ����ϴ�.";
				$url = "{$get_page}now/";
			break;
			
			//�����㰡
			case 'lend' :
				$_POST['action'] = 'update';
				$add_sql .= " now=2 where idx='{$_POST['idx']}'";
				$msg = "�뿩�Ǿ����ϴ�.";
				$url = $get_page;
			break;
			
			//�ݳ����
			case 'return' :
				$_POST['action'] = 'update';
				$add_sql .= " now=3 where idx='{$_POST['idx']}'";
				$msg = "�ݳ���û �Ǿ����ϴ�.";
				$url = "{$get_pgae}now/";
			break;
			
			//�ݳ�
			case 'clear' :
				$_POST['action'] = 'delete';
				$add_sql .= " idx = '{$_POST['idx']}'";
				$re = fetch("select * from reser where idx='{$_POST['idx']}'");
				$fur = fetch("select * from furniture where idx='{$re['fidx']}'");
				sql("update furniture set num=num+{$re['re']} where idx='{$_POST['idx']}'");
				$msg = "�ݳ��Ǿ����ϴ�.";
				$url = $get_page;
			break;
        }
		//����
		$cancel .= "action/idx/";
		$column = get_column($_POST, $cancel);
		query($_POST['action'], "reser", "{$column} {$add_sql}");
		
		//�������̵�
		if($msg) alert($msg);
		move($url);
	}
?>