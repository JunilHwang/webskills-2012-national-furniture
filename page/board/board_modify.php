<?
	//��Ŭ���
	include_once("{$_SERVER['DOCUMENT_ROOT']}/include/board_ok.php");
	$board = fetch("select * from board where idx='{$idx}'");
?>
<div class="wh al_l"><?=$chk?>ǥ�� �׸��� �ʼ� �Է� �����Դϴ�.</div>
<div class="form">
<form action="" method="post" onsubmit="return frmChk(this, 'id', 'subject', 'content');">
<div><input type="hidden" name="action" value="update" /></div>
	<div class="table">
    	<div class="tr">
        	<span class="left"><?=$chk?><label for="id" title="�ۼ���">�ۼ���</label></span>
            <span><input type="text" title="�ۼ���" id="id" name="id" size="10" value="<?=$board['id']?>" /></span>
        </div>
    	<div class="tr">
        	<span class="left"><?=$chk?><label for="subject" title="����">����</label></span>
            <span><input type="text" title="����" id="subject" name="subject" size="50" value="<?=$board['subject']?>" /></span>
        </div>
        <div class="tr">
        	<span class="left cont_left"><?=$chk?><label for="cont" title="����">����</label></span>
            <span class="cont_right"><textarea title="����" id="cont" name="content" cols="5" rows="9"><?=$board['content']?></textarea></span>
        </div>
    </div>

    <div class="wh al_c">
        <input type="submit" class="btn" title="�����Ϸ�" value="�����Ϸ�" />
        <input type="button" class="btn" title="�������" value="�������" onclick="link('<?=$get_page?>'); return false;" />
    </div>
</form>
</div>