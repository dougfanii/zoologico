<?php

namespace App\Visitantes\Controllers;

use App\Controllers\RESTController;
use App\Visitantes\Models\Visitante;

/**
 * Gerencia as requisições para o módulo admin.
 *
 * @package App\Zoo\Controllers
 * @author Otávio Augusto Borges Pinto <otaviwo@agenciasys.com.br>
 * @copyright Softers Sistemas de Gestão © 2016
 */

class VisitanteController extends RESTController
{
    /**
     * Retorna uma lista de Usuários.
     *
     * @access public
     * @return Array Lista de Usuários.
     */
    public function getVisitantes()
    {
        try {
            $query = new \Phalcon\Mvc\Model\Query\Builder();
            $query->addFrom('\App\Visitantes\Models\Visitante', 'Visitante')
            // Seleção da tabela
              ->columns(
                [
                  'Visitante.*', 'Visita.*'
                ]
              )
              ->leftJoin('\App\Visitantes\Models\Visita', 'Visita.Visitante_IdVisitante = Visitante.IdVisitante', 'Visita')
              ->limit($this->partialFields)
              ->where('true ' . $this->getConditions());
            return $query->getQuery()->execute();
            } catch (\Exception $e) {
              throw new \Exception($e->getMessage(),
              $e->getCode());
            }
        //     $visitante = (new Visitante())->find(
        //         [
        //             'conditions' => 'true ' . $this->getConditions(),
        //             'columns' => $this->partialFields,
        //             'limit' => $this->limit
        //         ]
        //     );
        //
        //     return $visitante;
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
    public function getVisitante($IdVisitante)
    {
        try {
            $visitante = (new Visitante())->findFirst(
                [
                    'conditions' => "IdVisitante = '$IdVisitante'",
                    'columns' => $this->partialFields,
                ]
            );

            return $visitante;
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
    public function addVisitante()
    {
        try {
            $visitante = new Visitante();
            $visitante->NomeVisitante = $this->di->get('request')->getPost('NomeVisitante');
            $visitante->DtNascVisitante = $this->di->get('request')->getPost('DtNascVisitante');

            $visitante->saveDB();

            return $visitante;
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
    public function editVisitante($IdZoo)
    {

        try {

            $visitante = (new Visitante())->findFirst($IdZoo);

            if (false === $visitante) {
                throw new \Exception("This record doesn't exist", 200);
            }

            // $NomeVisitante = $this->di->get('request')->getPut('NomeVisitante');
            // $visitante->NomeVisitante = $NomeVisitante;
            //

            $put = $this->di->get('request')->getPut();

            $visitante->NomeVisitante = isset($put['NomeVisitante']) ? $put['NomeVisitante'] : $visitante->NomeVisitante;

            $visitante->DtNascVisitante = isset($put['DtNascVisitante']) ? $put['DtNascVisitante'] : $visitante->DtNascVisitante;

            // $DtNascVisitante = $this->di->get('request')->getPut('DtNascVisitante');
            // $visitante->DtNascVisitante = $DtNascVisitante;

            $visitante->saveDB();

            return $visitante;
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
    public function deleteVisitante($IdVisitante)
    {
        try {
            $visitante = (new Visitante())->findFirst($IdVisitante);

            if (false === $visitante) {
                throw new \Exception("This record doesn't exist", 200);
            }

            return ['success' => $visitante->delete()];
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage(), $e->getCode());
        }
    }
}
