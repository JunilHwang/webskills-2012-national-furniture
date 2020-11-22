<?
//인클루드
include_once("{$_SERVER['DOCUMENT_ROOT']}/include/dbcon.php");

echo "<?xml version=\"1.0\" encoding=\"euc-kr\"?>";
echo "<menu>";
	$dep1_r = sql("select * from menu where parent='0'");
	while($dep1 = $dep1_r->fetch()){
		$dep2_s = "select * from menu where parent='{$dep1['idx']}'";
		$link = fetch($dep2_s);
		echo "<m title='{$dep1['title']}' link='/index.php/page/{$dep1['idx']}/{$link['idx']}/'>";
		$dep2_r = sql($dep2_s);
		while($dep2 = $dep2_r->fetch()){
			echo "<s title='{$dep2['title']}' link='/index.php/page/{$dep2['parent']}/{$dep2['idx']}/' />";
		}
		echo "</m>";
	}
echo "</menu>";
?>