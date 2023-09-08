<?php

require_once('../config/Connect.php');

class Client extends Connect
{
    private $table;

    function __construct()
    {
        parent::__construct();
        $this->table = 'clientes';
    }
}
