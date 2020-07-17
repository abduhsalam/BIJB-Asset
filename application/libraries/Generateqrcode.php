<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');  
require_once APPPATH."/third_party/ciqrcode/Ciqrcode.php";
class Generateqrcode extends Ciqrcode {
    public function __construct() {
        parent::__construct();
    } 
} 