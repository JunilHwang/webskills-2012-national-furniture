<?
	sql("delete from member where idx='{$idx}'");
	alert("삭제되었습니다.");
	move($get_page);
?>