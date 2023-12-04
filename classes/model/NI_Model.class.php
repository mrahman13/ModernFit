<?php

class NI_Model extends dbConnection
{
  protected function getIngredients($ingredient = '')
  {
    //what aung did originally
    $sql = "SELECT * from ingredient where ingredient_name like '%$ingredient%' ORDER BY ingredient_id DESC";
    $ingredient_data = $this->connect()->query($sql);
    return $ingredient_data;
    
    //my attempt to do the same with prepare statemtn
    // $sql = "SELECT * from ingredient where ingredient_name like %?% ORDER BY ingredient_id DESC";
    // $ingredient_data = $this->connect()->prepare($sql);
    // $ingredient_data->execute([$ingredient]);
    // return $ingredient_data;
  }
}
