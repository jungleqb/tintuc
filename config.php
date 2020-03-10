<?php 
require_once 'vendor/autoload.php';
$google_client = new Google_Client();
$google_client->setClientId('1002399574373-ff6jke61tmtqk1vr9ptd5lunosk8q5tl.apps.googleusercontent.com');
$google_client->setClientSecret('XEiqXXZncu448wQqTIRJZ0eO');
$google_client->setRedirectUri('http://localhost/git/Du_An_2/dang-nhap');
$google_client->addScope('email');
$google_client->addScope('profile');


?>