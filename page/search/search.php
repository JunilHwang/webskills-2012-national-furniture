<?
	//�ּҰ� ����
	$search_type = isset($get[4]) ? $get[4] : NULL;
	$search_key = isset($get[5]) ? decode($get[5]) : NULL;
	$page_num  = $get[6] ? $get[6] : 1;
	$page_num2 = $get[7] ? $get[7] : 1;
	
	//������ �̵�
	if(isset($_POST['type']) && isset($_POST['key'])) move("{$get_page}{$_POST['type']}/".encode($_POST['key'])."/");
	if(isset($search_type) && isset($search_key)){
		//�˻� Ÿ��
		$sel[$search_type] = 'selected="selected"';
		
		//���� ����
		$fur_s = "select * from furniture where now=1 and (instr(type, binary('{$search_key}')) or instr(fname, binary('{$search_key}')) or instr(num, binary('{$search_key}')) or instr(content, binary('{$search_key}')))";
		$re_s = "select * from reser where now=2 and (instr(fname, binary('{$search_key}')) or instr(date, binary('{$search_key}')) or instr(name, binary('{$search_key}')))";
		
		//��������
		$search_cnt = $fur_cnt = $re_cnt = 0;
		if($search_key != ''){
			$cnt_r = sql($fur_s);
			while($cnt = mysql_fetch_assoc($cnt_r)){
				$fur_cnt += substr_count($cnt['type'], $search_key);
				$fur_cnt += substr_count($cnt['fname'], $search_key);
				$fur_cnt += substr_count($cnt['num'], $search_key);
				$fur_cnt += substr_count($cnt['content'], $search_key);
			}
			$cnt_r = sql($re_s);
			while($cnt = mysql_fetch_assoc($cnt_r)){
				$re_cnt += substr_count($cnt['fname'], $search_key);
			}
			$search_cnt = $fur_cnt + $re_cnt;
		}
		
		//����¡
		$total1 = total($fur_s);
		$total2 = total($re_s);
		$page_nate1 = page_nate($page_num, $total1, "{$get_page}{$search_type}/".encode($search_key)."/&&/", "previous", "next");
		$page_nate2 = page_nate($page_num2, $total2, "{$get_page}{$search_type}/".encode($search_key)."/{$page_num}/&&/", "previous", "next");
		$start1 = 5 * ($page_num - 1);
		$start2 = 5 * ($page_num2 - 1);
		
		//�˻�����
		$fur_r = sql("{$fur_s} order by binary(type) asc, binary(fname) asc limit $start1, 5");
		$re_r = sql("{$re_s} order by binary(fname) asc, binary(re) asc limit $start2, 5");
	}
?>
<div class="search mb15">
<form action="" method="post">
    <div>
    <select name="type" title="�޴�Ÿ��">
    	<option value="total" <?=$sel['total']?>>��ü</option>
    	<option value="furniture" <?=$sel['furniture']?>>��ϵ� ����</option>
    	<option value="reser" <?=$sel['reser']?>>�뿩���ε� ����</option>
    </select>
    <input type="text" title="���հ˻�" name="key" id="key" size="40" value="<?=$search_key?>" />
    <input type="submit" class="btn" title="�˻��ϱ�" value="�˻��ϱ�" />
	</div>
</form>
</div>
<?
//�˻� ����
if(isset($search_type) && isset($search_key)){
?>
<div class="wh h4 al_r" title="Ű���� �˻� ��� : <?=$search_cnt?>��">Ű���� �˻� ��� : <?=$search_cnt?>��</div>
<?
	if($search_type == 'furniture' || $search_type == 'total'){
?>
<div class="wh mt15" title="��ϵ� ���� �˻� ��� : <?=$total1?>��">��ϵ� ���� �˻� ��� : <?=$total1?>��</div>
<div class="form">
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
        	<th>�����̹���</th>
        	<th>�з�</th>
            <th>������</th>
        	<th>����</th>
        	<th>��������</th>
        	<th>Ű����</th>
        </tr>
        <?
		while($fur = mysql_fetch_assoc($fur_r)){
			$cnt = 0;
			if($search_key != ''){
				$cnt += substr_count($fur['type'], $search_key);
				$cnt += substr_count($fur['fname'], $search_key);
				$cnt += substr_count($fur['num'], $search_key);
				$cnt += substr_count($fur['content'], $search_key);
			}
			foreach($fur as $key=>$val) if($key != 'file_name') $se[$key] = hit($val, $search_key);
		?>
        <tr class="al_c">
        	<td><img src="/data/furniture/thum_<?=$fur['file_name']?>" title="<?=$fur['fname']?>" alt="<?=$se['fname']?>" /></td>
        	<td><?=$se['type']?></td>
        	<td><a href="<?="/index.php/page/3/11/view/{$fur['idx']}/"?>" onclick="window.open(this.href); return false;" title="<?=$fur['fname']?>"><?=$se['fname']?></a></td>
        	<td><?=$se['num']?></td>
        	<td><?=$se['content']?></td>
        	<td><?=$cnt?>��</td>
        </tr>
        <?
		}
		?>
    </table>
</div>
<? if($total1 != 0) echo $page_nate1 ?>
<?
	}
	
	if($search_type == 'reser' || $search_type == 'total'){
?>
<div class="wh mt30" title="�뿩�� ���ε� ���� �˻� ��� : <?=$total2?>��">�뿩�� ���ε� ���� �˻� ��� : <?=$total2?>��</div>
<div class="form">
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
            <th>����</th>
        	<th>�뿩��</th>
        	<th>��û��</th>
        	<th>Ű����</th>
        </tr>
        <?
		while($re = mysql_fetch_assoc($re_r)){
			$cnt = 0;
			if($search_key != ''){
				$cnt += substr_count($re['fname'], $search_key);
			}
			$re['date'] = explode("-", $re['date']);
			$re['date'] = implode("", $re['date']);
			foreach($re as $key=>$val) if($key != 'file_name') $se[$key] = hit($val, $search_key);
			$num = fetch("select * from furniture where idx='{$re['fidx']}'");
				$m_email = urlencode($re['email']);
		?>
        <tr class="al_c">
        	<td><?=$se['fname']?></td>
        	<td><?=$num['num']?></td>
        	<td><a href="/page/member_view.php?email=<?=$m_email?>" title="<?=$re['email']?>" onclick="window.open(this.href, 'member', 'width=680px, height=400px, top=200px, left=200px'); return false;"><?=$se['name']?></a></td>
        	<td><?=$se['date']?></td>
        	<td><?=$cnt?>��</td>
        </tr>
        <?
		}
		?>
    </table>
</div>
<? if($total2 != 0) echo $page_nate2 ?>
<?
	}
}
?>