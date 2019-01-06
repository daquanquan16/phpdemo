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
	
	public function setName($name){
		$this->name=$name;
	}
	public function getName(){
		return $this->name;
	}
	/* 属性重载 */
	public function __set($name,$value){
		$this->$name=$value;
	}
	public function __get($name){
		return $this->$name;
	}
	public function __unset($name){
		unset($this->$name);
	}
	//自动被调用的
	public function __toString(){
	 return  "tostring";
	}
	/* 方法重载 */
	private function call(){
		echo "function name:".__FUNCTION__;
	}
	
	public  function __call($functionname,$args){
		$this->$functionname();
	}
	private static function callstatic(){
		echo "function name:".__FUNCTION__;
	}
	public static  function __callstatic($functionname,$args){
		self::$functionname();
	}
	
}
$human= new ClassHuman();
$human->age=100;
var_dump($human->age	);
$human->call();
$human::callstatic();

?>