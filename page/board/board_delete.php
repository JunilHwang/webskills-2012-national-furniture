<?
	//게시물 삭제
	sql("delete from board where idx='{$idx}'");
	alert("게시물이 삭제되었습니다.");
	move($get_page);
?>