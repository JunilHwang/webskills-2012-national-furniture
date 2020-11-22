<?
	//인클루드
	include_once("{$_SERVER['DOCUMENT_ROOT']}/include/member_ok.php");
	
	//chk
	$chk = "<b class='red'>*</b>&nbsp;";
	$member = fetch("select * from member where idx='{$idx}'");
?>
<div class="wh al_l"><?=$chk?>표시 항목은 필수 입력 사항입니다.</div>
<div class="form">
<form action="" method="post" onsubmit="return frmChk(this, 'name', 'phone', 'code');">
<div>
	<input type="hidden" name="action" value="update" />
    <input type="hidden" name="email" value="<?=$member['email']?>" />
</div>
	<div class="table">
    	<div class="tr">
        	<span class="left"><?=$chk?><label for="name" title="이름">이름</label></span>
            <span><input type="text" title="이름" id="name" name="name" size="10" value="<?=$member['name']?>" /> 이름을 순 한글로 입력해주세요.</span>
        </div>
        <div class="tr">
        	<span class="left"><?=$chk?><label for="phone" title="전화번호">전화번호</label></span>
            <span><input type="text" title="전화번호" id="phone" name="phone" size="18" value="<?=$member['phone']?>" /> ex) 010-0000-0000</span>
        </div>
        <div class="tr">
        	<span class="left"><label for="cell" title="휴대폰 번호">휴대폰 번호</label></span>
            <span><input type="text" title="휴대폰 번호" id="cell" name="cell" size="18" value="<?=$member['cell']?>" /></span>
        </div>
    </div>

    <div class="wh al_c">
        <input type="submit" class="btn" title="수정완료" value="수정완료" />
        <input type="button" class="btn" title="취소하기" value="취소하기" onclick="link('<?="{$get_page}"?>'); return false;" />
    </div>
</form>
</div>