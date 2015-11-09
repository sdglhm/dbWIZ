<?php
/**
 * DB loader
 */
try {
	$connect = new PDO('mysql:host=127.0.0.1;dbname=praba', 'root', '');
} catch (PDOException $e) {
	die($e);
}

/**
 * [runSQL description]
 * @param  [type] $sql   [SQL query input]
 * @param  [type] $param [Array param input]
 * @return [type]        [array]
 */
function runSQL($sql, $param)
{
	global $connect;
	$query = $connect->prepare($sql);
	if ($param) {
		$query->execute($param);
	}else{
		$query->execute();
	}
	
	return $query->fetchAll(PDO::FETCH_ASSOC);
}
