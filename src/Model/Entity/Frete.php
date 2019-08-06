<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Frete Entity
 *
 * @property int $id
 * @property int $motorista_id
 * @property int $veiculo_id
 * @property float $lat_origem
 * @property float $lng_origem
 * @property string $cidade_origem
 * @property string $estado_origem
 * @property float $lat_destino
 * @property float $lng_destino
 * @property string $cidade_destino
 * @property string $estado_destino
 * @property int $tempo
 * @property int $distancia
 * @property bool $ida
 *
 * @property \App\Model\Entity\Motoristum $motoristum
 * @property \App\Model\Entity\Veiculo $veiculo
 */
class Frete extends Entity
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
        'veiculo_id' => true,
        'lat_origem' => true,
        'lng_origem' => true,
        'cidade_origem' => true,
        'estado_origem' => true,
        'lat_destino' => true,
        'lng_destino' => true,
        'cidade_destino' => true,
        'estado_destino' => true,
        'tempo' => true,
        'distancia' => true,
        'frete_id_ida' => true,
        'motoristum' => true,
        'veiculo' => true,
        'data' => true
    ];
}
