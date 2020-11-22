<?
	//���� ����
	session_start();
	
	//�ּҰ� ����
	$get = explode("/", $_SERVER['PATH_INFO']);
	$page_type = $get[1];
	$midx = $get[2];
	$sidx = $get[3];
	$action = $get[4];
	$page_num = $get[5] ? $get[5] : 1;
	$idx = $get[5];
	
	$get_page = "/index.php/{$page_type}/{$midx}/{$sidx}/";
	$current = $page_type && $midx && $sidx ? 'sub' : 'main';
	
	//DB����
	include_once("{$_SERVER['DOCUMENT_ROOT']}/include/dbcon.php");
	
	//�޽��� ���
	function alert($str){
		echo "<script type=\"text/javascript\">alert('{$str}')</script>";
	}
	
	//������ �̵�
	function move($str){
		echo "<script type='text/javascript'>";
			echo $str ? "document.location.replace('{$str}')" : "history.back();";
		echo "</script>";
		exit;
	}
	
	//������
	function access($bool, $msg, $url=false){
		if(!$bool){
			alert($msg);
			move($url);
		}
	}
	
	//�̸��� ��ȣȭ
	function hex2($str){
		$strlen = strlen($str);
		for($i=0; $i<$strlen; $i++) $hex.= "&#x".bin2hex(substr($str, $i, 1)).';';
		return $hex;
	}
	
	//���� �̸��� ��ȣȭ
	function hex($str){
		preg_match_all("([a-zA-z0-9]+@[a-zA-z0-9]+\.[a-zA-z0-9._-]+)", $str, $a, PREG_SET_ORDER);
		for($i=0; $i<sizeof($i); $i++){
			$str = str_replace($a[$i][0], hex2($a[$i][0]), $str);
		}
		return $str;
	}
	
	//�ڵ� �̸��� ��ȣȭ
	function arr_hex($arr){
		foreach($arr as $key=>$val) $arr[$key] = hex($val);
		return $arr;
	}
	
	//����
	function str_change($str){
		$str = preg_replace("!<script(.*?)<\/script>!is", "", $str);
		$str = preg_replace("!<iframe(.*?)<\/iframe>!is", "", $str);
		$str = preg_replace("!<script(.*?)>!is", "", $str);
		$str = preg_replace("!<iframe(.*?)>!is", "", $str);
		$str = str_replace("<\/script>", "", $str);
		$str = str_replace("<\/iframe>", "", $str);
		return $str;
	}
	
	//�ڵ�����
	function arr_change($arr){
		foreach($arr as $key=>$val) $arr[$key] = str_change($val);
		return $arr;
	}
	
	//���ڵ�
	function encode($str){
		$str = base64_encode($str);
		$str = str_replace('/', '^2', $str);
		$str = str_replace('+', '$4', $str);
		return $str;
	}
	
	//���ڵ�
	function decode($str){
		$str = str_replace('^2', '/', $str);
		$str = str_replace('$4', '+', $str);
		$str = base64_decode($str);
		return $str;
	}
	
	//���ڼ� ����
	function cut($str, $stt, $len){
		$strlen = strlen($str);
		if($strlen > $len){
			for($p=$len; $p>=$stt && ord($str[$p-1])>=127; $p--);
			$len = ($len-$p)%2 == $stt ? $len : $len+1;
			$str = substr($str, $stt, $len).'..';
		}
		return $str;
	}
	
	//����¡
	function page_nate($num, $total, $url, $prev, $next, $line=5){
		$url = explode("&&", $url);
		$last_page = ceil($total/$line);
		$p = $num - 1;
		$n = $num + 1;
		if($num == 1){
			$page .= "<input type='button' class='btn' title='{$prev}' value='{$prev}' />&nbsp;";
		} else {
			$page .= "<input type='button' class='btn' title='{$prev}' value='{$prev}' onclick=\"link('{$url[0]}{$p}{$url[1]}'); return false;\" />&nbsp;";
		}
		
		for($i=1; $i<=$last_page; $i++){
			if($i==$num){
				$page .= "<a href='{$url[0]}{$i}{$url[1]}' title='{$i}' class='bold'>{$i}</a>&nbsp;";
			} else {
				$page .= "<a href='{$url[0]}{$i}{$url[1]}' title='{$i}'>{$i}</a>&nbsp;";
			}
		}
		
		if($num == $last_page){
			$page .= "<input type='button' class='btn' title='{$next}' value='{$next}' />";
		} else {
			$page .= "<input type='button' class='btn' title='{$next}' value='{$next}' onclick=\"link('{$url[0]}{$n}{$url[1]}'); return false;\" />";
		}
		
		$page_nate = "<div class='wh al_c'>{$page}</div>";
		return $page_nate;
	}
	
	//���� ���ε�
	function file_uploaded($file){
		$chk = strtolower(array_pop(explode(".", basename($file['name']))));
		$chk_name = array('jpeg', 'jpg', 'png', 'gif');
		access(in_array($chk, $chk_name), "�̹��� ���ϸ� ���ε尡 �����մϴ�.");
		$file_name = time()."_".rand().".{$chk}";
		$dir = "{$_SERVER['DOCUMENT_ROOT']}/data/furniture/{$file_name}";
		$thum_dir = "{$_SERVER['DOCUMENT_ROOT']}/data/furniture/thum_{$file_name}";
		move_uploaded_file($file['tmp_name'], $dir);
		$size = getimagesize($dir);
		$resize = resize($size[0], $size[1]);
		thum($dir, $thum_dir, $chk, $resize[0], $resize[1]);
		return $file_name;
	}
	
	//��������
	function resize($w, $h){
		$s = 150;
		if($w > $h){
			$a = $s/$w;
			$w = $s;
			$h = ceil($h*$a);
		} else if($w < $h){
			$a = $s/$h;
			$w = ceil($w*$a);
			$h = $s;
		} else if($w == $h){
			$w = $h = $s;
		}
		$resize[] = $w;
		$resize[] = $h;
		return $resize;
	}
	
	//�����
	function thum($dir, $thum_dir, $type, $w, $h){
		$size = getimagesize($dir);
		$n_name = imagecreatetruecolor($w,$h);
		switch($type){
			case 'gif' :
				$o_name = imagecreatefromgif($dir);
				imagecopyresampled($n_name, $o_name, 0,0,0,0,$w,$h,$size[0],$size[1]);
				imagegif($n_name, $thum_dir);
			break;
			case 'jpeg' :
			case 'jpg' :
				$o_name = imagecreatefromjpeg($dir);
				imagecopyresampled($n_name, $o_name, 0,0,0,0,$w,$h,$size[0],$size[1]);
				imagejpeg($n_name, $thum_dir);
			break;
			case 'png' :
				$o_name = imagecreatefrompng($dir);
				imagecopyresampled($n_name, $o_name, 0,0,0,0,$w,$h,$size[0],$size[1]);
				imagepng($n_name, $thum_dir);
			break;
		}
	}
	
	//���̶�����
	function hit($str, $key){
		$str = str_replace($key, "<span class='hit'>{$key}</span>", $str);
		return $str;
	}
	
	//�����з�
	$furniture_arr = array('å��','����','����','������','å��','Ź��');
?>