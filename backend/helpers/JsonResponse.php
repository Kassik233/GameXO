<?php


class JsonResponse
{
    static function success($data) {
        $fileToSend = [
        'error'    => false,
    'message'  => 'ok',
    'response' => $data,
            ];
        return $fileToSend;
    }

    static function error() {
        $fileToSend = [
            'error'   => true,
            'message' => 'Failed is password',
        ];
        return $fileToSend;
    }
}