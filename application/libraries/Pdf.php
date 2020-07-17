<?php if ( !defined('BASEPATH')) exit();
class Pdf
{
    function __construct()
    {
        require_once APPPATH.'/libraries/fpdf.php';
    }
}