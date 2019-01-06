<?php
class ClassHuman {
	const C="11";
	public $sex="";
	private $age="";
	protected  $name="";
	public function __construct(){
		
	}
	public function eat(){
		
	}
	protected function ask(){
		
	}
	private function call(){
		
	}
	public function setName($name){
		$this->name=$name;
	}
	public function getName(){
		return $this->name;
	}
	
}

?>