<?php

require dirname(__FILE__) . '/../vendor/autoload.php';

$bot_token = 'AYWuIBnyHL8l2MMus8it-iS8UxLyAkm8Ly7_d7si6NdfAL8PS5ZM3jIcIeZHgYpaTTSTa7eKVbxuFFl-zqS7gaRMsYy3HRwKaamsnODbSZ5y-HVsJpWaWKA1987FZEDDblgXvd9k8BUEWREK';

$bot = new Soroush\Client($bot_token);

try {

    $messages = $bot->getMessages();

    foreach ($messages as $message) {
        $data = $message->getData();
        echo 'New message received !' . PHP_EOL . 'From : ' . $data['from'] . ', Body : ' . $data['body'] . PHP_EOL;
        $data['to'] = $data['from'];
        unset($data['from']);
        list($error, $success) = $bot->sendRAW($data);

        if($success) {
            echo 'Message reply sent successfully' . PHP_EOL;
        } else {
            echo 'Fail : ' . $error. PHP_EOL;
        }
    }

} catch (Exception $e) {
    die($e->getMessage());
}
