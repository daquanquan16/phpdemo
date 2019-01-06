<?php
/**@author tiny
//抽象类：规范子类、没有实质意义一般大型或者明确规范项目结构的时候才用
//抽象类:方法必需是抽象方法，不能有方法体
//抽象方法不能私有
//抽象类型只能被继承，不能实例化
//子类继承抽象类必须实例化父类的所有方法
 */

abstract class AbstractHuman {
	abstract public function eat();
}
class man extends AbstractHuman{
	public function eat(){
		
	}
}



?>