<?php

use Gilclei\CheckCns\CheckCNS;

require_once "vendor/autoload.php";

$cns = '703404696479515';

if (CheckCNS::isValid($cns)){
    echo 'ok';
}