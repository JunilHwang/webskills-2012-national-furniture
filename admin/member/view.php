<?
	$member = fetch("select * from member where idx='{$idx}'");
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
        <input type="button" class="btn2" title="����" value="����" onclick="link('<?="{$get_page}modify/{$idx}/"?>'); return false;" />
        <input type="button" class="btn2" title="����" value="����" onclick="if(confirm('������ �����Ͻðڽ��ϱ�?')) link('<?="{$get_page}delete/{$idx}/"?>'); return false;" />
        <input type="button" class="btn2" title="���" value="���" onclick="link('<?="{$get_page}"?>'); return false;" />
    </div>
</div>