<?
	//��Ŭ���
	include_once("{$_SERVER['DOCUMENT_ROOT']}/include/furniture_ok.php");
	$board = fetch("select * from board where idx='{$idx}'");
	access($_SESSION['lv'] == 1, "ȸ���� �̿��� �� �ֽ��ϴ�.");
?>
<div class="wh al_l h4" title="������ ��û�մϴ�.">������ ��û�մϴ�.</div>
<div class="form">
<form action="" method="post" onsubmit="return frmChk(this, 'type', 'fname', 'num', 'content', 'file');" enctype="multipart/form-data">
<div><input type="hidden" name="action" value="hope" /></div>
	<div class="table">
    	<div class="tr">
        	<span class="left"><?=$chk?><label for="type" title="�����з�">�����з�</label></span>
            <span>
            	<select title="�޴�Ÿ��" id="type" name="type">
                	<option value="">����</option>
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
        	<span class="left"><?=$chk?><label for="fname" title="������">������</label></span>
            <span><input type="text" title="������" id="fname" name="fname" size="20" /></span>
        </div>
    	<div class="tr">
        	<span class="left"><?=$chk?><label for="num" title="����">����</label></span>
            <span><input type="text" title="����" id="num" name="num" size="5" /></span>
        </div>
        <div class="tr">
        	<span class="left cont_left"><?=$chk?><label for="cont" title="����">����</label></span>
            <span class="cont_right"><textarea title="����" id="cont" name="content" cols="5" rows="9"><?=$board['content']?></textarea></span>
        </div>
        <div class="tr">
        	<span class="left"><?=$chk?><label for="file" title="�����̹���">�����̹���</label></span>
            <span class="right"><input type="file" title="�����̹���" id="file" name="file" /></span>
        </div>
    </div>

    <div class="wh al_c">
        <input type="submit" class="btn" title="�ۼ��Ϸ�" value="�ۼ��Ϸ�" />
        <input type="button" class="btn" title="�������" value="�������" onclick="link('<?=$get_page?>'); return false;" />
    </div>
</form>
</div>