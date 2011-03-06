<?php
	class DataBase {
		
		private static  $dsn = "mysql:host=localhost;dbname=mc_db";
		private static  $username = "mc_db_user";
		private static  $passwd = "mc_db_user_admin@123#";
		
		private static $instance = NULL;
		
		private function __construct() {}
		
		/**
		 * 
		 * Invoke this method before invoking getInstance to configure the db parameters.
		 * When invoked after the getInstance call this function has no effect.
		 * @param unknown_type $_dns
		 * @param unknown_type $_user
		 * @param unknown_type $_pwd
		 */
		public static function configureInstance($_dns,$_user,$_pwd)
		{
			if(!self::$instance)
			{
				self::$dsn = $_dns;
				self::$username = $_user;
				self::$passwd = $_pwd;
			}
		}
		
		public static function getInstance() {
			if(!self::$instance)
			{
				self::$instance = new PDO($this->$dsn, $this->$username, $this->$passwd);
				self::$instance-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			}
			return self::$instance;
		}
		
		
	}
?>