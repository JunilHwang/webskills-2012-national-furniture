<?
	//DB���� or �Լ� ��Ŭ���
	include_once("{$_SERVER['DOCUMENT_ROOT']}/include/lib.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=euc-kr" />
<link rel="stylesheet" href="/common/css/common.css" charset="euc-kr" />
<link rel="stylesheet" href="/common/css/sub.css" charset="euc-kr" />
<script type="text/javascript" src="/common/js/common.js"></script>
<style type="text/css">
	body { background:none;}
</style>
<title>ȸ�� ���� ����</title>
</head>

<body>
<?
	if($_GET['idx']){
		$fur = fetch("select * from furniture where idx='{$_GET['idx']}'");
	} else if($_GET['email']){
		$fur['email'] = urldecode($_GET['email']);
	}
	$member = fetch("select * from member where email='{$fur['email']}'");
	$member['email'] = hex2($member['email']);
?>
<div class="wh al_l h4" title="ȸ�������� ��ȸ�մϴ�.">ȸ�������� ��ȸ�մϴ�.</div>
<div class="form">
	<div class="table">
    	<div class="tr">
        	<span class="left"><?=$chk?>�̸�</span>
            <span class="right"><?=$member['name']?></span>
        </div>
        <div class="tr">
        	<span class="left"><?=$chk?>�̸��� �ּ�</span>
            <span class="right"><?=$member['email']?></span>
        </div>
        <div class="tr">
        	<span class="left"><?=$chk?>��ȭ��ȣ</span>
            <span class="right"><?=$member['phone']?></span>
        </div>
        <div class="tr">
        	<span class="left">�޴��� ��ȣ</span>
            <span class="right"><?=$member['cell']?></span>
        </div>
    </div>

    <div class="wh al_c">
        <input type="button" class="btn2" title="�ݱ�" value="�ݱ�" onclick="window.close(); return false;" />
    </div>
</div>
</body>
</html>
