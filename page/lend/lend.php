<?
	//인클루드
	include_once("{$_SERVER['DOCUMENT_ROOT']}/include/reser_ok.php");
	$fur_s = "select * from reser";
	access($_SESSION['lv'] == 2, "관리자만 이용할수 있습니다.");
?>
<div class="wh h4" title="대여예약중인 가구목록입니다.">대여예약중인 가구목록입니다.</div>
<div class="form">
<form action="" method="post" id="frm">
	<div>
		<input type="hidden" name="action" value="lend" />
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
        	<th>신청자(예약번호)</th>
			<th>가구명</th>
			<th>대여수량</th>
            <th>신청일</th>       
			<th>대여허가</th>
		</tr>
		<?
		$fur_r = sql("{$fur_s} where now=1");
		while($fur = $fur_r->fetch()){
			$rname = $fur['name'];
			if($fur['number']) $rname = $fur['number'];
			$fur['date'] = explode("-", $fur['date']);
			$fur['date'] = implode("", $fur['date']);
		?>
		<tr class="al_c">
			<td><?=$rname?></td>
			<td><?=$fur['fname']?></td>
			<td><?=$fur['re']?>개</td>
			<td><?=$fur['date']?></td>
			<td><a href="#" title="허가" onclick="frmSubmit('frm', '<?=$fur['idx']?>', 'pass'); return false;">허가</a></td>
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
		<input type="hidden" name="action" value="clear" />
		<input type="hidden" name="idx" value="" />
	</div>
</form>
	<table width="100%">
		<colgroup>
			<col width="18%" />
			<col width="18%" />
			<col width="18%" />
			<col width="18%" />
			<col width="18%" />
			<col width="10%" />
		</colgroup>
		<tr class="al_c bg2">
        	<th>대여자(예약번호)</th>
			<th>가구명</th>
			<th>대여수량</th>
            <th>상태</th>
			<th>반납허가</th>
			<th>zip</th>
		</tr>
		<?
		$fur_r = sql("{$fur_s} where now=2 or now=3");
		while($fur = $fur_r->fetch()){
			$rname = $fur['name'];
			if($fur['number']) $rname = $fur['number'];
			$return = "대여중";
			$now = "-";
			if($fur['now'] == 3){
				$return = "반납대기중";
				$now = "<a href='#' onclick=\"frmSubmit('frm2', '{$fur['idx']}', 'pass'); return false;\" title='허가'>허가</a>";
			}
		?>
		<tr class="al_c">
			<td><?=$rname?></td>
			<td><?=$fur['fname']?></td>
			<td><?=$fur['re']?>개</td>
			<td><?=$return?></td>
			<td><?=$now?></td>
            <td><a href="/data/zip/<?=$fur['zip']?>" title="zip">zip</a></td>
		</tr>
		<?
		}
		?>
	</table>
</div>