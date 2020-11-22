<?
	//권한검사
	access($_SESSION['lv'] != 2, "관리자는 이용할 수 없습니다.");
?>
<div id="reserved">
<div class="wh mb15">
	<input type="button" class="btn3" title="현황조회페이지" value="현황조회페이지" onclick="link('<?="{$get_page}now/"?>'); return false;" />
</div>
	<?
        $fur_s = "select * from furniture where now=1";
        $total = total($fur_s);
        $start = 12 * ($page_num - 1);
        $page_nate = page_nate($page_num, $total, "{$get_page}list/&&/", "이전페이지", "다음페이지", 12);
        $fur_r = sql("{$fur_s} order by type asc, fname asc limit $start, 12");
    ?>
    <div class="wh" title="총 게시물 : <?=$total?>개">총 게시물 : <?=$total?>개</div>
    <div class="form">
        <div class="furniture">
            <?
            while($fur = $fur_r->fetch()){
            ?>
            <ul>
                <li class="li1"><img src="/data/furniture/thum_<?=$fur['file_name']?>" title="<?=$fur['fname']?>" alt="<?=$fur['fname']?>" /></li>
                <li><b>[<?=$fur['type']?>]</b><?=$fur['fname']?></li>
                <li><a title="가구상세보기" href="<?="{$get_page}view/{$fur['idx']}/"?>">가구상세보기</a></li>
            </ul>
            <?
            }
            ?>
        </div>
        <? if($total != 0) echo $page_nate; ?>
    </div>
</div>