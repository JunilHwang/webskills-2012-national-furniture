<?
	//��Ŭ���
	include_once("{$_SERVER['DOCUMENT_ROOT']}/include/member_ok.php");
	
	//chk
	$chk = "<b class='red'>*</b>&nbsp;";
	$member = fetch("select * from member where idx='{$idx}'");
?>
<div class="wh al_l"><?=$chk?>ǥ�� �׸��� �ʼ� �Է� �����Դϴ�.</div>
<div class="form">
<form action="" method="post" onsubmit="return frmChk(this, 'name', 'phone', 'code');">
<div>
	<input type="hidden" name="action" value="update" />
    <input type="hidden" name="email" value="<?=$member['email']?>" />
</div>
	<div class="table">
    	<div class="tr">
        	<span class="left"><?=$chk?><label for="name" title="�̸�">�̸�</label></span>
            <span><input type="text" title="�̸�" id="name" name="name" size="10" value="<?=$member['name']?>" /> �̸��� �� �ѱ۷� �Է����ּ���.</span>
        </div>
        <div class="tr">
        	<span class="left"><?=$chk?><label for="phone" title="��ȭ��ȣ">��ȭ��ȣ</label></span>
            <span><input type="text" title="��ȭ��ȣ" id="phone" name="phone" size="18" value="<?=$member['phone']?>" /> ex) 010-0000-0000</span>
        </div>
        <div class="tr">
        	<span class="left"><label for="cell" title="�޴��� ��ȣ">�޴��� ��ȣ</label></span>
            <span><input type="text" title="�޴��� ��ȣ" id="cell" name="cell" size="18" value="<?=$member['cell']?>" /></span>
        </div>
    </div>

    <div class="wh al_c">
        <input type="submit" class="btn" title="�����Ϸ�" value="�����Ϸ�" />
        <input type="button" class="btn" title="����ϱ�" value="����ϱ�" onclick="link('<?="{$get_page}"?>'); return false;" />
    </div>
</form>
</div>