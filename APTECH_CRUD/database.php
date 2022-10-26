<?php

class database
{
    private $server_name = "localhost";
    private $server_root = "root";
    private $server_password = "";
    private $db_name = "dbbook";
    protected $connection;

    public function __construct()
    {
        $this->connection = new mysqli($this->server_name, $this->server_root, $this->server_password, $this->db_name);
    }
}
