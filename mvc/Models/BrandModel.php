<?php

class BrandModel extends Database {
    const TABLE_BRAND = "tbl_brand" ;

    public function getOrderMax() {
        $sql = "SELECT MAX(`brand_order`) as `orderMax` FROM " . self::TABLE_BRAND ."";
        $brandOrderMax = $this->selectRowItem($sql);
        return $brandOrderMax['orderMax'] ?? '0';
    }

    public function addBrandNew($dataBrand)
    {
        return $this->insert(self::TABLE_BRAND, $dataBrand);
    }

    public function checkBrandExists($brand_name)
    {
        $sql = "SELECT `brand_id` FROM " . self::TABLE_BRAND . " WHERE `brand_name` = '{$brand_name}'";
        $numRow = $this->getNumRows($sql);
        if($numRow > 0) return true;
        return false;
    }


}