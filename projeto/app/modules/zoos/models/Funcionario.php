<?php
namespace App\Zoos\Models;

class Funcionario extends \App\Models\BaseModel
{
  public $CdFuncionario;

  public $NomeFuncionario;

  public $CpfFuncionario;

  public $DtNascFuncionario;

  public $DtInicioFuncionario;

  public function getSource(){
    return 'Funcionario';
  }
}
