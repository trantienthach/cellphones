<?php

class CateProdModel extends Database {
    const TABLE_CATEPROD = "tbl_cateprod" ;

    public function addCateProdNew($dataCateProd)
    {
        return $this->insert(self::TABLE_CATEPROD, $dataCateProd);
    }

    public function checkCateProdExists($cateprod_name)
    {
        $sql = "SELECT `cateprod_id` FROM " . self::TABLE_CATEPROD . " WHERE `cateprod_name` = '{$cateprod_name}'";
        $numRow = $this->getNumRows($sql);
        if($numRow > 0) return true;
        return false;
    }

    public function getCateProdOrderMax() {
        $sql = "SELECT MAX(`cateprod_order`) as `orderMax` FROM " . self::TABLE_CATEPROD ."";
        $CateProdOrderMax = $this->selectRowItem($sql);
        return $CateProdOrderMax['orderMax'] ?? '0';
    }
}