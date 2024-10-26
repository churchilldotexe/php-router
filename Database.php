<?php


class Database
{
    private $connection;
    public function __construct($config, $userName = "root", $password = "")
    {
        $dsm = "mysql:" . http_build_query($config, "", ";");
        $this->connection = new PDO($dsm, $userName, $password, [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
    }

    public function query($query)
    {

        $statement = $this->connection->prepare($query);

        $statement->execute();

        return $statement;
    }

}
