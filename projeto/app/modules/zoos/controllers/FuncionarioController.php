<?php
namespace App\Zoos\Controllers;

use App\Controllers\RESTController;
use App\Zoos\Models\Funcionario;

/**
 * Gerencia as requisições para o módulo admin.
 *
 * @package App\Zoo\Controllers
 * @author Otávio Augusto Borges Pinto <otavio@agenciasys.com.br>
 * @copyright Softers Sistemas de Gestão © 2016
 */
class FuncionarioController extends RESTController
{
    /**
     * Retorna uma lista de Usuários.
     *
     * @access public
     * @return Array Lista de Usuários.
     */
    public function getFuncionarios()
    {
      try {
      $query = new \Phalcon\Mvc\Model\Query\Builder();
      $query->addFrom('\App\Zoos\Models\Funcionario', 'Funcionario')
        ->columns(
            [
              'Funcionario.*'
            ]
          )
          ->limit($this->partialFields)
          ->where('true' . $this->getConditions());
        return $query->getQuery()->execute();
      } catch (\Exception $e) {
        throw new \Exception($e->getMessage(),
        $e->getCode());
      }

        // try {
        //     $usuario = (new Usuario())->find(
        //         [
        //             'conditions' => 'true ' . $this->getConditions(),
        //             'columns' => $this->partialFields,
        //             'limit' => $this->limit
        //         ]
        //     );
        //
        //     return $usuario;
        // } catch (\Exception $e) {
        //     throw new \Exception($e->getMessage(), $e->getCode());
        //->limit($this->partialFields)
        // }
    }

    public function getFuncionario($CdFuncionario)
    {
      try{
      $query = new \Phalcon\Mvc\Model\Query\Builder();
      $query->addFrom('App\Zoos\Models\Funcionario', 'Funcionario')
        ->columns(
            [
              'Funcionario.*'
            ]
          )
        ->limit($this->partialFields)
        ->where("CdFuncionario = '$CdFuncionario'");
      return $query->getQuery()->execute();
      } catch (\Exception $e) {
          throw new \Exception($e->getMessage(), $e->getCode());
      }
    }

    /**
     * Adiciona um Usuário.
     *
     * @access public
     * @return Array Usuário.
     */
    public function addFuncionario()
    {
        try {
            $funcionario = new Funcionario();
            $funcionario->NomeFuncionario = $this->di->get('request')->getPost('NomeFuncionario');
            $funcionario->CpfFuncionario = $this->di->get('request')->getPost('CpfFuncionario');
            $funcionario->DtNascFuncionario = $this->di->get('request')->getPost('DtNascFuncionario');
            $funcionario->DtInicioFuncionario = $this->di->get('request')->getPost('DtInicioFuncionario');

            $funcionario->saveDB();

            return $funcionario;
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage(), $e->getCode());
        }
    }

    /**
     * Editar o campo de um Usuário.
     *
     * @access public
     * @return Array.
     */
    public function editFuncionario($CdFuncionario)
    {

        try {

            $funcionario = (new Funcionario())->findFirst($CdFuncionario);

            if (false === $funcionario) {
                throw new \Exception("This record doesn't exist", 200);
            }

            $put = $this->di->get('request')->getPut();

            $funcionario->NomeFuncionario = isset($put['NomeFuncionario']) ? $put['NomeFuncionario'] : $funcionario->NomeFuncionario;

            $funcionario->CpfFuncionario = isset($put['CpfFuncionario']) ? $put['CpfFuncionario'] : $funcionario->CpfFuncionario;

            $funcionario->DtNascFuncionario = isset($put['DtNascFuncionario']) ? $put['DtNascFuncionario'] : $funcionario->DtNascFuncionario;

            $funcionario->DtInicioFuncionario = isset($put['DtInicioFuncionario']) ? $put['DtInicioFuncionario'] : $funcionario->DtInicioFuncionario;

            $funcionario->saveDB();

            return $funcionario;
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage(), $e->getCode());
        }
    }

    /**
     * Remove um Usuário.
     *
     * @access public
     * @return boolean.
     */
    public function deleteFuncionario($CdFuncionario)
    {
        try {
            $funcionario = (new Funcionario())->findFirst($CdFuncionario);

            if (false === $funcionario) {
                throw new \Exception("This record doesn't exist", 200);
            }

            return ['success' => $funcionario->delete()];
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage(), $e->getCode());
        }
    }
}
