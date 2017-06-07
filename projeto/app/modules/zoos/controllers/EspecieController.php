<?php
namespace App\Zoos\Controllers;

use App\Controllers\RESTController;
use App\Zoos\Models\Especie;

/**
 * Gerencia as requisições para o módulo admin.
 *
 * @package App\Zoo\Controllers
 * @author Otávio Augusto Borges Pinto <otavio@agenciasys.com.br>
 * @copyright Softers Sistemas de Gestão © 2016
 */
class EspecieController extends RESTController
{
    /**
     * Retorna uma lista de Usuários.
     *
     * @access public
     * @return Array Lista de Usuários.
     */
    public function getEspecies()
    {
      try {
      $query = new \Phalcon\Mvc\Model\Query\Builder();
      $query->addFrom('\App\Zoos\Models\Especie', 'Especie')
        ->columns(
            [
              'Especie.*'
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

    public function getEspecie($IdEspecie)
    {
      try{
      $query = new \Phalcon\Mvc\Model\Query\Builder();
      $query->addFrom('App\Zoos\Models\Especie', 'Especie')
        ->columns(
            [
              'Especie.*'
            ]
          )
        ->limit($this->partialFields)
        ->where("IdEspecie = '$IdEspecie'");
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
    public function addEspecie()
    {
        try {
            $especie = new Especie();
            $especie->NomeEspecie = $this->di->get('request')->getPost('NomeEspecie');

            $especie->saveDB();

            return $especie;
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
    public function editEspecie($IdEspecie)
    {

        try {

            $especie = (new Especie())->findFirst($IdEspecie);

            if (false === $especie) {
                throw new \Exception("This record doesn't exist", 200);
            }

            $put = $this->di->get('request')->getPut();

            $especie->NomeEspecie = isset($put['NomeEspecie']) ? $put['NomeEspecie'] : $especie->NomeEspecie;

            $especie->saveDB();

            return $especie;
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
    public function deleteEspecie($IdEspecie)
    {
        try {
            $especie = (new Especie())->findFirst($IdEspecie);

            if (false === $especie) {
                throw new \Exception("This record doesn't exist", 200);
            }

            return ['success' => $especie->delete()];
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage(), $e->getCode());
        }
    }
}
