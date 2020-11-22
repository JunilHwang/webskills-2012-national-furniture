<script type="text/javascript">
	function fcnt(type, num){
		var re = document.getElementById('re');
		if(type == 'up'){
			re.value = parseInt(re.value) + 1;
			if(parseInt(re.value) >= num){
				alert('한도량이 초과했습니다.');
				re.value = num;
			}
		} else {
			re.value = parseInt(re.value) - 1;
			if(re.value <= 1){
				alert('최소 한 개 이상 신청해야 합니다.');
				re.value = 1;
			}
		}
	}
</script>
<?
	//인클루드
	include_once("{$_SERVER['DOCUMENT_ROOT']}/include/reser_ok.php");
	if($_SESSION['lv']) $member = fetch("select * from member where email='{$_SESSION['email']}'");
	$fur = fetch("select * from furniture where idx='{$idx}'");
?>
<div class="wh al_l h4" title="가구를 대여약합니다.">가구를 대여약합니다.</div>
<div class="form">
<form action="" method="post" onSubmit="return frmChk(this, 're');">
<div>
	<input type="hidden" name="action" value="insert" />
	<input type="hidden" name="fidx" value="<?=$fur['idx']?>" />
	<input type="hidden" name="fname" value="<?=$fur['fname']?>" />
	<input type="hidden" name="name" value="<?=$member['name']?>" />
	<input type="hidden" name="email" value="<?=$member['email']?>" />
</div>
	<div class="table">
    	<? if($_SESSION['lv']){ ?>
    	<? $member = arr_hex($member); ?>
    	<div class="tr">
        	<span class="left"><?=$chk?>이름</span>
            <span class="right"><?=$member['name']?></span>
        </div>
        <div class="tr">
        	<span class="left"><?=$chk?>이메일 주소</span>
            <span class="right"><?=$member['email']?></span>
        </div>
        <div class="tr">
        	<span class="left"><?=$chk?>전화번호</span>
            <span class="right"><?=$member['phone']?></span>
        </div>
        <div class="tr">
        	<span class="left">휴대폰 번호</span>
            <span class="right"><?=$member['cell']?></span>
        </div>
        <? } ?>
    	<div class="tr">
        	<span class="left"><label for="re" title="대여수량">대여수량</label></span>
            <span>
            	<input type="button" class="btn4" title="+" value="+" onclick="fcnt('up', <?=$fur['num']?>); return false;" />
            	<input type="text" title="대여수량" id="re" name="re" size="3" value="1" readonly="readonly" style="height:14px;" />
                <input type="button" class="btn4" title="-" value="-" onclick="fcnt('down', <?=$fur['num']?>);" />
            </span>
        </div>
    	<div class="tr">
        	<span class="left"><label for="date" title="신청일자">신청일자</label></span>
            <span>
            	<select name="date[]" id="date" title="년도">
                	<option value="">년도</option>
                    <? for($i=2012; $i<=2015; $i++){ ?>
                    <option value="<?=$i?>"><?=$i?></option>
                    <? } ?>
                </select> -
            	<select name="date[]" title="월">
                	<option value="">월</option>
                    <? for($i=1; $i<=12; $i++){ ?>
                    <option value="<?=$i?>"><?=$i?></option>
                    <? } ?>
                </select> -
            	<select name="date[]" title="일">
                	<option value="">일</option>
                    <? for($i=1; $i<=31; $i++){ ?>
                    <option value="<?=$i?>"><?=$i?></option>
                    <? } ?>
                </select>
            </span>
        </div>
    </div>

    <div class="wh al_c">
        <input type="submit" class="btn" title="작성완료" value="작성완료" />
        <input type="button" class="btn" title="목록으로" value="목록으로" onClick="link('<?=$get_page?>'); return false;" />
    </div>
</form>
</div>