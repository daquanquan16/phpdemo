<?php
/**
 * 
 */
class Mysql
{
    private $host;
    private $username;
    private $password;
    private $post;
    private $dbname;
    private $chartset;
    private $link;
    // 数据库表达式
    protected $exp = ['eq' => '=', 'neq' => '<>', 'gt' => '>', 'egt' => '>=', 'lt' => '<', 'elt' => '<=', 'notlike' => 'NOT LIKE', 'not like' => 'NOT LIKE', 'like' => 'LIKE', 'in' => 'IN', 'exp' => 'EXP', 'notin' => 'NOT IN', 'not in' => 'NOT IN', 'between' => 'BETWEEN', 'not between' => 'NOT BETWEEN', 'notbetween' => 'NOT BETWEEN', 'exists' => 'EXISTS', 'notexists' => 'NOT EXISTS', 'not exists' => 'NOT EXISTS', 'null' => 'NULL', 'notnull' => 'NOT NULL', 'not null' => 'NOT NULL', '> time' => '> TIME', '< time' => '< TIME', '>= time' => '>= TIME', '<= time' => '<= TIME', 'between time' => 'BETWEEN TIME', 'not between time' => 'NOT BETWEEN TIME', 'notbetween time' => 'NOT BETWEEN TIME'];
    
    // SQL表达式
    protected $selectSql    = 'SELECT%DISTINCT% %FIELD% FROM %TABLE%%FORCE%%JOIN%%WHERE%%GROUP%%HAVING%%UNION%%ORDER%%LIMIT%%LOCK%%COMMENT%';
    protected $insertSql    = '%INSERT% INTO %TABLE% (%FIELD%) VALUES (%DATA%) %COMMENT%';
    protected $insertAllSql = '%INSERT% INTO %TABLE% (%FIELD%) %DATA% %COMMENT%';
    protected $updateSql    = 'UPDATE %TABLE% SET %SET% %JOIN% %WHERE% %ORDER%%LIMIT% %LOCK%%COMMENT%';
    protected $deleteSql    = 'DELETE FROM %TABLE% %USING% %JOIN% %WHERE% %ORDER%%LIMIT% %LOCK%%COMMENT%';
    public function __construct($config=[])
    {
        # code...
        $this->host=!empty($config['host'])?$config['host']:"127.0.0.1";
        $this->username=!empty($config['username'])?$config['username']:"root";
        $this->password=!empty($config['password'])?$config['password']:"root";
        $this->post=!empty($config['post'])?$config['post']:"3306";
        $this->dbname=!empty($config['dbname'])?$config['dbname']:"test";
        $this->chartset=!empty($config['chartset'])?$config['chartset']:"utf8";
        $this->conn();
        $this->chartset();
    }
    private function conn(){
        try {
             $this->link= @new mysqli($this->host,$this->username,$this->password,$this->dbname,$this->post);
             if ($this->link->connect_error) {
                die('Connect Error: ' . $this->link->connect_error);
             }
            
        } catch (Exception $e) {
            die( 'Caught exception: '. $e->getMessage()."\n");
        }
    }
    private function chartSet(){
        $sql="set names {$this->chartset}";
        $res=$this->link->query($sql);
        if (!$res) {
                die('Connect chartset Error: ' . $this->link->error);
             }
    }
    //返回所有查下行数
    public function query($sql){
        $result=$this->link->query($sql);
        if(!$result){
            die('Connect chartset Error: ' . $this->link->error);
        }
        $rows=[];
        if($result->num_rows){
           $rows= $result->fetch_all(MYSQLI_ASSOC);
        }
        return $rows;
    }
    //返回行数查下结果但行数据
    public function queryOne($sql){
        $result=$this->link->query($sql);
        if(!$result){
            die('Connect chartset Error: ' . $this->link->error);
        }
        $rows=[];
        if($result->num_rows){
            $rows= $result->fetch_assoc();
        }
        return $rows;
    }
    
    public function insterGetId($sql){
        $result=$this->link->query($sql);
        if(!$result){
            die('Connect chartset Error: ' . $this->link->error);
        }
        return $this->link->insert_id?$this->link->insert_id:0;
    }
    //返回影响行数
    public function execute($sql){
        $result=$this->link->query($sql);
        if(!$result){
            die('Connect chartset Error: ' . $this->link->error);
        }
        $rows=0;
        if($this->link->affected_rows){
            $rows= $this->link->affected_rows;
        }
        return $rows;
    }


    
    public function find(){

    }
    public function select(){

    }
    //$conn->query(" insert into student values(4,'test')");
    public function insert(){

    }
    //$conn->query(" update student set name ='php' where id=4");
    public function update(){

    }
    public function where(){

    }
    public function table(){

    }
    public function getField(){

    }
    //$conn->query("delete from student where id=3 or id=4");





}
?>