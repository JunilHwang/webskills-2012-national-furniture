<div class="wh h4" title="사이트의 메뉴를 관리합니다.">사이트의 메뉴를 관리합니다.</div>
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
        	<th>이름</th>
        	<th>이메일</th>
        	<th>전화번호</th>
        	<th>핸드폰번호</th>
        	<th>회원정보보기</th>
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
        	<td><a href="<?="{$get_page}view/{$member['idx']}/"?>">회원정보보기</a></td>
        </tr>
        <?
		}
		?>
    </table>
    <? if($total != 0) echo $page_nate; ?>
    <div class="al_r">
    	<input type="button" class="btn" title="회원추가" value="회원추가" onclick="link('<?=$get_page?>add/'); return false;" />
    </div>
</div>