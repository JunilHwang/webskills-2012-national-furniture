<?
	//��Ŭ���
	include_once("{$_SERVER['DOCUMENT_ROOT']}/include/furniture_ok.php");
	$fur = fetch("select * from furniture where idx='{$idx}'");
	$num = "{$fur['num']}��";
	if($fur['num'] == 0) $num = "ǰ���Ǿ����ϴ�.";
?>
<div class="wh al_l h4" title="���������� ��ȸ�մϴ�.">���������� ��ȸ�մϴ�.</div>
<div class="form">
	<div class="table">
    	<div class="tr">
        	<span class="left">�����з�</span>
            <span class="right"><?=$fur['type']?></span>
        </div>
    	<div class="tr">
        	<span class="left">������</span>
            <span class="right"><?=$fur['fname']?></span>
        </div>
        <div class="tr">
        	<span class="left">����</span>
            <span class="right"><?=$num?></span>
        </div>
        <div class="tr">
        	<span class="left cont_left">��������</span>
            <span class="right cont_right"><?=$fur['content']?></span>
        </div>
    </div>
	<div class="wh al_c">
    	<? if($fur['num'] != 0){ ?>
        <input type="button" class="btn" title="�뿩����" value="�뿩����" onclick="link('<?="{$get_page}re/{$idx}/"?>'); return false;" />
        <? } ?>
        <input type="button" class="btn" title="�������" value="�������" onclick="link('<?=$get_page?>'); return false;" />
    </div>
</div>