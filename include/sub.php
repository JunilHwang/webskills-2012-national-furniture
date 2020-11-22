<div id="sub_wrap">

<!-- sub menu -->
<div class="snb">
<script type="text/javascript">
AC_FL_RunContent(
    'codebase', 'http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,0,0',
    'width', '200',
    'height', '350',
    'src', '/common/swf/snb',
    'quality', 'high',
    'pluginspage', 'http://www.macromedia.com/go/getflashplayer',
    'align', 'middle',
    'play', 'true',
    'loop', 'true',
    'scale', 'showall',
    'wmode', 'transparent',
    'devicefont', 'false',
    'bgcolor', '#ffffff',
    'name', 'snb',
    'menu', 'true',
    'allowFullScreen', 'false',
    'allowScriptAccess','sameDomain',
    'movie', '/common/swf/snb',
    'salign', '',
    'flashvars', '<?="midx={$main_od}&amp;sidx={$sub_od}&amp;xmlBase={$xml_base}"?>'
    )
</script>
	<div class="quick">
		<a href="/index.php/page/3/11/"><img src="/img/booking.png" title="Furniture Booking | 바로가기" alt="Furniture Booking | 바로가기" class="borb" /></a>
        <img src="/img/search.png" alt="Furniture Search" title="Furniture Search" />
        <form action="<?="http://127.0.0.1/index.php/page/2/8/"?>" method="post">
     	<div class="sub_s">
        	<input type="hidden" name="type" value="total" />
        	<input type="text" size="15" style="height:14px; padding:1px;" title="검색어" name="key" />
            <input type="submit" class="btn2" title="검색" value="검색" value="<?=$_POST['key']?>" />
        </div>
        </form>
        <img src="/img/search2.png" alt="사이트에 등록된 가구들을 검색합니다." title="사이트에 등록된 가구들을 검색합니다." class="img2" />
	</div>
</div>
<!-- //sub menu -->

<!-- animation -->
<div id="ani">
<script type="text/javascript">
AC_FL_RunContent(
	'codebase', 'http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,0,0',
	'width', '800',
	'height', '150',
	'src', '/common/swf/sub',
	'quality', 'high',
	'pluginspage', 'http://www.macromedia.com/go/getflashplayer',
	'align', 'middle',
	'play', 'true',
	'loop', 'true',
	'scale', 'showall',
	'wmode', 'transparent',
	'devicefont', 'false',
	'bgcolor', '#ffffff',
	'name', 'sub',
	'menu', 'true',
	'allowFullScreen', 'false',
	'allowScriptAccess','sameDomain',
	'movie', '/common/swf/sub',
	'salign', ''
	)
</script>
</div>
<!-- //animation -->

<div class="page_title">
	<a href="/" title="홈">홈</a> &gt;
	<a href="<?="/index.php/{$page_type}/{$midx}/{$page['idx']}/"?>" title="<?=$main_title?>"><?=$main_title?></a> &gt;
	<a href="<?=$get_page?>" title="<?=$sub_title?>" class="bold mint"><?=$sub_title?></a>
</div>
<div class="content_top">
	<span class="sub_title" title="<?=$sub_title?>"><?=$sub_title?></span>
    <div class="btn_g">
    	<img src="/img/print.png" alt="print" title="print" onclick="window.print(); return false;" />
    	<img src="/img/plus.png" alt="+" title="+" onclick="zoom(20); return false;" />
    	<img src="/img/reset.png" alt="*" title="*" onclick="zoom(0); return false;" />
    	<img src="/img/minus.png" alt="-" title="-" onclick="zoom(-20); return false;" />
    </div>
</div>

<div id="content">
<?
	echo $sub['content'];
	if($sub['type'] != 'HTML') include_once("{$_SERVER['DOCUMENT_ROOT']}/{$page_type}/{$direct}/{$include_file}.php");
	if($page_type == 'admin'){
		access($_SESSION['lv'] == 3, "사이트 관리자만 이용할 수 있습니다.");
	}
?>
</div>
<div id="top_btn">
	<img src="/img/top_btn.png" title="위로" alt="위로" onclick="link('#'); return false;" />
    <? if($page_type == 'admin'){ ?>
  	<img src="/img/logout2.png" title="로그아웃" alt="로그아웃" onclick="link('/page/logout.php'); return false;" />
    <? } ?>
</div>
<div class="content_bottom"></div>
</div>
<div class="quick">
    
</div>