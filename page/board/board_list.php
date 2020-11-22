<?
	$board_s = "select * from board where sidx = '{$sidx}'";
	$total = total($board_s);
	$start = 5 * ($page_num - 1);
	$page_nate = page_nate($page_num, $total, "{$get_page}list/&&/", "이전페이지", "다음페이지");
	$board_r = sql("{$board_s} order by idx desc limit $start, 5");
?>
<div class="wh" title="예약 대기 가구 : <?=$total?>개">예약 대기 가구 : <?=$total?>개</div>
<div class="form">
	<table width="100%">
    	<colgroup>
        	<col width="10%" />
        	<col width="60%" />
        	<col width="15%" />
        	<col width="15%" />
        </colgroup>
    	<tr class="al_c bg2">
        	<th>글번호</th>
        	<th>제목</th>
        	<th>작성자</th>
        	<th>작성일</th>
        </tr>
        <?
		while($board = mysql_fetch_assoc($board_r)){
		?>
        <tr class="al_c">
        	<td><?=$board['idx']?></td>
        	<td class="al_l"><a title="<?=$board['subject']?>" href="<?="{$get_page}view/{$board['idx']}/"?>"><?=$board['subject']?></a></td>
        	<td><?=$board['id']?></td>
        	<td><?=$board['date']?></td>
        </tr>
        <?
		}
		?>
    </table>
    <? if($total != 0) echo $page_nate; ?>
    <div class="al_r">
    	<input type="button" class="btn" title="글작성" value="글작성" onclick="link('<?=$get_page?>add/'); return false;" />
    </div>
</div>