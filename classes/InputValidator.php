<?php
interface InputValidator
{
    public function validate_sku();
    public function validate_name();
    public function validate_price();
    public function validate_option();
}