<?php
namespace App\Visitantes\Models;

/**
 * Model da tabela 'Users'
 *
 * @package App\Users\Models
 * @author Otávio Augusto Borges Pinto <otavio@agenciasys.com.br>
 * @copyright Softers Sistemas de Gestão © 2016
 */
class Visita extends \App\Models\BaseModel
{
    /**
     * @Primary
     * @Identity
     * @Column(type="integer", length=10, nullable=false)
     */
    public $IdVisita;

    /**
     * @Column(type="string", length=70, nullable=false)
     */
    public $DtVisita;

    /**
     * @Column(type="string", length=70, nullable=false)
     */
    public $Visitante_IdVisitante;

    public function getSource(){
      // getSource o que é
      return 'Visita';
    }

}
