<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Motoristum Entity
 *
 * @property int $id
 * @property string $nome
 * @property \Cake\I18n\FrozenDate $data_nascimento
 * @property string $sexo
 * @property string $tipo_cnh
 */
class Motoristum extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'nome' => true,
        'data_nascimento' => true,
        'sexo' => true,
        'tipo_cnh' => true,
        'cpf' => true
    ];
}
