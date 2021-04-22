<?php

namespace Fnatic\Tools;

class Returns
{



    public static function simpleMsgError($msg)
    {
        $data = [
            "message" => $msg,
            "error" => true,
            "data" => []
        ];
        self::jsonSend($data);
    }

    public static function msgData($msg, $data = [])
    {
        $dat = [
            "message" => $msg,
            "error" => false,
            "data" => $data
        ];
        self::jsonSend($dat);
    }
    private static function jsonSend($data)
    {
        die(json_encode($data));
    }
}
