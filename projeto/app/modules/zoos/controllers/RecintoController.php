<?php
namespace App\Zoos\Controllers;

use App\Controllers\RESTController;
use App\Zoos\Models\Recinto;

/**
 * Gerencia as requisições para o módulo admin.
 *
 * @package App\Zoo\Controllers
 * @author Otávio Augusto Borges Pinto <otavio@agenciasys.com.br>
 * @copyright Softers Sistemas de Gestão © 2016
 */
class RecintoController extends RESTController
{
    /**
     * Retorna uma lista de Usuários.
     *
     * @access public
     * @return Array Lista de Usuários.
     */
    public function getRecintos()
    {
      try {
      $query = new \Phalcon\Mvc\Model\Query\Builder();
      $query->addFrom('\App\Zoos\Models\Recinto', 'Recinto')
        ->columns(
            [
              'Recinto.*'
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

    public function getRecinto($IdRecinto)
    {
      try{
      $query = new \Phalcon\Mvc\Model\Query\Builder();
      $query->addFrom('App\Zoos\Models\Recinto', 'Recinto')
        ->columns(
            [
              'Recinto.*'
            ]
          )
        ->limit($this->partialFields)
        ->where("IdRecinto = '$IdRecinto'");
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
    public function addRecinto()
    {
        try {
            $recinto = new Recinto();
            $recinto->DescricaoRecinto = $this->di->get('request')->getPost('DescricaoRecinto');

            $recinto->NrRecinto = $this->di->get('request')->getPost('NrRecinto');

            $recinto->saveDB();

            return $recinto;
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
     public function editRecinto($IdRecinto)
     {

         try {

             $recinto = (new Recinto())->findFirst($IdRecinto);

             if (false === $recinto) {
                 throw new \Exception("This record doesn't exist", 200);
             }

             $put = $this->di->get('request')->getPut();

             $recinto->DescricaoRecinto = isset($put['DescricaoRecinto']) ? $put['DescricaoRecinto'] : $recinto->DescricaoRecinto;

             $recinto->NrRecinto = isset($put['NrRecinto']) ? $put['NrRecinto'] : $recinto->NrRecinto;

             $recinto->saveDB();

             return $recinto;
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
    public function deleteRecinto($IdRecinto)
    {
        try {
            $recinto = (new Recinto())->findFirst($IdRecinto);

            if (false === $recinto) {
                throw new \Exception("This record doesn't exist", 200);
            }

            return ['success' => $recinto->delete()];
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage(), $e->getCode());
        }
    }
}
