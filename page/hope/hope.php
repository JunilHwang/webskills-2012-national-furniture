<?
	//인클루드
	include_once("{$_SERVER['DOCUMENT_ROOT']}/include/furniture_ok.php");
	$board = fetch("select * from board where idx='{$idx}'");
	access($_SESSION['lv'] == 1, "회원만 이용할 수 있습니다.");
?>
<div class="wh al_l h4" title="가구를 신청합니다.">가구를 신청합니다.</div>
<div class="form">
<form action="" method="post" onsubmit="return frmChk(this, 'type', 'fname', 'num', 'content', 'file');" enctype="multipart/form-data">
<div><input type="hidden" name="action" value="hope" /></div>
	<div class="table">
    	<div class="tr">
        	<span class="left"><?=$chk?><label for="type" title="가구분류">가구분류</label></span>
            <span>
            	<select title="메뉴타입" id="type" name="type">
                	<option value="">선택</option>
                    <?
					foreach($furniture_arr as $key=>$val){
					?>
                    <option value="<?=$val?>"><?=$val?></option>
                    <?
					}
					?>
                </select>
            </span>
        </div>
    	<div class="tr">
        	<span class="left"><?=$chk?><label for="fname" title="가구명">가구명</label></span>
            <span><input type="text" title="가구명" id="fname" name="fname" size="20" /></span>
        </div>
    	<div class="tr">
        	<span class="left"><?=$chk?><label for="num" title="수량">수량</label></span>
            <span><input type="text" title="수량" id="num" name="num" size="5" /></span>
        </div>
        <div class="tr">
        	<span class="left cont_left"><?=$chk?><label for="cont" title="내용">내용</label></span>
            <span class="cont_right"><textarea title="내용" id="cont" name="content" cols="5" rows="9"><?=$board['content']?></textarea></span>
        </div>
        <div class="tr">
        	<span class="left"><?=$chk?><label for="file" title="가구이미지">가구이미지</label></span>
            <span class="right"><input type="file" title="가구이미지" id="file" name="file" /></span>
        </div>
    </div>

    <div class="wh al_c">
        <input type="submit" class="btn" title="작성완료" value="작성완료" />
        <input type="button" class="btn" title="목록으로" value="목록으로" onclick="link('<?=$get_page?>'); return false;" />
    </div>
</form>
</div>