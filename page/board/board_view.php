<?
	//��Ŭ���
	include_once("{$_SERVER['DOCUMENT_ROOT']}/include/board_ok.php");
	$board = fetch("select * from board where idx='{$idx}'");
?>
<div class="wh al_l h4" title="�Խñ��� ��ȸ�մϴ�.">�Խñ��� ��ȸ�մϴ�.</div>
<div class="form">
	<div class="table">
    	<div class="tr">
        	<span class="left"><?=$chk?>�ۼ���</span>
            <span class="right"><?=$board['id']?></span>
        </div>
    	<div class="tr">
        	<span class="left"><?=$chk?>����</span>
            <span class="right"><?=$board['subject']?></span>
        </div>
        <div class="tr">
            <span class="text"><?=nl2br($board['content'])?></span>
        </div>
    	<div class="tr">
        	<?
				$b = fetch("select * from board where idx>$idx limit 1");
				$next = "�������� �������� �ʽ��ϴ�.";
				if($b['idx']) $next = "<a href='{$get_page}view/{$b['idx']}/' title='{$b['subject']}'>{$b['subject']}</a>";
				
				$b = fetch("select * from board where idx<$idx order by idx desc limit 1");
				$prev = "�������� �������� �ʽ��ϴ�.";
				if($b['idx']) $prev = "<a href='{$get_page}view/{$b['idx']}/' title='{$b['subject']}'>{$b['subject']}</a>";
			?>
        	<span class="left">������</span>
            <span class="right"><?=$next?></span>
        </div>
    	<div class="tr">
        	<span class="left">������</span>
            <span class="right"><?=$prev?></span>
        </div>
    </div>
	<div class="wh al_c">
        <input type="button" class="btn" title="�����ϱ�" value="�����ϱ�" onclick="link('<?="{$get_page}modify/{$idx}/"?>'); return false;" />
        <input type="button" class="btn" title="�����ϱ�" value="�����ϱ�" onclick="if(confirm('������ �����Ͻðڽ��ϱ�?')) link('<?="{$get_page}delete/{$idx}/"?>'); return false;" />
        <input type="button" class="btn" title="�������" value="�������" onclick="link('<?=$get_page?>'); return false;" />
    </div>
</div>