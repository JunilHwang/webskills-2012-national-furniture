<?
	//�Խù� ����
	sql("delete from menu where idx='{$idx}' or parent='{$idx}'");
	sql("delete from board where sidx='{$idx}'");
	alert("�޴��� �����Ǿ����ϴ�.");
	move($get_page);
?>