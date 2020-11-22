<div class="wh mb15">
	<input type="button" class="btn3" title="대여예약페이지" value="대여예약페이지" onclick="link('<?="{$get_page}"?>'); return false;" />
</div>
<?
	//인클루드
	include_once("{$_SERVER['DOCUMENT_ROOT']}/include/reser_ok.php");
	
	if($_SESSION['email']){
		$fur_s = "select * from reser where email='{$_SESSION['email']}'";
	} else {
		$fur_s = "select * from reser where number='{$_POST['number']}'";
	}
?>
<? if(!$_SESSION['email'] && !$_POST['number']){ ?>
<div class="number_input">
<form action="" method="post" onsubmit="return frmChk(this, 'number');">
	<div class="wh al_c">
    	<label for="number" class="h4" title="주문번호">주문번호</label>
        <input type="text" title="주문번호" id="number" name="number" size="15" />
        <input type="submit" class="btn" title="확인하기" value="확인하기" />
    </div>
</form>
</div>
<? } else {?>
<div class="wh h4" title="대여예약중인 가구목록입니다.">대여예약중인 가구목록입니다.</div>
<div class="form">
<form action="" method="post" id="frm">
	<div>
		<input type="hidden" name="action" value="delete" />
		<input type="hidden" name="idx" value="" />
	</div>
</form>
	<table width="100%">
		<colgroup>
			<col width="20%" />
			<col width="20%" />
			<col width="20%" />
			<col width="20%" />
			<col width="20%" />
		</colgroup>
		<tr class="al_c bg2">
			<th>가구명</th>
			<th>대여수량</th>
            <th>신청일</th>            
			<th>수정</th>
			<th>삭제</th>
		</tr>
		<?
		$fur_r = sql("{$fur_s} and now=1");
		while($fur = $fur_r->fetch()){
			$fur['date'] = explode("-", $fur['date']);
			$fur['date'] = implode("", $fur['date']);
		?>
		<tr class="al_c">
			<td><?=$fur['fname']?></td>
			<td><?=$fur['re']?>개</td>
			<td><?=$fur['date']?></td>
			<td><a href="<?="{$get_page}modify/{$fur['idx']}/"?>" title="수정">수정</a></td>
			<td><a href="#" title="삭제" onclick="frmSubmit('frm', '<?=$fur['idx']?>'); return false;">삭제</a></td>
		</tr>
		<?
		}
		?>
	</table>
</div>

<div class="wh h4" title="대여중인 가구목록입니다.">대여중인 가구목록입니다.</div>
<div class="form">
<form action="" method="post" id="frm2">
	<div>
		<input type="hidden" name="action" value="return" />
		<input type="hidden" name="idx" value="" />
	</div>
</form>
	<table width="100%">
		<colgroup>
			<col width="20%" />
			<col width="20%" />
			<col width="20%" />
			<col width="20%" />
			<col width="20%" />
		</colgroup>
		<tr class="al_c bg2">
			<th>가구명</th>
			<th>대여수량</th>
			<th>신청일</th>
			<th>상태</th>
            <th>반납</th>
		</tr>
		<?
		$fur_r = sql("{$fur_s} and (now=2 or now=3)");
		while($fur = $fur_r->fetch()){
			$now = $fur['now'] == 2 ? "대여중" : "반납대기중";
			$return = "<a href='#' onclick=\"frmSubmit('frm2', '{$fur['idx']}', 'pass'); return false;\" title='반납'>반납</a>";
			if($fur['now'] == 3) $return = "-";
		?>
		<tr class="al_c">
			<td><?=$fur['fname']?></td>
			<td><?=$fur['re']?>개</td>
			<td><?=$fur['date']?></td>
            <td><?=$now?></td>
			<td><?=$return?></td>
		</tr>
		<?
		}
		?>
	</table>
</div>
<? } ?>
