<?php
class  databaseConnection
{
	private static $dbconnection = NULL;
	private function __construct()
	{
	}

	public static function connect()
	{
		try {
			$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
			self::$dbconnection = new PDO('mysql:host=localhost;dbname=cafekonecta_db', 'root', '', $pdo_options);
			return self::$dbconnection;
		} catch (PDOException $error) {
			echo $error->getMessage();
		}
	}

	public static function close(){
        self::$dbconnection = null;
    }
}
?>
