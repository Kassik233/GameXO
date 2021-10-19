<?php

function serializeJson( string $params, bool $state = true) {
    if ($state) return json_decode($params, true);
    return json_encode($params);
}

function corsOff() {
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: *');
    header('Access-Control-Allow-Headers: content-type');
}
function checkStatus ($data) {
    if ($data[0] + $data[1] + $data[2] === 9 || $data[0] + $data[3] + $data[6] === 9 || $data[3] + $data[4] + $data[5] === 9 || $data[1] + $data[4] + $data[7] === 9 || $data[6] + $data[7] + $data[8] === 9 || $data[2] + $data[5] + $data[8] === 9 || $data[0] + $data[4] + $data[8] === 9 || $data[2] + $data[4] + $data[6] === 9) {
        $status = 1;
    } elseif ($data[0] + $data[1] + $data[2] === 12 || $data[0] + $data[3] + $data[6] === 12 || $data[3] + $data[4] + $data[5] === 12 || $data[1] + $data[4] + $data[7] === 12 || $data[6] + $data[7] + $data[8] === 12 || $data[2] + $data[5] + $data[8] === 12 || $data[0] + $data[4] + $data[8] === 12 || $data[2] + $data[4] + $data[6] === 12) {
        $status = 2;
    } elseif ($data[0] + $data[1] + $data[2] + $data[3] + $data[4] + $data[5] + $data[6] + $data[7] + $data[8] === 31) {
        $status = 3;
    } else {
        $status = 0;
    }
    return $status;
}