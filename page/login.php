<?	
	//include_onece
	include_once("{$_SERVER['DOCUMENT_ROOT']}/include/lib.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=euc-kr" />
<link rel="stylesheet" href="/common/css/common.css" charset="euc-kr" />
<script type="text/javascript" src="/common/js/common.js"></script>
<title>ȸ�� �α���</title>
</head>

<body>
<?
	if($_POST['email']){
		$_POST['pw'] = md5($_POST['pw']);
		$member = fetch("select * from member where email='{$_POST['email']}'");
		access($member['email'], "��ġ�ϴ� �̸����� �����ϴ�.");
		access($member['pw'] == $_POST['pw'], "��й�ȣ�� ��ġ���� �ʽ��ϴ�.");
		$_SESSION['lv'] = $member['lv'];
		$_SESSION['name'] = $member['name'];
		$_SESSION['email'] = $member['email'];
		echo
		"
		<script type='text/javascript'>
			window.opener.link('/');
			window.close();
		</script>
		";
	}
?>
<div class="login">
<form action="" method="post" onsubmit="return frmChk(this, 'email', 'pw');">
    <div class="left">
        <span class="left"><label for="email" title="�̸��� �ּ�">�̸���</label><input type="text" title="�̸��� �ּ�" id="email" name="email" size="20" /></span>
        <span class="left"><label for="pw" title="��й�ȣ">��й�ȣ</label><input type="password" title="��й�ȣ" id="pw" name="pw" size="15" /></span>
    </div>
    <div class="right">
    	<input type="submit" class="login_btn" type="login_btn" value="" />
    </div>
</form>
</div>
</body>
</html>
