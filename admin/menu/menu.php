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
        	<th>��ȣ</th>
        	<th>Ÿ��Ʋ</th>
        	<th>�޴�����</th>
        	<th>�޴�����</th>
        	<th>�����߰�</th>
        	<th>���꺸��</th>
        </tr>
        <?
		$dep1_r = sql("select * from menu where parent='0'");
		while($dep1 = mysql_fetch_assoc($dep1_r)){
			$dep2_s = "select * from menu where parent='{$dep1['idx']}'";
			$link = fetch($dep2_s);
			$cnt = total($dep2_s);
		?>
        <tr class="al_c">
        	<td><?=$dep1['idx']?></td>
        	<td><a href="/index.php/page/<?=$dep1['idx']?>/<?=$link['idx']?>/" title="<?=$dep1['title']?>" onclick="window.open(this.href); return false;"><?=$dep1['title']?></a></td>
        	<td><a href="<?="{$get_page}modify/{$dep1['idx']}/"?>" title="����">����</a></td>
        	<td><a href="<?="{$get_page}delete/{$dep1['idx']}/"?>" title="����">����</a></td>
        	<td><a href="<?="{$get_page}add/{$dep1['idx']}/"?>" title="����">�߰�</a></td>
        	<td><a id="dep1<?=$dep1['idx']?>" href="#" title="����" onclick="dep2view(<?=$dep1['idx']?>, <?=$cnt?>); return false;">����</a></td>
        </tr>
        <?
			$i=1;
			$dep2_r = sql($dep2_s);
			while($dep2 = mysql_fetch_assoc($dep2_r)){
		?>
        <tr class="al_c bg" id="dep2<?=$dep1['idx']?>_<?=$i?>" style="display:none;">
        	<td><?=$dep2['idx']?></td>
        	<td><a href="/index.php/page/<?=$dep2['parent']?>/<?=$dep2['idx']?>/" title="<?=$dep2['title']?>" onclick="window.open(this.href); return false;"><?=$dep2['title']?></a></td>
        	<td><a href="<?="{$get_page}modify/{$dep2['idx']}/"?>" title="����">����</a></td>
        	<td><a href="<?="{$get_page}delete/{$dep2['idx']}/"?>" title="����">����</a></td>
        	<td>-</td>
        	<td>-</td>
        </tr>
        <?
			$i++;
			}
		}
		?>
    </table>
    <? if($total != 0) echo $page_nate; ?>
    <div class="al_r">
    	<input type="button" class="btn" title="���θ޴��߰�" value="���θ޴��߰�" onclick="link('<?=$get_page?>add/'); return false;" />
    </div>
</div>