<?php

class NI_View extends NI_Model{

  public function showIngredients($ingredient){
    $ingredient_data = $this->getIngredients($ingredient);
    $obj = $ingredient_data->fetch();
    return $obj;
  }
}