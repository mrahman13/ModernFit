<?php

class NInfo_Model extends dbConnection
{
  protected function getIngredients($ingredient)
  {
    $sql = "SELECT * from ingredient where ingredient_name like '%$ingredient%' ORDER BY ingredient_id DESC";
    $ingredient_data = $this->connect()->query($sql);
    return $ingredient_data;
  }
}
