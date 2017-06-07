<?php
namespace App\Zoos\Models;

/**
 * Model da tabela 'Users'
 *
 * @package App\Users\Models
 * @author Otávio Augusto Borges Pinto <otavio@agenciasys.com.br>
 * @copyright Softers Sistemas de Gestão © 2016
 */
class Zoo extends \App\Models\BaseModel
{
    /**
     * @Primary
     * @Identity
     * @Column(type="integer", length=10, nullable=false)
     */
    public $idZoo;

    /**
     * @Column(type="string", length=70, nullable=false)
     */
    public $nomeZoo;

    /**
     * @Column(type="string", length=70, nullable=false)
     */
    public $enderecoZoo;

    public function getSource(){
      // getSource o que é
      return 'Zoo';
    }

}
