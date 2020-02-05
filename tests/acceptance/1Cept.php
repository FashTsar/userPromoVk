<?php

$I = new AcceptanceTester($scenario);

// принимаемые параметры
$loginVK = "79035327901";
$passwordVK = "oCQS3So";

// переходим на страницу ВК и авторизуемся
$I->authorizationVK($loginVK, $passwordVK);

// авторизуемся в http://promovk.ru/
$I->autorizationPromovk();

// Добавляемся в друзья с http://promovk.ru/
$I->addFriendPromovk();