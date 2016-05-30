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
 * @param  [PDO connection] $sql   [SQL query input]
 * @param  [Array] $param [Array param input]
 * @return [Array]        Returns the array with SQL reply
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
