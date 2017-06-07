<?php
namespace App\Zoos\Models;

class Recinto extends \App\Models\BaseModel
{
  public  $IdRecinto;

  public $DescricaoRecinto;

  public $NrRecinto;

  public function getSource(){
    return 'Recinto';
  }
}
