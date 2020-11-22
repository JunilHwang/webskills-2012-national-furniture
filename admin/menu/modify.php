<?
	//인클루드
	include_once("{$_SERVER['DOCUMENT_ROOT']}/include/menu_ok.php");
	$menu = fetch("select * from menu where idx='{$idx}'");
	$sel[$menu['type']] = 'selected="selected"';
?>
<div class="wh al_l h4" title="메뉴를 추가합니다.">메뉴를 추가합니다.</div>
<div class="form">
<form action="" method="post" onsubmit="return frmChk(this, 'title');">
<div><input type="hidden" name="action" value="update" /></div>
	<div class="table">
    	<div class="tr">
        	<span class="left"><?=$chk?><label for="title" title="메뉴 타이틀">메뉴 타이틀</label></span>
            <span><input type="text" title="메뉴 타이틀" id="title" name="title" size="50" value="<?=$menu['title']?>" /></span>
        </div>
        <? if($menu['parent'] != 0){ ?>
        <div class="tr">
        	<span class="left"><?=$chk?><label for="type" title="내용">메뉴타입</label></span>
            <span>
            	<select title="메뉴타입" id="type" name="type">
                	<option value="HTML" <?=$sel['HTML']?>>HTML</option>
                	<option value="board" <?=$sel['board']?>>board</option>
                	<option value="gallery" <?=$sel['gallery']?>>gallery</option>
                	<option value="search" <?=$sel['search']?>>search</option>
                </select>
            </span>
        </div>
        <div class="tr">
        	<span class="left cont_left"><?=$chk?><label for="cont" title="본문">본문</label></span>
            <span class="cont_right"><textarea title="본문" id="cont" name="content" cols="5" rows="9"><?=$board['content']?></textarea></span>
        </div>
        <? } ?>
    </div>

    <div class="wh al_c">
        <input type="submit" class="btn" title="작성완료" value="작성완료" />
        <input type="button" class="btn" title="목록으로" value="목록으로" onclick="link('<?=$get_page?>'); return false;" />
    </div>
</form>
</div>