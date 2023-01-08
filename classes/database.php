<?php
abstract class Database
{
    private $conn;
    private $table;
    private $query;
    private $stmt;
    private $values;
    private $execute;

    public function __construct($table = '')
    {
        $this->table= $table;
        try {
            //code...
            $dsn = 'mysql:host='.DBHOST.';dbname='.DBNAME;
            $this->conn = new PDO($dsn,DBUSER,DBPASS);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            return $this->conn;
        } catch (PDOException $e) {
           echo $e->getMessage();
        }
    }
    private function run($values = [])
    {
        $this->stmt = $this->conn->prepare($this->query);
        $this->execute = $this->stmt->execute($values);
    }
    protected function select()
    {
        $this->query = 'select * from '.$this->table;
        return $this;
    }
    protected function all()
    {
       $this->run();
       $data = $this->stmt->fetchAll(PDO::FETCH_ASSOC);
        if(is_array($data)&&count($data)>0) {
            return $data;
        }
        return false;
    }
    protected function where(string $column,string $value)
    {
        $this->query .= ' where '.$column.' = '.$value;
        return $this->all();
    }
    protected function delete(array $arr)
    {
        if(isset($arr['product'])) {

            foreach($arr['product'] as $key => $productArr) {
                $this->query = "delete from ".$this->table." where sku ="."'".$productArr."'"."; ";
                $this->run();         
            }
        }
    }
    protected function insert(array $values)
    {
        //insert into table (columns) values (values)
        $this->query = "insert into ".$this->table." (";
        //add columns
        foreach ($values as $key => $value) {
         $this->query .=$key.",";
        }
        $this->query = trim($this->query,",");
        $this->query .=") values (";
        //add values
        foreach ($values as $key => $value) {
         $this->query .=":".$key.",";
        }
        $this->query = trim($this->query,",");
        $this->query .=")";
        $this->values = $values;
        return $this->run($this->values);
    
    }
}
