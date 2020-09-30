<?php
defined('BASEPATH') OR exit('No direct script access allowed');
function limpar($string){
    $string = preg_replace('/[`^~\'"]/', null, iconv('UTF-8', 'ASCII//TRANSLIT', $string));
    $string = strtolower($string);
    $string = str_replace(" ", "-", $string);
    $string = str_replace("---", "-", $string);
    return $string;
}
function reais($decimal){
    return "R$ ".number_format((double)$decimal,2,",",".");
}
function dataBr_to_dataMySQL($data){
    $campos = explode("/",$data);
    return date("Y-m-d", strtotime($campos[2]."/".$campos[1]."/".$campos[0]));
}