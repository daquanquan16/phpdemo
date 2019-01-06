<?php
/*  
 * //类似于单继承而准备的一种复用
 *成员：属性（静态）、、方法（静态）不能有常量
 *trait 不能被实例化
 *使用 use 关键字
 *一般使用同一类型的操作定义一个trait
 *一个类里面可以使用多个trait;
 *use trait1,trait2;
 *trait 同名方法
 *使用trait 的类，不能使用同trait 同名的属性，
 *如有同名方法，使用的类会覆盖trait的方法
 *如类有继承，同名方法使用优先级：子类 会覆盖 trait ,trait 会覆盖父类
 *提供一些公共方法，让其他的一些类在继承之余还可以访问一些其他额公共方法
 * */


trait TraitHuman {
	public function eat(){
		echo "eat";
	}
	
}

trait ta{
	public function go(){
		
	}
}
trait tb{
	public function go(){
	
	}
}
class man{
	use TraitHuman;

}

class woman{
	//use t1,t2;//错误，trait 里面同名方法冲突 解决方案一
	use ta,tb{
		ta::go insteadof tb;//ta 替代tb
	}
	
}

class Animal{
	//use t1,t2;//错误，trait 里面同名方法冲突 解决方案二
	use ta,tb{
		ta::go insteadof tb;//ta 替代tb
		tb::go as goas;
	}

}

$man=new man();
$man->eat();

?>