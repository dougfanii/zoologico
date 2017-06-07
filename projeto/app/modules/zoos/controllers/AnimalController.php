<?php
namespace App\Zoos\Controllers;

use App\Controllers\RESTController;
use App\Zoos\Models\Animal;

/**
 * Gerencia as requisições para o módulo admin.
 *
 * @package App\Zoo\Controllers
 * @author Otávio Augusto Borges Pinto <otavio@agenciasys.com.br>
 * @copyright Softers Sistemas de Gestão © 2016
 */
class AnimalController extends RESTController
{
    /**
     * Retorna uma lista de Usuários.
     *
     * @access public
     * @return Array Lista de Usuários.
     */
    public function getAnimais()
    {
      try {
      $query = new \Phalcon\Mvc\Model\Query\Builder();
      $query->addFrom('\App\Zoos\Models\Animal', 'Animal')
        ->columns(
            [
              'Animal.*, Especie.*, Recinto.*'
            ]
          )
          ->innerJoin('\App\Zoos\Models\Especie', 'Animal.Especie_IdEspecie = Especie.IdEspecie', 'Especie')
          ->innerJoin('\App\Zoos\Models\Recinto', 'Animal.Recinto_IdRecinto = Recinto.IdRecinto', 'Recinto')
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

    public function getAnimal($IdAnimal)
    {
      try{
      $query = new \Phalcon\Mvc\Model\Query\Builder();
      $query->addFrom('App\Zoos\Models\Animal', 'Animal')
        ->columns(
            [
              'Animal.*, Especie.*, Recinto.*'
            ]
          )
        ->innerJoin('\App\Zoos\Models\Especie', 'Animal.Especie_IdEspecie = Especie.IdEspecie', 'Especie')
        ->innerJoin('\App\Zoos\Models\Recinto', 'Animal.Recinto_IdRecinto = Recinto.IdRecinto', 'Recinto')
        ->limit($this->partialFields)
        ->where("IdAnimal = '$IdAnimal'");
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
    public function addAnimal()
    {
        try {
            $animal = new Animal();

            $animal->NomeAnimal = $this->di->get('request')->getPost('NomeAnimal');

            $animal->LocalNascAnimal = $this->di->get('request')->getPost('LocalNascAnimal');

            $animal->PesoAnimal = $this->di->get('request')->getPost('PesoAnimal');

            $animal->AlturaAnimal = $this->di->get('request')->getPost('NomeAnimal');

            $animal->Recinto_IdRecinto = $this->di->get('request')->getPost('Recinto_IdRecinto');

            $animal->Especie_IdEspecie = $this->di->get('request')->getPost('Especie_IdEspecie');


            $animal->saveDB();

            return $animal;
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
    public function editAnimal($IdAnimal)
    {

        try {

            $animal = (new Animal())->findFirst($IdAnimal);

            if (false === $animal) {
                throw new \Exception("This record doesn't exist", 200);
            }

            $put = $this->di->get('request')->getPut();

            $animal->NomeAnimal = isset($put['NomeAnimal']) ? $put['NomeAnimal'] : $animal->NomeAnimal;

            $animal->LocalNascAnimal = isset($put['LocalNascAnimal']) ? $put['LocalNascAnimal'] : $animal->LocalNascAnimal;

            $animal->PesoAnimal = isset($put['PesoAnimal']) ? $put['PesoAnimal'] : $animal->PesoAnimal;

            $animal->AlturaAnimal = isset($put['AlturaAnimal']) ? $put['AlturaAnimal'] : $animal->AlturaAnimal;

            $animal->Especie_IdEspecie = isset($put['Especie_IdEspecie']) ? $put['Especie_IdEspecie'] : $animal->Especie_IdEspecie;

            $animal->Recinto_IdRecinto = isset($put['Recinto_IdRecinto']) ? $put['Recinto_IdRecinto'] : $animal->Recinto_IdRecinto;

            $animal->saveDB();

            return $animal;
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
    public function deleteAnimal($IdAnimal)
    {
        try {
            $animal = (new Animal())->findFirst($IdAnimal);

            if (false === $animal) {
                throw new \Exception("This record doesn't exist", 200);
            }

            return ['success' => $animal->delete()];
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage(), $e->getCode());
        }
    }
}
