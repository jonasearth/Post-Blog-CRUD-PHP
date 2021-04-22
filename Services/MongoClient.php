<?php

namespace Fnatic\Services;



class MongoClient
{
    public $db;
    function __construct()
    {

        $client = new \MongoDB\Client('mongodb+srv://postman:jonas@cluster0.ddncs.mongodb.net/posts?retryWrites=true&w=majority');

        $this->db = $client->posts;
    }
}
