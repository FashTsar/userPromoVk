<?php
set_time_limit(0);
ini_set("max_execution_time", 0);
$I = new AcceptanceTester($scenario);

// принимаемые параметры
$loginVK = "";
$passwordVK = "";
$runCheckFriendRequests = true;
$runAddNewsMyPageVk = true;
$runAddNewsPageNewsVk = true;
$runAddNewsMyPageVkNotWords = true;
$runAddNewsPageNewsVkNotWords = true;
$runAddLikeNews = true;
$runAddStatusVk = true;
$runAddRepostNews = true;
$runAddMusic = true;
$runAddVideo = true;
$runAddGroup = true;
$runAddFineFriend = true;
$runAddOfferFriend = true;

$I->openNewTab();
$I->wait(3);

// переходим на страницу ВК и авторизуемся
$I->authorizationVK($loginVK, $passwordVK);

// авторизуемся в http://promovk.ru/
$I->autorizationPromovk();

// номер оборота
$time = 0;

// запускаем цикл
for ($i = 1; $i <= 1000000; $i++) {
    $time++;
    echo "\nОборот номер $time";

    // проверка количества групп в ВК
    $I->checkingNumberGroups();

    if ($runCheckFriendRequests === true) {
        // проверяем заявки в друзья
        $I->checkFriendRequests();
    }

    // Добавляемся в группу с http://promovk.ru/
    $I->addGroupPromovk();

    // Добавляемся в друзья с http://promovk.ru/
    $I->addFriendPromovk();

    $randChance = rand(1, 100);

    if($randChance <= 15) {
        if ($runAddNewsMyPageVk === true) {
            // добавляем новость со своей страницы
            $I->addNewsMyPageVk();
        }
    }
    if ($randChance > 15 && $randChance <= 30) {
        if ($runAddNewsPageNewsVk === true) {
            // добавляем новост со страницы новостей
            $I->addNewsPageNewsVk();
        }
    }
    if ($randChance > 30 && $randChance <= 45) {
        if ($runAddNewsMyPageVkNotWords === true) {
            // добавляем новость со своей страницы БЕЗ слов
            $I->addNewsMyPageVkNotWords();
        }
    }
    if ($randChance > 45 && $randChance <= 60) {
        if ($runAddNewsPageNewsVkNotWords === true) {
            // добавляем новость со страницы новостей БЕЗ слов
            $I->addNewsPageNewsVkNotWords();
        }
    }
    if ($randChance > 60 && $randChance <= 75) {
        if ($runAddLikeNews === true) {
            // ставим лайк на новость
            $I->addLikeNews();
        }
    }
    if ($randChance > 75 && $randChance <= 80) {
        if ($runAddStatusVk === true) {
            // выкладываю статус ВК
            $I->addStatusVk();
        }
    }
    if ($randChance > 80 && $randChance <= 90) {
        if ($runAddMusic === true) {
            // добавляем песню
            $I->addMusic();
        }
    }
    if ($randChance > 90 && $randChance <= 100) {
        if ($runAddVideo === true) {
            // добавляем видео
            $I->addVideo();
        }
    }

    // Добавляемся в группу (гарантия) с http://promovk.ru/
    $I->addGroupGarantPromovk();

    $randWait = rand(176, 364);
    echo "\nЖдём $randWait секунд";
    $I->wait($randWait);
}
