<?
	//세션 시작
	session_start();
	
	//주소값 저장
	$get = explode("/", $_SERVER['PATH_INFO']);
	$page_type = $get[1];
	$midx = $get[2];
	$sidx = $get[3];
	$action = $get[4];
	$page_num = $get[5] ? $get[5] : 1;
	$idx = $get[5];
	
	$get_page = "/index.php/{$page_type}/{$midx}/{$sidx}/";
	$current = $page_type && $midx && $sidx ? 'sub' : 'main';
	
	//DB접속
	include_once("{$_SERVER['DOCUMENT_ROOT']}/include/dbcon.php");
	
	//메시지 출력
	function alert($str){
		echo "<script type=\"text/javascript\">alert('{$str}')</script>";
	}
	
	//페이지 이동
	function move($str){
		echo "<script type='text/javascript'>";
			echo $str ? "document.location.replace('{$str}')" : "history.back();";
		echo "</script>";
		exit;
	}
	
	//엑세스
	function access($bool, $msg, $url=false){
		if(!$bool){
			alert($msg);
			move($url);
		}
	}
	
	//이메일 부호화
	function hex2($str){
		$strlen = strlen($str);
		for($i=0; $i<$strlen; $i++) $hex.= "&#x".bin2hex(substr($str, $i, 1)).';';
		return $hex;
	}
	
	//본문 이메일 부호화
	function hex($str){
		preg_match_all("([a-zA-z0-9]+@[a-zA-z0-9]+\.[a-zA-z0-9._-]+)", $str, $a, PREG_SET_ORDER);
		for($i=0; $i<sizeof($i); $i++){
			$str = str_replace($a[$i][0], hex2($a[$i][0]), $str);
		}
		return $str;
	}
	
	//자동 이메일 부호화
	function arr_hex($arr){
		foreach($arr as $key=>$val) $arr[$key] = hex($val);
		return $arr;
	}
	
	//보안
	function str_change($str){
		$str = preg_replace("!<script(.*?)<\/script>!is", "", $str);
		$str = preg_replace("!<iframe(.*?)<\/iframe>!is", "", $str);
		$str = preg_replace("!<script(.*?)>!is", "", $str);
		$str = preg_replace("!<iframe(.*?)>!is", "", $str);
		$str = str_replace("<\/script>", "", $str);
		$str = str_replace("<\/iframe>", "", $str);
		return $str;
	}
	
	//자동보안
	function arr_change($arr){
		foreach($arr as $key=>$val) $arr[$key] = str_change($val);
		return $arr;
	}
	
	//인코딩
	function encode($str){
		$str = base64_encode($str);
		$str = str_replace('/', '^2', $str);
		$str = str_replace('+', '$4', $str);
		return $str;
	}
	
	//디코딩
	function decode($str){
		$str = str_replace('^2', '/', $str);
		$str = str_replace('$4', '+', $str);
		$str = base64_decode($str);
		return $str;
	}
	
	//글자수 제한
	function cut($str, $stt, $len){
		$strlen = strlen($str);
		return $strlen > $len ? mb_substr($str, $stt, $len / 2, "utf-8") . "..." : $str;
	}
	
	//페이징
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
	
	//파일 업로드
	function file_uploaded($file){
		$chk = strtolower(array_pop(explode(".", basename($file['name']))));
		$chk_name = array('jpeg', 'jpg', 'png', 'gif');
		access(in_array($chk, $chk_name), "이미지 파일만 업로드가 가능합니다.");
		$file_name = time()."_".rand().".{$chk}";
		$dir = "{$_SERVER['DOCUMENT_ROOT']}/data/furniture/{$file_name}";
		$thum_dir = "{$_SERVER['DOCUMENT_ROOT']}/data/furniture/thum_{$file_name}";
		move_uploaded_file($file['tmp_name'], $dir);
		$size = getimagesize($dir);
		$resize = resize($size[0], $size[1]);
		thum($dir, $thum_dir, $chk, $resize[0], $resize[1]);
		return $file_name;
	}
	
	//비율조정
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
	
	//썸네일
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
	
	//하이라이팅
	function hit($str, $key){
		$str = str_replace($key, "<span class='hit'>{$key}</span>", $str);
		return $str;
	}
	
	//가구분류
	$furniture_arr = array('책상','의자','옷장','서랍장','책장','탁자');
?>