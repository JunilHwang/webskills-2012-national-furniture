<div class="wh mb15">
	<input type="button" class="btn3" title="�뿩����������" value="�뿩����������" onclick="link('<?="{$get_page}"?>'); return false;" />
</div>
<?
	//��Ŭ���
	include_once("{$_SERVER['DOCUMENT_ROOT']}/include/reser_ok.php");
	
	if($_SESSION['email']){
		$fur_s = "select * from reser where email='{$_SESSION['email']}'";
	} else {
		$fur_s = "select * from reser where number='{$_POST['number']}'";
	}
?>
<? if(!$_SESSION['email'] && !$_POST['number']){ ?>
<div class="number_input">
<form action="" method="post" onsubmit="return frmChk(this, 'number');">
	<div class="wh al_c">
    	<label for="number" class="h4" title="�ֹ���ȣ">�ֹ���ȣ</label>
        <input type="text" title="�ֹ���ȣ" id="number" name="number" size="15" />
        <input type="submit" class="btn" title="Ȯ���ϱ�" value="Ȯ���ϱ�" />
    </div>
</form>
</div>
<? } else {?>
<div class="wh h4" title="�뿩�������� ��������Դϴ�.">�뿩�������� ��������Դϴ�.</div>
<div class="form">
<form action="" method="post" id="frm">
	<div>
		<input type="hidden" name="action" value="delete" />
		<input type="hidden" name="idx" value="" />
	</div>
</form>
	<table width="100%">
		<colgroup>
			<col width="20%" />
			<col width="20%" />
			<col width="20%" />
			<col width="20%" />
			<col width="20%" />
		</colgroup>
		<tr class="al_c bg2">
			<th>������</th>
			<th>�뿩����</th>
            <th>��û��</th>            
			<th>����</th>
			<th>����</th>
		</tr>
		<?
		$fur_r = sql("{$fur_s} and now=1");
		while($fur = mysql_fetch_assoc($fur_r)){
			$fur['date'] = explode("-", $fur['date']);
			$fur['date'] = implode("", $fur['date']);
		?>
		<tr class="al_c">
			<td><?=$fur['fname']?></td>
			<td><?=$fur['re']?>��</td>
			<td><?=$fur['date']?></td>
			<td><a href="<?="{$get_page}modify/{$fur['idx']}/"?>" title="����">����</a></td>
			<td><a href="#" title="����" onclick="frmSubmit('frm', '<?=$fur['idx']?>'); return false;">����</a></td>
		</tr>
		<?
		}
		?>
	</table>
</div>

<div class="wh h4" title="�뿩���� ��������Դϴ�.">�뿩���� ��������Դϴ�.</div>
<div class="form">
<form action="" method="post" id="frm2">
	<div>
		<input type="hidden" name="action" value="return" />
		<input type="hidden" name="idx" value="" />
	</div>
</form>
	<table width="100%">
		<colgroup>
			<col width="20%" />
			<col width="20%" />
			<col width="20%" />
			<col width="20%" />
			<col width="20%" />
		</colgroup>
		<tr class="al_c bg2">
			<th>������</th>
			<th>�뿩����</th>
			<th>��û��</th>
			<th>����</th>
            <th>�ݳ�</th>
		</tr>
		<?
		$fur_r = sql("{$fur_s} and (now=2 or now=3)");
		while($fur = mysql_fetch_assoc($fur_r)){
			$now = $fur['now'] == 2 ? "�뿩��" : "�ݳ������";
			$return = "<a href='#' onclick=\"frmSubmit('frm2', '{$fur['idx']}', 'pass'); return false;\" title='�ݳ�'>�ݳ�</a>";
			if($fur['now'] == 3) $return = "-";
		?>
		<tr class="al_c">
			<td><?=$fur['fname']?></td>
			<td><?=$fur['re']?>��</td>
			<td><?=$fur['date']?></td>
            <td><?=$now?></td>
			<td><?=$return?></td>
		</tr>
		<?
		}
		?>
	</table>
</div>
<? } ?>
