<?php

namespace Fnatic\Models;


use Fnatic\Services\MongoClient;

class Post
{
    static function collection()
    {
        $db = new MongoClient();
        return $db->db->posts;
    }
}
