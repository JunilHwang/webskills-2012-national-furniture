<div class="sitemap">
<?
		$dep1_r = sql("select * from menu where parent='0'");
		while($dep1 = $dep1_r->fetch()){
			$dep2_s = "select * from menu where parent='{$dep1['idx']}'";
			$link = fetch($dep2_s);
			echo "<ul>";
			echo "<li class='li1' title='{$dep1['title']}'><a href='/index.php/page/{$dep1['idx']}/{$link['idx']}'>{$dep1['title']}</a></li>";
			$dep2_r = sql($dep2_s);
			while($dep2 = $dep2_r->fetch()){
				echo "<li title='{$dep2['title']}'><a href='/index.php/page/{$dep2['parent']}/{$dep2['idx']}'>{$dep2['title']}</a></li>";
			}
			echo "</ul>";
		}
?>
</div>