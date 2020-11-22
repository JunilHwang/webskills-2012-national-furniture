<?

//인클루드
include_once("{$_SERVER['DOCUMENT_ROOT']}/include/dbcon.php");

echo "<?xml version=\"1.0\" encoding=\"euc-kr\"?>";
echo "<menu>";
	$dep1_r = sql("select * from default_menu where parent='0'");
	while($dep1 = mysql_fetch_assoc($dep1_r)){
		$add = $_SESSION['lv'] ? "and lv=1 or idx='sitemap'" : "and idx='sitemap'";
		$dep2_s = "select * from default_menu where parent='{$dep1['idx']}'";
		echo "<m title='{$dep1['title']}'>";
		$dep2_r = sql($dep2_s);
		while($dep2 = mysql_fetch_assoc($dep2_r)){
			echo "<s title='{$dep2['title']}' link='/index.php/page/{$dep2['parent']}/{$dep2['idx']}' />";
		}
		echo "</m>";
	}
echo "</menu>";
?>