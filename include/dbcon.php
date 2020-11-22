<?php

	/*----------------- mysql ⑥ -----------------*/
	function sql($str){
    //DB
    $db = new PDO("sqlite:". dirname(__DIR__) ."/001.db");
		$result = $db->query($str);
		$db = null;
		return $result;
	}
	
	function fetch($str){
		return sql($str)->fetch();
	}
	
	function total($str){
		return sql($str)->rowCount();
	}
	
	function get_column($arr, $cancel){
		$cancel = explode("/", $cancel);
		foreach($arr as $key=>$val) if(!in_array($key, $cancel)) $column .= ", {$key}='".mysql_real_escape_string($val)."'";
		$column = substr($column, 2);
		return $column;
	}
	
	function query($action, $table, $column){
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
		sql($query);
	}
	/*----------------- //mysql ⑥ -----------------*/
?>