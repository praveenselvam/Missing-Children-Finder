<?php
require_once "model/model_manager.php";
Class ModelSearch{
	private static $SEARCH_CHILD_BASIC="select c.name as name, c.age as age, c.gender as gender, a.city as city, a.state as state 
					from child c, address a, rel_reporter_child_address r  
					where r.rca_child_id=c.child_id and r.rca_address_id=a.address_id ";
	private $where_clause_partial="";
	/*
	c.name like :name and c.gender = :gender and 
					c.age between :st_age and :end_age and a.city like :city 
					and ";
	*/
	public function basicSearch($params){
		$DB=DataBase::getInstance();
		try {
			// where clause needs to be tweaked based on user input
			// mundane implementation
			if($params['name']!=NULL && $params['name']!=""){
				$this->where_clause_partial="c.name like :name";
			}else{
				unset($params['name']);
			}
			
			if(isset($params['st_age']) && isset($params['end_age'])) {
				if($this->where_clause_partial!="")
					$this->where_clause_partial=$this->where_clause_partial." and c.age between :st_age and :end_age";
				else
					$this->where_clause_partial="c.age between :st_age and :end_age";
			}else{
				unset($params['st_age']);
				unset($params['end_age']);
			}
			
			if($params['city']!=NULL && $params['city']!=""){
				if($this->where_clause_partial!="")
					$this->where_clause_partial=$this->where_clause_partial." and a.city like :city";
				else
					$this->where_clause_partial="a.city like :city";
			}else{
				unset($params['city']);
			}

			if($params['gender']!=NULL && $params['gender']!=""){
				if($this->where_clause_partial!="")
					$this->where_clause_partial=$this->where_clause_partial." and c.gender=:gender";
				else
					$this->where_clause_partial="c.gender=:gender";
			}else{
				unset($params['gender']);
			}
			
			$params['st_age']=(int)($params['st_age']);
			$params['end_age']=(int)($params['end_age']);
			
			if($this->where_clause_partial != "")
				$sql=self::$SEARCH_CHILD_BASIC." and ".$this->where_clause_partial;
			else
				$sql=self::$SEARCH_CHILD_BASIC;
			
			$search_result=ModelManager::transcationReadRecord($sql, $params, $DB);
		}catch(PDOException $pdo_e) {
			//$DB->rollback();
			// report error here
			echo $pdo_e." <br>";
		}
		return $search_result;
	}
	
}
?>