<?php
spl_autoload_register(function($classname) {
    include ucfirst($classname).'.php';
});

//database de
const DBNAME = 'items';
const DBUSER = 'Ibn';
const DBHOST = 'localhost';
const DBPASS = '12345';