<?php

class NI_Model extends dbConnection
{
  protected function getIngredients($ingredient = '')
  {    
    $input = '%' . $ingredient . '%';
    $sql = "SELECT * from ingredient where ingredient_name like ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->bindParam(1, $input);
    $stmt->execute();
    return $stmt;
  }
}
