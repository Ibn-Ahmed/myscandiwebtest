<?php
 final class Validate extends Types  
{
    private $inputArray;
    private $type;

    public function validate_all()
    {
        $this->validate_sku();
        $this->validate_name();
        $this->validate_price();
        $this->validate_option();

        switch ($this->type) {
            case '1':
                $this->validate_book();
                break;
            case '2':
                $this->validate_furniture();
                break;
                case '3':
                $this->validate_disc();
                break;
                default:
                # code...
                break;
        }
    }
    public function get_err_msg($posts)
    {
        $this->arr = $posts;

        $this->inputArray['sku'] =trim($this->arr['sku']);
        $this->inputArray['name'] =trim($this->arr['name']);
        $this->inputArray['price'] =trim($this->arr['price']);
        $this->inputArray['type'] =$this->arr['type'];

        if(isset($posts['submit'])) {
            $this->type = $this->arr['type'];
            
            $this->validate_all();
            $this->inputArray['attribute'] = $this->attribute;
            if(empty($this->errMsg)){
                return  ($this->insertData($this->inputArray));
            }   
            return $this->errMsg;
        }
    }     
}