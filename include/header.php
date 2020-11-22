<?
	//DB���� or �Լ� include
	include_once("{$_SERVER['DOCUMENT_ROOT']}/include/lib.php");
	
	//����Ʈ ���� ��������
	$site = fetch("select * from site");
	
	//������ ���� ��������
	if($current == 'main'){
		$site_title = $site['title'];
		$meta_keywords = "��������, ��ɰ���ȸ, ��ɰ���ȸ �Ի���, �����뿩";
		$meta_description = "�������� Ȩ�������� ���Ű� ȯ���մϴ�.";
		$css = "index";
	} else {
		//���̺� ����
		if($page_type == 'admin'){
			$menu_table = "admin_menu";
			$xml_base = "admin_";
		} else if(!ctype_digit($midx)){
			$menu_table = "default_menu";
			$xml_base = "default_";
		} else {
			$menu_table = "menu";
		}
		
		$main = fetch("select * from {$menu_table} where idx='{$midx}'");
		$sub = fetch("select * from {$menu_table} where idx='{$sidx}'");
		$page = fetch("select * from {$menu_table} where parent='{$midx}' limit 1");
		
		//���� ������ ���� ����
		$main_title = $main['title'];
		$sub_title = $sub['title'];
		$main_od = $main['od'];
		$sub_od = $sub['od'];
		$site_title = "{$site['title']} &gt; {$main_title} &gt; {$sub_title}";
		$meta_keywords = $meta_description = $site_title;
		$css = "sub";
		
		//��Ŭ��� ���� ����
		if($page_type == 'admin'){
			$include_file = $action ? $action : $sidx;
			$direct = $sidx;
		} else if(!ctype_digit($midx)){
			$include_file = $action ? $action : $sidx;
			$direct = $sidx;
		} else {
			$type = $sub['type'];
			switch($type){
				case 'board' :
				case 'fur' :
					$include_file = $action ? "{$type}_{$action}" : "{$type}_list";
					$direct = $type;
				break;
				case 'search' :
					$include_file = "search";
					$direct = "search";
				break;
				default : 
					$include_file = $action ? "{$type}_{$action}" : $type;
					$direct = $type;
				break;
			}
		}
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=euc-kr" />
<meta name="keywords" content="<?=$meta_keywords?>" />
<meta name="description" content="<?=$meta_description?>" />
<link rel="stylesheet" href="/common/css/common.css" charset="euc-kr" />
<link rel="stylesheet" href="/common/css/<?=$css?>.css" charset="euc-kr" />
<link rel="stylesheet" href="/common/css/print.css" charset="euc-kr" media="print" />
<script type="text/javascript" src="/common/js/common.js"></script>
<script type="text/javascript" src="/common/js/flash.js"></script>
<title><?=$site_title?></title>
</head>

<body <? if($current == 'sub') echo "onload=\"quick('top_btn', 60);\""; ?>>
<div id="wrap">
	<!-- header -->
    <div id="header">
    	<div class="logo">
	        <a href="/"><img src="/img/logo.png" title="<?=$site['title']?>" alt="<?=$site['title']?>" /></a>
        </div>
        
        <div class="top">
            <div class="top_cnt">
                <ul>
                <?
					$member_total = total("select * from member");
					$hope_total = total("select * from furniture where now='0'");
					$fur_total = total("select * from furniture where now='1'");
					$re_total = total("select * from reser");
				?>
                    <li title="ȸ�� : <?=$member_total?>��">ȸ�� <?=$member_total?>��</li>
                    <li title="������ <?=$fur_total?>��">������ <?=$fur_total?>��</li>
                    <li title="��û�� ���� <?=$hope_total?>��">��û�� ���� <?=$hope_total?>��</li>
                    <li title="����� ���� <?=$re_total?>��">����� ���� <?=$re_total?>��</li>
                </ul>
            </div>
            
            <div class="util_menu">
            	<? if($_SESSION['lv'] == 3){ ?>
                <img src="/img/cms.png" title="CMS" alt="CMS" onclick="link('/index.php/admin/site/menu/'); return false;" />                
                <? } ?>
            	<? if($_SESSION['lv']){ ?>
                <img src="/img/logout.png" title="�α׾ƿ�" alt="�α׾ƿ�" onclick="link('/page/logout.php'); return false;" />
                <a href="/index.php/page/member/mypage/" title="����������">����������</a>
                <? } else { ?>
                <a href="/page/login.php" title="�α���" onclick="window.open(this.href, 'login', 'width=300px, height=80px, left=200px, top=200px'); return false;">�α���</a>
                <a href="/index.php/page/3/9/" title="ȸ������">ȸ������</a>
                <? } ?>
                <a href="/index.php/page/2/8/" title="�˻�">�˻�</a>
                <a href="mailto:<?=hex2($site['email'])?>" title="����û��">����û��</a>
                <a href="/index.php/page/member/sitemap/" title="����Ʈ��">����Ʈ��</a>
            </div>
        </div>
        
        <!-- main menu -->
        <div class="gnb">
        <script type="text/javascript">
		AC_FL_RunContent(
			'codebase', 'http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,0,0',
			'width', '700',
			'height', '70',
			'src', '/common/swf/gnb',
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
			'movie', '/common/swf/gnb',
			'salign', '',
			'flashvars', '<?="midx={$main_od}&amp;sidx={$sub_od}"?>'
			)
		</script>
        </div>
        <!-- //main menu -->
    </div>
	<!-- //header -->