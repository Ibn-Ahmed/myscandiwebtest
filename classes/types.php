<?php
 class Types extends Products
{
    protected $attribute;

    public function validate_book()
    {
        if(is_numeric($this->arr['size'])&&!empty($this->arr['size'])) {
            $this->attribute='Size: '. $this->arr['size'].' MB';
            return true;
        }
        $this->errMsg['attribute'] = 'Please provide size in MB';
    }
    public function validate_furniture()
    {
        if(is_numeric($this->arr['height']) && is_numeric($this->arr["width"]) && is_numeric($this->arr["length"]))  {
            $this->attribute ='Dimensions: '. $this->arr['height'].'x'.$this->arr['width'].'x'.$this->arr['length'];
            return true;
         }
        $this->errMsg['attribute'] = 'Please provide dimensions in HxWxL format';
    }
    public function validate_disc()
    {
        if(is_numeric($this->arr['weight'])) {
            $this->attribute='Weight: '. $this->arr['weight'].' KG';
            return true;
        }
        $this->errMsg['attribute'] = 'Please provide weight in KG';
    }
}