<?php
namespace App\Zoos\Controllers;

use App\Controllers\RESTController;
use App\Zoos\Models\Usuario;

/**
 * Gerencia as requisições para o módulo admin.
 *
 * @package App\Zoo\Controllers
 * @author Otávio Augusto Borges Pinto <otavio@agenciasys.com.br>
 * @copyright Softers Sistemas de Gestão © 2016
 */
class UsuarioController extends RESTController
{
    /**
     * Retorna uma lista de Usuários.
     *
     * @access public
     * @return Array Lista de Usuários.
     */
    public function getUsuarios()
    {
      // var_dump('true' . $this->getConditions());
      // exit();
      try {
      $query = new \Phalcon\Mvc\Model\Query\Builder();
      $query->addFrom('\App\Zoos\Models\Usuario', 'Usuario')
        ->columns(
            [
              'Usuario.idUsuario',
              'Usuario.loginUsuario',
              'Usuario.senhaUsuario',
              'Usuario.permissaoUsuario',
              'Usuario.Funcionario_cdFuncionario',
              'Funcionario.cdFuncionario'
            ]
          )
          ->innerJoin('\App\Zoos\Models\Funcionario', 'Usuario.Funcionario_cdFuncionario = Funcionario.cdFuncionario', 'Funcionario')
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
        // }
    }

    /**
     * Retorna um Usuário.
     *
     * @access public
     * @return Array Usuário.
     */
    public function getUsuario($IdUsuario)
    {
      try{
      $query = new \Phalcon\Mvc\Model\Query\Builder();
      $query->addFrom('App\Zoos\Models\Usuario', 'Usuario')
        ->columns(
            [
              'Usuario.*'
            ]
          )
        ->limit($this->partialFields)
        ->where("IdUsuario = '$IdUsuario'");
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
    public function addUsuario()
    {
        try {
            $usuario = new Usuario();
            $usuario->loginUsuario = $this->di->get('request')->getPost('loginUsuario');
            $usuario->senhaUsuario = $this->di->get('request')->getPost('senhaUsuario');
            $usuario->permissaoUsuario = $this->di->get('request')->getPost('permissaoUsuario');
            $usuario->Funcionario_cdFuncionario = $this->di->get('request')->getPost('Funcionario_cdFuncionario');

            $usuario->saveDB();

            return $usuario;
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
    public function editUsuario($IdUsuario)
    {

        try {

            $usuario = (new Usuario())->findFirst($IdUsuario);

            if (false === $usuario) {
                throw new \Exception("This record doesn't exist", 200);
            }

            $put = $this->di->get('request')->getPut();

            $usuario->loginUsuario = isset($put['LoginUsuario']) ? $put['LoginUsuario'] : $usuario->loginUsuario;

            $usuario->senhaUsuario = isset($put['SenhaUsuario']) ? $put['SenhaUsuario'] : $usuario->senhaUsuario;

            $usuario->permissaoUsuario = isset($put['PermissaoUsuario']) ? $put['PermissaoUsuario'] : $usuario->permissaoUsuario;

            $usuario->Funcionario_cdFuncionario = isset($put['Funcionario_cdFuncionario']) ? $put['Funcionario_cdFuncionario'] : $usuario->Funcionario_cdFuncionario;

            $usuario->saveDB();

            return $usuario;
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
    public function deleteUsuario($IdUsuario)
    {
        try {
            $usuario = (new Usuario())->findFirst($IdUsuario);

            if (false === $usuario) {
                throw new \Exception("This record doesn't exist", 200);
            }

            return ['success' => $usuario->delete()];
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage(), $e->getCode());
        }
    }
}
