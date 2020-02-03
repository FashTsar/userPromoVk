<?php

$I = new AcceptanceTester($scenario);

// принимаемые параметры
$loginVK = "";
$passwordVK = "";

// переходим на страницу ВК и авторизуемся
$I->authorizationVK($loginVK, $passwordVK);

$I->autorizationPromovk();