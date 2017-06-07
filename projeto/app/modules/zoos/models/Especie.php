<?php
namespace App\Zoos\Models;

class Especie extends \App\Models\BaseModel
{
  public  $IdEspecie;

  public $NomeEspecie;

  public function getSource(){
    return 'Especie';
  }
}
