<div class="wh h4" title="����Ʈ�� �޴��� �����մϴ�.">����Ʈ�� �޴��� �����մϴ�.</div>
<div class="form">
	<table width="100%">
    	<colgroup>
        	<col width="10%" />
        	<col width="30%" />
        	<col width="15%" />
        	<col width="15%" />
        	<col width="15%" />
        	<col width="15%" />
        </colgroup>
    	<tr class="al_c bg2">
        	<th>�̸�</th>
        	<th>�̸���</th>
        	<th>��ȭ��ȣ</th>
        	<th>�ڵ�����ȣ</th>
        	<th>ȸ����������</th>
        </tr>
        <?
		$member_r = sql("select * from member where lv='1'");
		while($member = mysql_fetch_assoc($member_r)){
			$member = arr_hex($member);
		?>
        <tr class="al_c">
        	<td><?=$member['name']?></td>
        	<td><?=$member['email']?></td>
        	<td><?=$member['phone']?></td>
        	<td><?=$member['cell']?></td>
        	<td><a href="<?="{$get_page}view/{$member['idx']}/"?>">ȸ����������</a></td>
        </tr>
        <?
		}
		?>
    </table>
    <? if($total != 0) echo $page_nate; ?>
    <div class="al_r">
    	<input type="button" class="btn" title="ȸ���߰�" value="ȸ���߰�" onclick="link('<?=$get_page?>add/'); return false;" />
    </div>
</div>