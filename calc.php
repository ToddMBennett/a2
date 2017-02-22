<?php

require('tools.php');
require('Form.php');

// $combatant = '';

$billSplit = '';
$service = '';
$roundUp = '';

if($_GET) {
    dump($_GET); # Output from logic, only for debugging purposes to see the contents of GET
}

$form = new DWA\Form($_GET);
if($form->isSubmitted()) {
    $errors = $form->validate(
        [
            'howMany' => 'numeric|min:0|max:10',
            'howMuch' => 'numeric|min:0|max:1000'
        ]
    );
}

if(isset($_GET['service'])) {
	$service = $_GET['service'];
    if($service == 'choose') {
        $alertType = 'alert-danger';
        $results = 'Please choose the level of service.';
    }
    else {
        $alertType = 'alert-info';
        $results = 'You chose '.$service;
    }
}
