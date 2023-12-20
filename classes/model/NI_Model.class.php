<?php

class NI_Model extends dbConnection
{
  protected function getIngredients($ingredient = '')
  {
    //what I did originally
    // $sql = "SELECT * from ingredient where ingredient_name like '%$ingredient%'";
    // $ingredient_data = $this->connect()->query($sql);
    // return $ingredient_data;
    
    $input = '%' . $ingredient . '%';
    $sql = "SELECT * from ingredient where ingredient_name like :ingre";
    $stmt = $this->connect()->prepare($sql);
    $stmt->bindParam(':ingre',$input);
    $stmt->execute();
    return $stmt;
  }
}
