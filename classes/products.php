<?php
class products extends Database implements InputValidator{
    protected $check;
    protected $arr;
    protected $errMsg = [];

    public function get_all()
    {
        return $this->select()->all();
    }
    public function get_by_sku($sku,$value)
    {
       $this->check = $this->select()->where($sku,$value);
       return $this->check;
    }
    public function delete_by_check(array $arr)
    {
        $this->delete($arr);
    }
    public function insertData(array $data)
    {
       $this->insert($data);
    }
    public function validate_sku()
    {
        if (empty($this->arr['sku'])||!empty($this->get_by_sku('sku','"'.$this->arr['sku'].'"')))
        $this->errMsg['sku'] = 'Invalid sku or sku already exits';   
    }
    public function validate_name()
    {
        if (empty($this->arr['name']))
        $this->errMsg['name'] = 'Please provide name'; 
    }
    public function validate_price()
    {
        if (empty($this->arr['price'])||!is_numeric($this->arr['price']))
        $this->errMsg['price'] = 'Please provide price';
    }
    public function validate_option()
    {
        if (!preg_match('/[1-3]/', $this->arr['type']))
        $this->errMsg['type'] = 'Please select a type';   
       
    }
}