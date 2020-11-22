<?
	//인클루드
	include_once("{$_SERVER['DOCUMENT_ROOT']}/include/furniture_ok.php");
	$fur = fetch("select * from furniture where idx='{$idx}'");
	$num = "{$fur['num']}개";
	if($fur['num'] == 0) $num = "품절되었습니다.";
?>
<div class="wh al_l h4" title="가구정보를 조회합니다.">가구정보를 조회합니다.</div>
<div class="form">
	<div class="table">
    	<div class="tr">
        	<span class="left">가구분류</span>
            <span class="right"><?=$fur['type']?></span>
        </div>
    	<div class="tr">
        	<span class="left">가구명</span>
            <span class="right"><?=$fur['fname']?></span>
        </div>
        <div class="tr">
        	<span class="left">수량</span>
            <span class="right"><?=$num?></span>
        </div>
        <div class="tr">
        	<span class="left cont_left">가구설명</span>
            <span class="right cont_right"><?=$fur['content']?></span>
        </div>
    </div>
	<div class="wh al_c">
    	<? if($fur['num'] != 0){ ?>
        <input type="button" class="btn" title="대여예약" value="대여예약" onclick="link('<?="{$get_page}re/{$idx}/"?>'); return false;" />
        <? } ?>
        <input type="button" class="btn" title="목록으로" value="목록으로" onclick="link('<?=$get_page?>'); return false;" />
    </div>
</div>