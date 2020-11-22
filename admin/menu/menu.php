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
        	<th>번호</th>
        	<th>타이틀</th>
        	<th>메뉴수정</th>
        	<th>메뉴삭제</th>
        	<th>서브추가</th>
        	<th>서브보기</th>
        </tr>
        <?
		$dep1_r = sql("select * from menu where parent='0'");
		while($dep1 = $dep1_r->fetch()){
			$dep2_s = "select * from menu where parent='{$dep1['idx']}'";
			$link = fetch($dep2_s);
			$cnt = total($dep2_s);
		?>
        <tr class="al_c">
        	<td><?=$dep1['idx']?></td>
        	<td><a href="/index.php/page/<?=$dep1['idx']?>/<?=$link['idx']?>/" title="<?=$dep1['title']?>" onclick="window.open(this.href); return false;"><?=$dep1['title']?></a></td>
        	<td><a href="<?="{$get_page}modify/{$dep1['idx']}/"?>" title="수정">수정</a></td>
        	<td><a href="<?="{$get_page}delete/{$dep1['idx']}/"?>" title="수정">삭제</a></td>
        	<td><a href="<?="{$get_page}add/{$dep1['idx']}/"?>" title="수정">추가</a></td>
        	<td><a id="dep1<?=$dep1['idx']?>" href="#" title="보기" onclick="dep2view(<?=$dep1['idx']?>, <?=$cnt?>); return false;">보기</a></td>
        </tr>
        <?
			$i=1;
			$dep2_r = sql($dep2_s);
			while($dep2 = $dep2_r->fetch()){
		?>
        <tr class="al_c bg" id="dep2<?=$dep1['idx']?>_<?=$i?>" style="display:none;">
        	<td><?=$dep2['idx']?></td>
        	<td><a href="/index.php/page/<?=$dep2['parent']?>/<?=$dep2['idx']?>/" title="<?=$dep2['title']?>" onclick="window.open(this.href); return false;"><?=$dep2['title']?></a></td>
        	<td><a href="<?="{$get_page}modify/{$dep2['idx']}/"?>" title="수정">수정</a></td>
        	<td><a href="<?="{$get_page}delete/{$dep2['idx']}/"?>" title="수정">삭제</a></td>
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
    	<input type="button" class="btn" title="메인메뉴추가" value="메인메뉴추가" onclick="link('<?=$get_page?>add/'); return false;" />
    </div>
</div>