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
<title>회원 로그인</title>
</head>

<body>
<?
	if($_POST['email']){
		$_POST['pw'] = md5($_POST['pw']);
		$member = fetch("select * from member where email='{$_POST['email']}'");
		access($member['email'], "일치하는 이메일이 없습니다.");
		access($member['pw'] == $_POST['pw'], "비밀번호가 일치하지 않습니다.");
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
        <span class="left"><label for="email" title="이메일 주소">이메일</label><input type="text" title="이메일 주소" id="email" name="email" size="20" /></span>
        <span class="left"><label for="pw" title="비밀번호">비밀번호</label><input type="password" title="비밀번호" id="pw" name="pw" size="15" /></span>
    </div>
    <div class="right">
    	<input type="submit" class="login_btn" type="login_btn" value="" />
    </div>
</form>
</div>
</body>
</html>
