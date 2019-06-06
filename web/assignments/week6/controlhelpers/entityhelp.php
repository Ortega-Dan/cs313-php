<?php
function validateEntity($array)
{

    $messageBuilder = "";

    foreach ($array as $key => $value) {
        // Making sure IDs are only integers
        if (strpos($key, 'id') !== false) {
            if (!filter_var($value, FILTER_VALIDATE_INT)) {
                $messageBuilder .= "Only integers are allowed for \"$key\"<br>";
            }
        } else if (strpos($key, 'date') !== false) {
            // Making sure data is in right format and stripped from bad data
            if (!preg_match('/^\d\d\d\d-\d\d-\d\d$/', $value)) {
                $messageBuilder .= "Data for \"$key\" must be in the YYYY-MM-DD format<br>";
            }
        } else if (strpos($key, 'email_add') !== false) {
            // Validation email
            if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
                $messageBuilder .= "Data for \"$key\" must have an email format<br>";
            }
        }
    }

    return $messageBuilder == "" ? null : $messageBuilder;
}
