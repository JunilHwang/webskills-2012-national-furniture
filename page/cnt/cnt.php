<?
	//��Ŭ���
	include_once("{$_SERVER['DOCUMENT_ROOT']}/include/furniture_ok.php");
	$fur_s = "select * from furniture where now=0";
	$total = total($fur_s);
	$fur_r = sql("{$fur_s} order by binary(type) asc, binary(name) asc");
	access($_SESSION['lv']==2, "�����ڸ� �̿��� �� �ֽ��ϴ�.")
?>
<div class="wh" title="�� �Խù� : <?=$total?>��">�� �Խù� : <?=$total?>��</div>
<div class="form">
<form action="" method="post" id="frm">
	<div>
    	<input type="hidden" name="action" value="hope_add" />
        <input type="hidden" name="idx" value="" />
    </div>
</form>
	<table width="100%">
    	<colgroup>
        	<col width="10%" />
        	<col width="15%" />
        	<col width="30%" />
        	<col width="10%" />
        	<col width="10%" />
        </colgroup>
    	<tr class="al_c bg2">
        	<th>�з�</th>
            <th>��û��</th>
        	<th>������</th>
        	<th>����</th>
            <th>���</th>
        </tr>
        <?
		while($fur = mysql_fetch_assoc($fur_r)){
		?>
        <tr class="al_c">
        	<td><?=$fur['type']?></td>
            <td><a href="/page/member_view.php?idx=<?=$fur['idx']?>" title="<?=$fur['name']?>" onclick="window.open(this.href, 'member', 'width=680px, height=400px, top=200px, left=200px'); return false;"><?=$fur['name']?></a></td>
        	<td><?=$fur['fname']?></td>
        	<td><?=$fur['num']?></td>
            <td><a href="#" title="���" onclick="frmSubmit('frm', '<?=$fur['idx']?>', 'pass'); return false;">���</a></td>
        </tr>
        <?
		}
		?>
    </table>
</div>