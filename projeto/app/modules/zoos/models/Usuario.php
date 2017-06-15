<?php
namespace App\Zoos\Models;

/**
 * Model da tabela 'Users'
 *
 * @package App\Users\Models
 * @author Otávio Augusto Borges Pinto <otavio@agenciasys.com.br>
 * @copyright Softers Sistemas de Gestão © 2016
 */
class Usuario extends \App\Models\BaseModel
{
    /**
     * @Primary
     * @Identity
     * @Column(type="integer", length=10, nullable=false)
     */
    public $IdUsuario;

    /**
     * @Column(type="string", length=70, nullable=false)
     */
    public $LoginUsuario;

    /**
     * @Column(type="string", length=70, nullable=false)
     */
    public $SenhaUsuario;

    public $PermissaoUsuario;

    public $Funcionario_CdFuncionario;

    public function getSource(){
      // getSource o que é
      return 'Usuario';
    }

}
