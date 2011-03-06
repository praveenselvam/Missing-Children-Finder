<?php
require_once "model_manager.php";
Class ModelSearch{
	private static $SEARCH_CHILD_BASIC="select c.name as name, c.age as age, c.gender as gender, a.city as city, a.state as state 
					from child c, address a, rel_reporter_child_address r  
					where c.name like :name and c.gender = :gender and 
					c.age between :st_age and :end_age and a.city like :city 
					and r.rca_child_id=c.child_id and r.rca_address_id=a.address_id";
	
	public function basicSearch($params){
		$DB=DataBase::getInstance();
		try {							   	
			$search_result=ModelManager::transcationReadRecord(self::$SEARCH_CHILD_BASIC, $params, $DB);
		}catch(PDOException $pdo_e) {
			//$DB->rollback();
			// report error here
		}
		return $search_result;
	}
	
}
?>