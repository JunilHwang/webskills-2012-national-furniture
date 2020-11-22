<!-- animation -->
<div id="ani">
<script type="text/javascript">
AC_FL_RunContent(
	'codebase', 'http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,0,0',
	'width', '1000',
	'height', '350',
	'src', '/common/swf/index',
	'quality', 'high',
	'pluginspage', 'http://www.macromedia.com/go/getflashplayer',
	'align', 'middle',
	'play', 'true',
	'loop', 'true',
	'scale', 'showall',
	'wmode', 'transparent',
	'devicefont', 'false',
	'bgcolor', '#ffffff',
	'name', 'gnb',
	'menu', 'true',
	'allowFullScreen', 'false',
	'allowScriptAccess','sameDomain',
	'movie', '/common/swf/index',
	'salign', ''
	)
</script>
</div>
<!-- //animation -->

<!-- content -->
<div id="content">
	<div class="board">
    	<div class="title"><img src="/img/title1.png" title="게시판 | bold" alt="게시판 | bold" /><a href="/index.php/page/5/15/"><img src="/img/more1.png" title="more" alt="more" /></a>        </div>
		<?
        	$board_r = sql("select * from board where sidx='15' order by idx desc limit 4");
			while($board = mysql_fetch_assoc($board_r)){
				$subject = cut($board['subject'], 0, 28);
		?>
        <ul>
            <li class="li1"><a title="<?=$board['subject']?>" href="<?="/index.php/page/5/15/view/{$board['idx']}/"?>"><?=$subject?></a></li>
            <li class="li2">[<?=$board['date']?>]</li>
        </ul>
        <? } ?>
    </div>
    
	<div class="list">
    	<div class="title">
        <img src="/img/title2.png" title="가구목록 | Furniture List" alt="가구목록 | Furniture List" />
        <a href="/index.php/page/5/15/"><img src="/img/more1.png" title="more" alt="more" /></a>
        </div>
		<?
        	$fur_r = sql("select * from furniture where now=1 order by binary(fname) asc limit 4");
			while($fur = mysql_fetch_assoc($fur_r)){
				$fname = cut($fur['fname'], 0, 10);
		?>
        <ul>
            <li class="li1"><img src="/data/furniture/thum_<?=$fur['file_name']?>" alt="<?=$fur['fname']?>" width="90px" height="60px" title="<?=$fur['fname']?>" /></li>
            <li class="li2"><?=$fname?></li>
            <li class="li3">[<a title="가구상세보기" href="<?="/index.php/page/3/11/view/{$fur['idx']}/"?>">가구상세보기</a>]</li>
        </ul>
        <? } ?>
    </div>
    
    <div class="call"><img src="/img/call.png" title="고객센터" alt="고객센터" /></div>

    <div class="booking">
    	<a href="/index.php/page/3/11/"><img src="/img/booking.png" title="Furniture Booking | 바로가기" alt="Furniture Booking | 바로가기" /></a>
        <img src="/img/booking_img.png" title="대여예약" alt="대여예약" class="img2" />
    </div>
    
    <div class="banner">
	<script type="text/javascript">
    AC_FL_RunContent(
        'codebase', 'http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,0,0',
        'width', '468',
        'height', '60',
        'src', '/common/swf/banner',
        'quality', 'high',
        'pluginspage', 'http://www.macromedia.com/go/getflashplayer',
        'align', 'middle',
        'play', 'true',
        'loop', 'true',
        'scale', 'showall',
        'wmode', 'transparent',
        'devicefont', 'false',
        'bgcolor', '#ffffff',
        'name', 'banner',
        'menu', 'true',
        'allowFullScreen', 'false',
        'allowScriptAccess','sameDomain',
        'movie', '/common/swf/banner',
        'salign', ''
        )
    </script>
    </div>
    
    <div class="search">
	    <div class="title"><img src="/img/search.png" alt="Furniture Search" title="Furniture Search" /></div>
        <form action="<?="http://127.0.0.1/index.php/page/2/8/"?>" method="post">
     	<div class="main_s">
        	<input type="hidden" name="type" value="total" />
        	<input type="text" size="15" style="height:14px; padding:1px;" title="검색어" name="key" />
            <input type="submit" class="btn2" title="검색" value="검색" />
        </div>
        </form>
        <img src="/img/search2.png" alt="사이트에 등록된 가구들을 검색합니다." title="사이트에 등록된 가구들을 검색합니다." class="img2" />
    </div>
</div>
<!-- //content -->