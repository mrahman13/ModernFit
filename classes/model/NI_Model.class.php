<?php

class NI_Model extends dbConnection
{
  protected function getIngredients($ingredient = '')
  {
    $query = "SELECT * from ingredient where ingredient_name like ? ORDER BY ingredient_id DESC";
    $stmt = $this->connect()->prepare($query);
    $stmt->execute(["%$ingredient%"]);
    return $stmt;
  }
}
