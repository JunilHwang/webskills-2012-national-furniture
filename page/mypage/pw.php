<?
	//include
	include_once("{$_SERVER['DOCUMENT_ROOT']}/include/member_ok.php");
?>
<div class="wh al_l h4" title="비밀번호를 변경합니다.">비밀번호를 변경합니다.</div>
<div class="form">
<form action="" method="post" onsubmit="return frmChk(this, 'pw', 're_pw');">
<div><input type="hidden" name="action" value="pw_change" /></div>
	<div class="table">
        <div class="tr">
        	<span class="left"><?=$chk?><label for="pw" title="현재 비밀번호">현재 비밀번호</label></span>
            <span><input type="password" title="현재 비밀번호" id="pw" name="pw" size="15" /> 현재 비밀번호를 입력해주세요.</span>
        </div>
        <div class="tr">
        	<span class="left"><?=$chk?><label for="re_pw" title="변경될 비밀번호">변경될 비밀번호</label></span>
            <span><input type="password" title="변경될 비밀번호" id="re_pw" name="re_pw" size="15" /> 변경될 비밀번호를 입력해주세요.</span>
        </div>
    </div>

    <div class="wh al_c">
        <input type="submit" class="btn" title="작성완료" value="작성완료" />
        <input type="button" class="btn" title="취소하기" value="취소하기" onclick="link('<?="{$get_page}"?>'); return false;" />
    </div>
</form>
</div>