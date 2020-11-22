<?
	access(!$_SESSION['lv'], "로그아웃 후 이용해주세요.");
	$chk = "<b class='red'>*</b>&nbsp;";
?>
<div class="wh al_l"><?=$chk?>표시 항목은 필수 입력 사항입니다.</div>
<div class="form">
<form action="<?="http://127.0.0.1{$get_page}chk/"?>" method="post" onsubmit="return frmChk(this, 'name', 'email', 'pw', 'phone', 'code');">
	<div class="table">
    	<div class="tr">
        	<span class="left"><?=$chk?><label for="name" title="이름">이름</label></span>
            <span><input type="text" title="이름" id="name" name="name" size="10" /> 이름을 순 한글로 입력해주세요.</span>
        </div>
        <div class="tr">
        	<span class="left"><?=$chk?><label for="email" title="이메일 주소">이메일 주소</label></span>
            <span><input type="text" title="이메일 주소" id="email" name="email" size="20" /> ex) <?=hex2($site['email'])?></span>
        </div>
        <div class="tr">
        	<span class="left"><?=$chk?><label for="pw" title="비밀번호">비밀번호</label></span>
            <span><input type="password" title="비밀번호" id="pw" name="pw" size="15" /> 비밀번호를 4~16글자로 입력해주세요.</span>
        </div>
        <div class="tr">
        	<span class="left"><?=$chk?><label for="phone" title="전화번호">전화번호</label></span>
            <span><input type="text" title="전화번호" id="phone" name="phone" size="18" /> ex) 010-0000-0000</span>
        </div>
        <div class="tr">
        	<span class="left"><label for="cell" title="휴대폰 번호">휴대폰 번호</label></span>
            <span><input type="text" title="휴대폰 번호" id="cell" name="cell" size="18" /></span>
        </div>
        <div class="tr">
        	<span class="left"><?=$chk?><label for="code" title="자동가입방지">자동가입방지</label></span>
            <span><img src="/page/join/captcha.php" title="자동가입방지코드" alt="자동가입방지코드" />&nbsp;<input type="text" title="자동가입방지" id="code" name="code" size="18" /></span>
        </div>
    </div>

    <div class="wh al_c">
        <input type="submit" class="btn" title="작성완료" value="작성완료" />
        <input type="reset" class="btn" title="다시쓰기" value="다시쓰기" />
    </div>
</form>
</div>