<?
	//ĸ��, �̸��� �˻�
	if($_POST['code']){
		access($_SESSION['scode'] == $_POST['code'], "�ڵ����Թ����Է� �ڵ尡 Ʋ�Ƚ��ϴ�.");
		$member = total("select * from member where email='{$_POST['email']}'");
		access($member == 0, "�̹� ��ϵ� �̸��� �Դϴ�.");
	}

	//�˻�
	include_once("{$_SERVER['DOCUMENT_ROOT']}/include/member_ok.php");

	//chk
	$chk = "<b class='red'>*</b>&nbsp;";
?>
<div class="wh al_l">�Է»����� �ùٸ��� �˻��մϴ�.</div>
<div class="form">
<form action="" method="post" onsubmit="return frmChk(this, 'name', 'email', 'pw', 'phone');">
<div><input type="hidden" name="action" value="insert" /></div>
	<div class="table">
    	<div class="tr">
        	<span class="left"><?=$chk?><label for="name" title="�̸�">�̸�</label></span>
            <span><input type="text" title="�̸�" id="name" name="name" size="10" value="<?=$_POST['name']?>" readonly="readonly" /> �̸��� �� �ѱ۷� �Է����ּ���.</span>
        </div>
        <div class="tr">
        	<span class="left"><?=$chk?><label for="email" title="�̸��� �ּ�">�̸��� �ּ�</label></span>
            <span><input type="text" title="�̸��� �ּ�" id="email" name="email" size="20" value="<?=$_POST['email']?>" readonly="readonly" /> ex) <?=hex2($site['email'])?></span>
        </div>
        <div class="tr">
        	<span class="left"><?=$chk?><label for="pw" title="��й�ȣ">��й�ȣ</label></span>
            <span><input type="text" title="��й�ȣ" id="pw" name="pw" size="15" value="<?=$_POST['pw']?>" readonly="readonly" /> ��й�ȣ�� 4~16���ڷ� �Է����ּ���.</span>
        </div>
        <div class="tr">
        	<span class="left"><?=$chk?><label for="phone" title="��ȭ��ȣ">��ȭ��ȣ</label></span>
            <span><input type="text" title="��ȭ��ȣ" id="phone" name="phone" size="18" value="<?=$_POST['phone']?>" readonly="readonly" /> ex) 010-0000-0000</span>
        </div>
        <div class="tr">
        	<span class="left"><label for="cell" title="�޴��� ��ȣ">�޴��� ��ȣ</label></span>
            <span><input type="text" title="�޴��� ��ȣ" id="cell" name="cell" size="18" value="<?=$_POST['cell']?>" readonly="readonly" /></span>
        </div>
    </div>

    <div class="wh al_c">
        <input type="submit" class="btn" title="�����ϱ�" value="�����ϱ�"  />
        <input type="button" class="btn" title="����ϱ�" value="����ϱ�" onclick="history.back(); return false;" />
    </div>
</form>
</div>