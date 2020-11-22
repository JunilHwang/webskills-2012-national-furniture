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
	$re = fetch("select * from reser where idx='{$idx}'");
	$fur = fetch("select * from furniture where idx='{$re['fidx']}'");
?>
<div class="wh al_l h4" title="예약정보를 수정합니다.">예약정보를 수정합니다.</div>
<div class="form">
<form action="" method="post" onSubmit="return frmChk(this, 're');">
<div>
	<input type="hidden" name="action" value="modify" />
</div>
	<div class="table">
    	<div class="tr">
        	<span class="left"><label for="re" title="대여수량">대여수량</label></span>
            <span>
            	<input type="button" class="btn4" title="+" value="+" onclick="fcnt('up', <?=$fur['num']?>); return false;" />
            	<input type="text" title="대여수량" id="re" name="re" size="3" value="1" readonly="readonly" style="height:14px;" />
                <input type="button" class="btn4" title="-" value="-" onclick="fcnt('down', <?=$fur['num']?>);" />
            </span>
        </div>
    	<div class="tr">
        	<span class="left"><label for="date" title="대여날짜">신청일자</label></span>
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
        <input type="button" class="btn" title="목록으로" value="목록으로" onClick="link('<?="{$get_page}now/"?>'); return false;" />
    </div>
</form>
</div>