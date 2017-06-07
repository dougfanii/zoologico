<?php

namespace App\Visitantes\Controllers;

use App\Controllers\RESTController;
use App\Visitantes\Models\Visita;

/**
 * Gerencia as requisições para o módulo admin.
 *
 * @package App\Zoo\Controllers
 * @author Otávio Augusto Borges Pinto <otavio@agenciasys.com.br>
 * @copyright Softers Sistemas de Gestão © 2016
 */
class VisitaController extends RESTController
{

    /**
     * Retorna uma lista de Usuários.
     *
     * @access public
     * @return Array Lista de Usuários.
     */
    public function getVisitas()
    {
        try {
            $visita = (new Visita())->find(
                [
                    'conditions' => 'true ' . $this->getConditions(),
                    'columns' => $this->partialFields,
                    'limit' => $this->limit
                ]
            );

            return $visita;
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
    public function getVisita($IdVisita)
    {
        try {
            $visita = (new Visita())->findFirst(
                [
                    'conditions' => "IdVisita = '$IdVisita'",
                    'columns' => $this->partialFields,
                ]
            );

            return $visita;
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
    public function addVisita()
    {
        try {
            $visita = new Visita();
            $visita->DtVisita = $this->di->get('request')->getPost('DtVisita');
            $visita->Visitante_IdVisitante = $this->di->get('request')->getPost('Visitante_IdVisitante');

            $visita->saveDB();

            return $visita;
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
    public function editVisita($IdVisita)
    {

        try {

            $visita = (new Visita())->findFirst($IdVisita);

            if (false === $visita) {
                throw new \Exception("This record doesn't exist", 200);
            }

            $put = $this->di->get('request')->getPut();

            $visita->DtVisita = isset($put['DtVisita']) ? $put['DtVisita'] : $visita->DtVisita;

            $visita->Visitante_IdVisitante = isset($put['Visitante_IdVisitante']) ? $put['Visitante_IdVisitante'] : $visita->Visitante_IdVisitante;

            $visita->saveDB();

            return $visita;
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
    public function deleteVisita($IdVisita)
    {
        try {
            $visita = (new Visita())->findFirst($IdVisita);

            if (false === $visita) {
                throw new \Exception("This record doesn't exist", 200);
            }

            return ['success' => $visita->delete()];
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage(), $e->getCode());
        }
    }
}
