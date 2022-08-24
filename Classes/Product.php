<?php
namespace Classes;

use PDO;

abstract class Product
{
    protected $name;
    abstract protected function getType();

    public function getConnection()
    {
        return new PDO('mysql:host=localhost;dbname=id19440441_scandiweb', 'id19440441_mwaura', '4M*]atm)DsvlqH%|', array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ));
    }

    public static function getData()
    {
        $con = new PDO('mysql:host=localhost;dbname=id19440441_scandiweb', 'id19440441_mwaura', '4M*]atm)DsvlqH%|', array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ));
        $stm = $con->prepare("SELECT * from products");
        $stm->execute();
        $results = $stm->fetchAll();

        return $results;
    }

    public function saveData()
    {
        $stm = $this->getConnection()->prepare("SELECT count(*) from products WHERE sku =:sku");
        $stm->bindParam(':sku', $this->sku);
        $stm->execute();
        $res = $stm->fetchColumn();

        if ($res > 0) {
            return false;
        }

        $stmt = $this->getConnection()->prepare("INSERT INTO products(sku, name, price, dimension) VALUE(:sku, :name, :price, :dimension)");
        $query_result = $stmt->execute([
            ":sku" => $this->sku,
            ":name" => $this->name,
            ":price" => $this->price,
            ":dimension" => $this->getType()
        ]);

        header("Location: /");
    }
        
    public static function deleteData($ids)
    {
        $con = new PDO('mysql:host=localhost;dbname=id19440441_scandiweb', 'id19440441_mwaura', '4M*]atm)DsvlqH%|', array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ));
        foreach ($ids as $id) {
            $stmt = $con->prepare("DELETE FROM products WHERE id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();
        }

        header("Location: /");
    }

    public function __set($name, $value)
    {
        $this->$name = $value;
    }

    public function __get($name)
    {
        return $this->$name;
    }
}
