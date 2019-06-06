<?php
function validateEntity($array){

    $messageBuilder = "";


    foreach ($array as $key => $value) {
        if (strpos($key,'id')!= false) {
            // FILTER SANITIZE INTEGERS ...
        }
    }

    return null;
}