<?php

require('tools.php');
require('Form.php');

use DWA\Form;

$form = new DWA\Form($_GET);

// Values
$num = (isset($_GET['num'])) ? $_GET['num'] : '';
$roundUp = $form->isChosen('roundUp');
$amount = (isset($_GET['amount'])) ? $_GET['amount'] : '';
$service = (isset($_GET['service'])) ? $_GET['service'] : '';
$calculate = '';
$gratuity = $service * $amount;


if($form->isSubmitted()) {
    $errors = $form->validate(
        [
            'num' => 'numeric|min:1',
            'amount' => 'numeric|min:0'
        ]
    );
}

if($service == 'choose') {
    $alertType = 'alert-danger';
    $results = 'Please choose the level of service.';
}
else {
    $alertType = 'alert-info';
    $results = 'A tip of '.($service *100).'% has been added.
    The total tip amount is $'.$gratuity;
}

if(is_numeric($amount) && is_numeric($num)) {
  if($roundUp == 'yes') {
    $calculate = ceil($amount / $num) * (1 + $service);
  } else {
    $calculate = floor($amount / $num) * (1 +$service);
  }
}
