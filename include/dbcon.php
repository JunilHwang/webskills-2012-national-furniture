<?
	//DB접속
	$connect = mysql_connect("localhost", "root", "apmsetup");
	mysql_select_db("001", $connect);
	
	/*----------------- mysql 함수 -----------------*/
	function sql($str){
		global $connect;
		return mysql_query($str);
	}
	
	function fetch($str){
		global $connect;
		return mysql_fetch_assoc(mysql_query($str));
	}
	
	function total($str){
		global $connect;
		return mysql_num_rows(mysql_query($str));
	}
	
	function get_column($arr, $cancel){
		$cancel = explode("/", $cancel);
		foreach($arr as $key=>$val) if(!in_array($key, $cancel)) $column .= ", {$key}='".mysql_real_escape_string($val)."'";
		$column = substr($column, 2);
		return $column;
	}
	
	function query($action, $table, $column){
		global $connect;
		
		switch($action){
			case 'insert' :
				$query[] = " insert into {$table} set ";
			break;
			case 'update' :
				$query[] = " update {$table} set ";
			break;
			case 'delete' :
				$query[] = " delete from {$table} where ";
			break;
		}
		$query[] = $column;
		$query = implode("", $query);
		mysql_query($query) or die($query.mysql_error());
	}
	/*----------------- //mysql 함수 -----------------*/
?>