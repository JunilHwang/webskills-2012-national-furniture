<?
	//세션파괴
	session_start();
	session_destroy();
	
	//페이지 이동
	include_once("{$_SERVER['DOCUMENT_ROOT']}/include/lib.php");
	move("/");
?>