<?php

include_once 'helpers/function.php';
include_once 'helpers/JsonResponse.php';
// настройки приложения
corsOff();
$data = serializeJson(file_get_contents('php://input'));
header('Content-Type: application/json; charset=utf-8');

// запускаем обработку логики
$player = $data[10];
$number = $data[9];
$status = $data[11];
$firstPlayer = 4;
$secondPlayer = 3;

// изменение массива и передача хода следующему игроку
if ($player === $firstPlayer) {
    $data[$number] = $firstPlayer;
    $player =  $secondPlayer;
} else {
    $data[$number] = $secondPlayer;
    $player = $firstPlayer;
}
// проверка статуса игры
$status = checkStatus($data);

// передача информации в файл для отправки
$data[10] = $player;
$data[11] = $status;

// формат файла для отправки
//$fileToSend = [
//    'error'    => false,
//    'message'  => 'ok',
//    'response' => $data,
//];
//
//$dataError = [
//    'error'   => true,
//    'message' => 'Failed is password',
//];

// отправка json на клиента
// 1) try catch добавить на обработку
// 2) JsonResponse для ответа

$json = json_encode(JsonResponse::success($data));
print $json;