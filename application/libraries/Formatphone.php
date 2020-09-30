<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Formatphone {

public function formatCel($number)
    {
        $number="(".substr($number,0,2).") ".substr($number,2,-4)."-".substr($number,-4);
        // primeiro substr pega apenas o DDD e coloca dentro do (), segundo subtr pega os números do 3º até faltar 4, insere o hifem, e o ultimo pega apenas o 4 ultimos digitos
        return $number;
    }
}