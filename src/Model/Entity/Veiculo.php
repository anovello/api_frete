<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Veiculo Entity
 *
 * @property int $id
 * @property int|null $motorista_id
 * @property string $marca
 * @property string $modelo
 * @property int $veiculo_tipo_id
 *
 * @property \App\Model\Entity\Motoristum $motoristum
 * @property \App\Model\Entity\VeiculoTipo $veiculo_tipo
 * @property \App\Model\Entity\Frete[] $frete
 */
class Veiculo extends Entity
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
        'motorista_id' => true,
        'placa' => true,
        'marca' => true,
        'modelo' => true,
        'veiculo_tipo_id' => true,
        'motoristum' => true,
        'veiculo_tipo' => true,
        'frete' => true
    ];
}
