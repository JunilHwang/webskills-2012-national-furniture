<script type="text/javascript">
	function fcnt(type, num){
		var re = document.getElementById('re');
		if(type == 'up'){
			re.value = parseInt(re.value) + 1;
			if(parseInt(re.value) >= num){
				alert('�ѵ����� �ʰ��߽��ϴ�.');
				re.value = num;
			}
		} else {
			re.value = parseInt(re.value) - 1;
			if(re.value <= 1){
				alert('�ּ� �� �� �̻� ��û�ؾ� �մϴ�.');
				re.value = 1;
			}
		}
	}
</script>
<?
	//��Ŭ���
	include_once("{$_SERVER['DOCUMENT_ROOT']}/include/reser_ok.php");
	if($_SESSION['lv']) $member = fetch("select * from member where email='{$_SESSION['email']}'");
	$fur = fetch("select * from furniture where idx='{$idx}'");
?>
<div class="wh al_l h4" title="������ �뿩���մϴ�.">������ �뿩���մϴ�.</div>
<div class="form">
<form action="" method="post" onSubmit="return frmChk(this, 're');">
<div>
	<input type="hidden" name="action" value="insert" />
	<input type="hidden" name="fidx" value="<?=$fur['idx']?>" />
	<input type="hidden" name="fname" value="<?=$fur['fname']?>" />
	<input type="hidden" name="name" value="<?=$member['name']?>" />
	<input type="hidden" name="email" value="<?=$member['email']?>" />
</div>
	<div class="table">
    	<? if($_SESSION['lv']){ ?>
    	<? $member = arr_hex($member); ?>
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
        <? } ?>
    	<div class="tr">
        	<span class="left"><label for="re" title="�뿩����">�뿩����</label></span>
            <span>
            	<input type="button" class="btn4" title="+" value="+" onclick="fcnt('up', <?=$fur['num']?>); return false;" />
            	<input type="text" title="�뿩����" id="re" name="re" size="3" value="1" readonly="readonly" style="height:14px;" />
                <input type="button" class="btn4" title="-" value="-" onclick="fcnt('down', <?=$fur['num']?>);" />
            </span>
        </div>
    	<div class="tr">
        	<span class="left"><label for="date" title="��û����">��û����</label></span>
            <span>
            	<select name="date[]" id="date" title="�⵵">
                	<option value="">�⵵</option>
                    <? for($i=2012; $i<=2015; $i++){ ?>
                    <option value="<?=$i?>"><?=$i?></option>
                    <? } ?>
                </select> -
            	<select name="date[]" title="��">
                	<option value="">��</option>
                    <? for($i=1; $i<=12; $i++){ ?>
                    <option value="<?=$i?>"><?=$i?></option>
                    <? } ?>
                </select> -
            	<select name="date[]" title="��">
                	<option value="">��</option>
                    <? for($i=1; $i<=31; $i++){ ?>
                    <option value="<?=$i?>"><?=$i?></option>
                    <? } ?>
                </select>
            </span>
        </div>
    </div>

    <div class="wh al_c">
        <input type="submit" class="btn" title="�ۼ��Ϸ�" value="�ۼ��Ϸ�" />
        <input type="button" class="btn" title="�������" value="�������" onClick="link('<?=$get_page?>'); return false;" />
    </div>
</form>
</div>