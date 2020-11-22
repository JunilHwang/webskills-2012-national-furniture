<?
	//DB접속 or 함수 인클루드
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
<title>회원 정보 보기</title>
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
<div class="wh al_l h4" title="회원정보를 조회합니다.">회원정보를 조회합니다.</div>
<div class="form">
	<div class="table">
    	<div class="tr">
        	<span class="left"><?=$chk?>이름</span>
            <span class="right"><?=$member['name']?></span>
        </div>
        <div class="tr">
        	<span class="left"><?=$chk?>이메일 주소</span>
            <span class="right"><?=$member['email']?></span>
        </div>
        <div class="tr">
        	<span class="left"><?=$chk?>전화번호</span>
            <span class="right"><?=$member['phone']?></span>
        </div>
        <div class="tr">
        	<span class="left">휴대폰 번호</span>
            <span class="right"><?=$member['cell']?></span>
        </div>
    </div>

    <div class="wh al_c">
        <input type="button" class="btn2" title="닫기" value="닫기" onclick="window.close(); return false;" />
    </div>
</div>
</body>
</html>
