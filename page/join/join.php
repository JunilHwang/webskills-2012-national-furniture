<?
	access(!$_SESSION['lv'], "�α׾ƿ� �� �̿����ּ���.");
	$chk = "<b class='red'>*</b>&nbsp;";
?>
<div class="wh al_l"><?=$chk?>ǥ�� �׸��� �ʼ� �Է� �����Դϴ�.</div>
<div class="form">
<form action="<?="http://127.0.0.1{$get_page}chk/"?>" method="post" onsubmit="return frmChk(this, 'name', 'email', 'pw', 'phone', 'code');">
	<div class="table">
    	<div class="tr">
        	<span class="left"><?=$chk?><label for="name" title="�̸�">�̸�</label></span>
            <span><input type="text" title="�̸�" id="name" name="name" size="10" /> �̸��� �� �ѱ۷� �Է����ּ���.</span>
        </div>
        <div class="tr">
        	<span class="left"><?=$chk?><label for="email" title="�̸��� �ּ�">�̸��� �ּ�</label></span>
            <span><input type="text" title="�̸��� �ּ�" id="email" name="email" size="20" /> ex) <?=hex2($site['email'])?></span>
        </div>
        <div class="tr">
        	<span class="left"><?=$chk?><label for="pw" title="��й�ȣ">��й�ȣ</label></span>
            <span><input type="password" title="��й�ȣ" id="pw" name="pw" size="15" /> ��й�ȣ�� 4~16���ڷ� �Է����ּ���.</span>
        </div>
        <div class="tr">
        	<span class="left"><?=$chk?><label for="phone" title="��ȭ��ȣ">��ȭ��ȣ</label></span>
            <span><input type="text" title="��ȭ��ȣ" id="phone" name="phone" size="18" /> ex) 010-0000-0000</span>
        </div>
        <div class="tr">
        	<span class="left"><label for="cell" title="�޴��� ��ȣ">�޴��� ��ȣ</label></span>
            <span><input type="text" title="�޴��� ��ȣ" id="cell" name="cell" size="18" /></span>
        </div>
        <div class="tr">
        	<span class="left"><?=$chk?><label for="code" title="�ڵ����Թ���">�ڵ����Թ���</label></span>
            <span><img src="/page/join/captcha.php" title="�ڵ����Թ����ڵ�" alt="�ڵ����Թ����ڵ�" />&nbsp;<input type="text" title="�ڵ����Թ���" id="code" name="code" size="18" /></span>
        </div>
    </div>

    <div class="wh al_c">
        <input type="submit" class="btn" title="�ۼ��Ϸ�" value="�ۼ��Ϸ�" />
        <input type="reset" class="btn" title="�ٽþ���" value="�ٽþ���" />
    </div>
</form>
</div>