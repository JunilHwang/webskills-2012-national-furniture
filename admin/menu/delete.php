<?
	//게시물 삭제
	sql("delete from menu where idx='{$idx}' or parent='{$idx}'");
	sql("delete from board where sidx='{$idx}'");
	alert("메뉴가 삭제되었습니다.");
	move($get_page);
?>