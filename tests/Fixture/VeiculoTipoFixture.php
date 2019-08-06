<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * VeiculoTipoFixture
 */
class VeiculoTipoFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'veiculo_tipo';
    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'nome' => ['type' => 'string', 'length' => 50, 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'latin1_swedish_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd
    /**
     * Init method
     *
     * @return void
     */
    public function init()
    {
        $this->records = [
            [
                'id' => 1,
                'nome' => 'Caminhão 3/4'
            ],
            [
                'id' => 2,
                'nome' => 'Caminhão Toco'
            ],
            [
                'id' => 3,
                'nome' => 'Caminhão Truck'
            ],
            [
                'id' => 4,
                'nome' => 'Carreta Simples'
            ],
            [
                'id' => 5,
                'nome' => 'Carreta Eixo Extendido'
            ]
        ];
        parent::init();
    }
}
