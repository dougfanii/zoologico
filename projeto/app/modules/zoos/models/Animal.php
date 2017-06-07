<?php
namespace App\Zoos\Models;

class Animal extends \App\Models\BaseModel
{
  public $NomeAnimal;

  public $LocalNascAnimal;

  public $PesoAnimal;

  public $AlturaAnimal;

  public $Recinto_IdRecinto;

  public $Especie_IdEspecie;

  public function getSource(){
    return 'Animal';
  }
}
