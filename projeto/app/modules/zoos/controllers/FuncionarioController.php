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
        ->where("cdFuncionario = '$CdFuncionario'");
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
            $funcionario->nomeFuncionario = $this->di->get('request')->getPost('nomeFuncionario');
            $funcionario->cpfFuncionario = $this->di->get('request')->getPost('cpfFuncionario');
            $funcionario->dtNascFuncionario = $this->di->get('request')->getPost('dtNascFuncionario');
            $funcionario->dtInicioFuncionario = $this->di->get('request')->getPost('dtInicioFuncionario');

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

            $funcionario->nomeFuncionario = isset($put['nomeFuncionario']) ? $put['nomeFuncionario'] : $funcionario->nomeFuncionario;

            $funcionario->cpfFuncionario = isset($put['cpfFuncionario']) ? $put['cpfFuncionario'] : $funcionario->cpfFuncionario;

            $funcionario->dtNascFuncionario = isset($put['dtNascFuncionario']) ? $put['dtNascFuncionario'] : $funcionario->dtNascFuncionario;

            $funcionario->dtInicioFuncionario = isset($put['dtInicioFuncionario']) ? $put['dtInicioFuncionario'] : $funcionario->dtInicioFuncionario;

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
