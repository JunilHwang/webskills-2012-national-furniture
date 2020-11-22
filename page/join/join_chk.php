<?
	//캡차, 이메일 검사
	if($_POST['code']){
		access($_SESSION['scode'] == $_POST['code'], "자동가입방지입력 코드가 틀렸습니다.");
		$member = total("select * from member where email='{$_POST['email']}'");
		access($member == 0, "이미 등록된 이메일 입니다.");
	}

	//검사
	include_once("{$_SERVER['DOCUMENT_ROOT']}/include/member_ok.php");

	//chk
	$chk = "<b class='red'>*</b>&nbsp;";
?>
<div class="wh al_l">입력사항이 올바른지 검사합니다.</div>
<div class="form">
<form action="" method="post" onsubmit="return frmChk(this, 'name', 'email', 'pw', 'phone');">
<div><input type="hidden" name="action" value="insert" /></div>
	<div class="table">
    	<div class="tr">
        	<span class="left"><?=$chk?><label for="name" title="이름">이름</label></span>
            <span><input type="text" title="이름" id="name" name="name" size="10" value="<?=$_POST['name']?>" readonly="readonly" /> 이름을 순 한글로 입력해주세요.</span>
        </div>
        <div class="tr">
        	<span class="left"><?=$chk?><label for="email" title="이메일 주소">이메일 주소</label></span>
            <span><input type="text" title="이메일 주소" id="email" name="email" size="20" value="<?=$_POST['email']?>" readonly="readonly" /> ex) <?=hex2($site['email'])?></span>
        </div>
        <div class="tr">
        	<span class="left"><?=$chk?><label for="pw" title="비밀번호">비밀번호</label></span>
            <span><input type="text" title="비밀번호" id="pw" name="pw" size="15" value="<?=$_POST['pw']?>" readonly="readonly" /> 비밀번호를 4~16글자로 입력해주세요.</span>
        </div>
        <div class="tr">
        	<span class="left"><?=$chk?><label for="phone" title="전화번호">전화번호</label></span>
            <span><input type="text" title="전화번호" id="phone" name="phone" size="18" value="<?=$_POST['phone']?>" readonly="readonly" /> ex) 010-0000-0000</span>
        </div>
        <div class="tr">
        	<span class="left"><label for="cell" title="휴대폰 번호">휴대폰 번호</label></span>
            <span><input type="text" title="휴대폰 번호" id="cell" name="cell" size="18" value="<?=$_POST['cell']?>" readonly="readonly" /></span>
        </div>
    </div>

    <div class="wh al_c">
        <input type="submit" class="btn" title="가입하기" value="가입하기"  />
        <input type="button" class="btn" title="취소하기" value="취소하기" onclick="history.back(); return false;" />
    </div>
</form>
</div>