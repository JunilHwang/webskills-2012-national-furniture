<?
	//인클루드
	include_once("{$_SERVER['DOCUMENT_ROOT']}/include/board_ok.php");
	$board = fetch("select * from board where idx='{$idx}'");
?>
<div class="wh al_l h4" title="게시글을 조회합니다.">게시글을 조회합니다.</div>
<div class="form">
	<div class="table">
    	<div class="tr">
        	<span class="left"><?=$chk?>작성자</span>
            <span class="right"><?=$board['id']?></span>
        </div>
    	<div class="tr">
        	<span class="left"><?=$chk?>제목</span>
            <span class="right"><?=$board['subject']?></span>
        </div>
        <div class="tr">
            <span class="text"><?=nl2br($board['content'])?></span>
        </div>
    	<div class="tr">
        	<?
				$b = fetch("select * from board where idx>$idx limit 1");
				$next = "다음글이 존재하지 않습니다.";
				if($b['idx']) $next = "<a href='{$get_page}view/{$b['idx']}/' title='{$b['subject']}'>{$b['subject']}</a>";
				
				$b = fetch("select * from board where idx<$idx order by idx desc limit 1");
				$prev = "이전글이 존재하지 않습니다.";
				if($b['idx']) $prev = "<a href='{$get_page}view/{$b['idx']}/' title='{$b['subject']}'>{$b['subject']}</a>";
			?>
        	<span class="left">다음글</span>
            <span class="right"><?=$next?></span>
        </div>
    	<div class="tr">
        	<span class="left">이전글</span>
            <span class="right"><?=$prev?></span>
        </div>
    </div>
	<div class="wh al_c">
        <input type="button" class="btn" title="수정하기" value="수정하기" onclick="link('<?="{$get_page}modify/{$idx}/"?>'); return false;" />
        <input type="button" class="btn" title="삭제하기" value="삭제하기" onclick="if(confirm('정말로 삭제하시겠습니까?')) link('<?="{$get_page}delete/{$idx}/"?>'); return false;" />
        <input type="button" class="btn" title="목록으로" value="목록으로" onclick="link('<?=$get_page?>'); return false;" />
    </div>
</div>