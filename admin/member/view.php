<?
	$member = fetch("select * from member where idx='{$idx}'");
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
        <input type="button" class="btn2" title="수정" value="수정" onclick="link('<?="{$get_page}modify/{$idx}/"?>'); return false;" />
        <input type="button" class="btn2" title="삭제" value="삭제" onclick="if(confirm('정말로 삭제하시겠습니까?')) link('<?="{$get_page}delete/{$idx}/"?>'); return false;" />
        <input type="button" class="btn2" title="목록" value="목록" onclick="link('<?="{$get_page}"?>'); return false;" />
    </div>
</div>