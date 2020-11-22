<?
	//인클루드
	include_once("{$_SERVER['DOCUMENT_ROOT']}/include/board_ok.php");
	$board = fetch("select * from board where idx='{$idx}'");
?>
<div class="wh al_l"><?=$chk?>표시 항목은 필수 입력 사항입니다.</div>
<div class="form">
<form action="" method="post" onsubmit="return frmChk(this, 'id', 'subject', 'content');">
<div><input type="hidden" name="action" value="insert" /></div>
	<div class="table">
    	<div class="tr">
        	<span class="left"><?=$chk?><label for="id" title="작성자">작성자</label></span>
            <span><input type="text" title="작성자" id="id" name="id" size="10" value="<?=$board['id']?>" /></span>
        </div>
    	<div class="tr">
        	<span class="left"><?=$chk?><label for="subject" title="제목">제목</label></span>
            <span><input type="text" title="제목" id="subject" name="subject" size="50" value="<?=$board['subject']?>" /></span>
        </div>
        <div class="tr">
        	<span class="left cont_left"><?=$chk?><label for="cont" title="내용">내용</label></span>
            <span class="cont_right"><textarea title="내용" id="cont" name="content" cols="5" rows="9"><?=$board['content']?></textarea></span>
        </div>
    </div>

    <div class="wh al_c">
        <input type="submit" class="btn" title="작성완료" value="작성완료" />
        <input type="button" class="btn" title="목록으로" value="목록으로" onclick="link('<?=$get_page?>'); return false;" />
    </div>
</form>
</div>