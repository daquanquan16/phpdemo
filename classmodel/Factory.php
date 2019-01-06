<?php
/* 
 * 优点：简单工厂模式能够根据外界给定的信息，决定究竟应该创建哪个具体类的对象。明确区分了各自的职责和权力，有利于整个软件体系结构的优化。
缺点：很明显工厂类集中了所有实例的创建逻辑，容易违反GRASPR的高内聚的责任分配原则

 *  */
interface order{
	public function createOrder();
}

class orderA implements order {
	public function createOrder(){
		echo 'class:'.__METHOD__."function:".__FUNCTION__;
	}
}
class orderB implements order {
	public function createOrder(){
		echo 'class:'.__METHOD__."function:".__FUNCTION__;
	}
}

class Factory {
	public static function createObject($classFlag){
		
		switch ($classFlag){
			case "A":
				return  new orderA();
			case "B":
				return  new orderB();
		    default:
		    	return false;
		}
	}
	
}


/* $f=Factory::createObject("A");
print_r($f);
$f->createOrder();
 */
?>