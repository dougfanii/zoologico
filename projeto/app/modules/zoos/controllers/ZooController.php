<?php

namespace App\Zoos\Controllers;

use App\Controllers\RESTController;
use App\Zoos\Models\Zoo;

/**
 * Gerencia as requisições para o módulo admin.
 *
 * @package App\Zoo\Controllers
 * @author Otávio Augusto Borges Pinto <otavio@agenciasys.com.br>
 * @copyright Softers Sistemas de Gestão © 2016
 */
class ZooController extends RESTController
{
    /**
     * Retorna uma lista de Usuários.
     *
     * @access public
     * @return Array Lista de Usuários.
     */
    public function getZoos()
    {
        try {
            $zoo = (new Zoo())->find(
                [
                    'conditions' => 'true ' . $this->getConditions(),
                    'columns' => $this->partialFields,
                    'limit' => $this->limit,
                    'order' => 'idZoo'
                ]
            );

            return $zoo;
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage(), $e->getCode());
        }
    }

    /**
     * Retorna um Usuário.
     *
     * @access public
     * @return Array Usuário.
     */
    public function getZoo($idZoo)
    {
        try {
            $zoo = (new Zoo())->findFirst(
                [
                    'conditions' => "idZoo = '$idZoo'",
                    'columns' => $this->partialFields,
                ]
            );

            return $zoo;
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
    public function addZoo()
    {
        try {
            $zoo = new Zoo();
            $zoo->nomeZoo = $this->di->get('request')->getPost('nomeZoo');
            $zoo->enderecoZoo = $this->di->get('request')->getPost('enderecoZoo');

            $zoo->saveDB();

            return $zoo;
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
    public function editZoo($idZoo)
    {

        try {

            $zoo = (new Zoo())->findFirst($idZoo);

            if (false === $zoo) {
                throw new \Exception("This record doesn't exist", 200);
            }
            $nomeZoo = $this->di->get('request')->getPut('nomeZoo');
            $zoo->nomeZoo = isset($nomeZoo) ? $nomeZoo : $zoo->nomeZoo;

            $enderecoZoo = $this->di->get('request')->getPut('enderecoZoo');
            $zoo->enderecoZoo = isset($enderecoZoo) ? $enderecoZoo : $zoo->enderecoZoo;

            $zoo->saveDB();

            return $zoo;
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
    public function deleteZoo($idZoo)
    {
        try {
            $zoo = (new Zoo())->findFirst($idZoo);

            if (false === $zoo) {
                throw new \Exception("This record doesn't exist", 200);
            }

            return ['success' => $zoo->delete()];
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage(), $e->getCode());
        }
    }
}
