<?
	//��Ŭ���
	include_once("{$_SERVER['DOCUMENT_ROOT']}/include/reser_ok.php");
	$fur_s = "select * from reser";
	access($_SESSION['lv'] == 2, "�����ڸ� �̿��Ҽ� �ֽ��ϴ�.");
?>
<div class="wh h4" title="�뿩�������� ��������Դϴ�.">�뿩�������� ��������Դϴ�.</div>
<div class="form">
<form action="" method="post" id="frm">
	<div>
		<input type="hidden" name="action" value="lend" />
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
        	<th>��û��(�����ȣ)</th>
			<th>������</th>
			<th>�뿩����</th>
            <th>��û��</th>       
			<th>�뿩�㰡</th>
		</tr>
		<?
		$fur_r = sql("{$fur_s} where now=1");
		while($fur = mysql_fetch_assoc($fur_r)){
			$rname = $fur['name'];
			if($fur['number']) $rname = $fur['number'];
			$fur['date'] = explode("-", $fur['date']);
			$fur['date'] = implode("", $fur['date']);
		?>
		<tr class="al_c">
			<td><?=$rname?></td>
			<td><?=$fur['fname']?></td>
			<td><?=$fur['re']?>��</td>
			<td><?=$fur['date']?></td>
			<td><a href="#" title="�㰡" onclick="frmSubmit('frm', '<?=$fur['idx']?>', 'pass'); return false;">�㰡</a></td>
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
		<input type="hidden" name="action" value="clear" />
		<input type="hidden" name="idx" value="" />
	</div>
</form>
	<table width="100%">
		<colgroup>
			<col width="18%" />
			<col width="18%" />
			<col width="18%" />
			<col width="18%" />
			<col width="18%" />
			<col width="10%" />
		</colgroup>
		<tr class="al_c bg2">
        	<th>�뿩��(�����ȣ)</th>
			<th>������</th>
			<th>�뿩����</th>
            <th>����</th>
			<th>�ݳ��㰡</th>
			<th>zip</th>
		</tr>
		<?
		$fur_r = sql("{$fur_s} where now=2 or now=3");
		while($fur = mysql_fetch_assoc($fur_r)){
			$rname = $fur['name'];
			if($fur['number']) $rname = $fur['number'];
			$return = "�뿩��";
			$now = "-";
			if($fur['now'] == 3){
				$return = "�ݳ������";
				$now = "<a href='#' onclick=\"frmSubmit('frm2', '{$fur['idx']}', 'pass'); return false;\" title='�㰡'>�㰡</a>";
			}
		?>
		<tr class="al_c">
			<td><?=$rname?></td>
			<td><?=$fur['fname']?></td>
			<td><?=$fur['re']?>��</td>
			<td><?=$return?></td>
			<td><?=$now?></td>
            <td><a href="/data/zip/<?=$fur['zip']?>" title="zip">zip</a></td>
		</tr>
		<?
		}
		?>
	</table>
</div>