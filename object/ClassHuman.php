<?php
class ClassHuman {
	const C="11";//常量
	public $sex="";//公有属性
	private $age="";//私有属性
	protected  $name="";//受保护的属性 只能被本身和子类调用
	public function __construct(){
		
	}
	public function eat(){
		
	}
	protected function ask(){
		
	}
	
	public function setName($value){
		$this->name=$value;
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

class Man extends ClassHuman {
	public function getName(){
		echo parent::getName();
		echo "sub getName function";
	}
}
$human= new ClassHuman();
$human->age=100;
var_dump($human->age	);
$human->call();
$human::callstatic();
$man=new Man();
$man->setName(" 小明");
$man->getName();






?>