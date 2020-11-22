<?
	//인클루드
	include_once("{$_SERVER['DOCUMENT_ROOT']}/include/furniture_ok.php");
	$fur_s = "select * from furniture where now=0";
	$total = total($fur_s);
	$fur_r = sql("{$fur_s} order by binary(type) asc, binary(name) asc");
	access($_SESSION['lv']==2, "관리자만 이용할 수 있습니다.")
?>
<div class="wh" title="총 게시물 : <?=$total?>개">총 게시물 : <?=$total?>개</div>
<div class="form">
<form action="" method="post" id="frm">
	<div>
    	<input type="hidden" name="action" value="hope_add" />
        <input type="hidden" name="idx" value="" />
    </div>
</form>
	<table width="100%">
    	<colgroup>
        	<col width="10%" />
        	<col width="15%" />
        	<col width="30%" />
        	<col width="10%" />
        	<col width="10%" />
        </colgroup>
    	<tr class="al_c bg2">
        	<th>분류</th>
            <th>신청자</th>
        	<th>가구명</th>
        	<th>수량</th>
            <th>등록</th>
        </tr>
        <?
		while($fur = $fur_r->fetch()){
		?>
        <tr class="al_c">
        	<td><?=$fur['type']?></td>
            <td><a href="/page/member_view.php?idx=<?=$fur['idx']?>" title="<?=$fur['name']?>" onclick="window.open(this.href, 'member', 'width=680px, height=400px, top=200px, left=200px'); return false;"><?=$fur['name']?></a></td>
        	<td><?=$fur['fname']?></td>
        	<td><?=$fur['num']?></td>
            <td><a href="#" title="등록" onclick="frmSubmit('frm', '<?=$fur['idx']?>', 'pass'); return false;">등록</a></td>
        </tr>
        <?
		}
		?>
    </table>
</div>