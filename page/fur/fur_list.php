<?
	//���Ѱ˻�
	access($_SESSION['lv'] != 2, "�����ڴ� �̿��� �� �����ϴ�.");
?>
<div id="reserved">
<div class="wh mb15">
	<input type="button" class="btn3" title="��Ȳ��ȸ������" value="��Ȳ��ȸ������" onclick="link('<?="{$get_page}now/"?>'); return false;" />
</div>
	<?
        $fur_s = "select * from furniture where now=1";
        $total = total($fur_s);
        $start = 12 * ($page_num - 1);
        $page_nate = page_nate($page_num, $total, "{$get_page}list/&&/", "����������", "����������", 12);
        $fur_r = sql("{$fur_s} order by binary(type) asc, binary(fname) asc limit $start, 12");
    ?>
    <div class="wh" title="�� �Խù� : <?=$total?>��">�� �Խù� : <?=$total?>��</div>
    <div class="form">
        <div class="furniture">
            <?
            while($fur = mysql_fetch_assoc($fur_r)){
            ?>
            <ul>
                <li class="li1"><img src="/data/furniture/thum_<?=$fur['file_name']?>" title="<?=$fur['fname']?>" alt="<?=$fur['fname']?>" /></li>
                <li><b>[<?=$fur['type']?>]</b><?=$fur['fname']?></li>
                <li><a title="�����󼼺���" href="<?="{$get_page}view/{$fur['idx']}/"?>">�����󼼺���</a></li>
            </ul>
            <?
            }
            ?>
        </div>
        <? if($total != 0) echo $page_nate; ?>
    </div>
</div>