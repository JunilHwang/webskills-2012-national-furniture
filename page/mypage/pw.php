<?
	//include
	include_once("{$_SERVER['DOCUMENT_ROOT']}/include/member_ok.php");
?>
<div class="wh al_l h4" title="��й�ȣ�� �����մϴ�.">��й�ȣ�� �����մϴ�.</div>
<div class="form">
<form action="" method="post" onsubmit="return frmChk(this, 'pw', 're_pw');">
<div><input type="hidden" name="action" value="pw_change" /></div>
	<div class="table">
        <div class="tr">
        	<span class="left"><?=$chk?><label for="pw" title="���� ��й�ȣ">���� ��й�ȣ</label></span>
            <span><input type="password" title="���� ��й�ȣ" id="pw" name="pw" size="15" /> ���� ��й�ȣ�� �Է����ּ���.</span>
        </div>
        <div class="tr">
        	<span class="left"><?=$chk?><label for="re_pw" title="����� ��й�ȣ">����� ��й�ȣ</label></span>
            <span><input type="password" title="����� ��й�ȣ" id="re_pw" name="re_pw" size="15" /> ����� ��й�ȣ�� �Է����ּ���.</span>
        </div>
    </div>

    <div class="wh al_c">
        <input type="submit" class="btn" title="�ۼ��Ϸ�" value="�ۼ��Ϸ�" />
        <input type="button" class="btn" title="����ϱ�" value="����ϱ�" onclick="link('<?="{$get_page}"?>'); return false;" />
    </div>
</form>
</div>