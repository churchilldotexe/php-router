<?php


class Database
{
    private $connection;
    private $statement;

    public function __construct($config, $userName = "root", $password = "")
    {
        $dsm = "mysql:" . http_build_query($config, "", ";");
        $this->connection = new PDO($dsm, $userName, $password, [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
    }

    public function query($query, $params = [])
    {

        $this->statement = $this->connection->prepare($query);

        $this->statement->execute($params);

        return $this;
    }

    public function getOne()
    {
        return $this->statement->fetch();
    }

    public function getAll()
    {
        return $this->statement->fetchAll();
    }

    public function getOrAbort()
    {
        $result = $this->getOne();
        if (!$result) {
            abort();
        }

        return $result;
    }

}
