<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * FreteFixture
 */
class FreteFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'frete';
    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'motorista_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'veiculo_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'lat_origem' => ['type' => 'float', 'length' => null, 'precision' => null, 'unsigned' => false, 'null' => false, 'default' => '0', 'comment' => ''],
        'lng_origem' => ['type' => 'float', 'length' => null, 'precision' => null, 'unsigned' => false, 'null' => false, 'default' => '0', 'comment' => ''],
        'cidade_origem' => ['type' => 'string', 'length' => 100, 'null' => false, 'default' => '', 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'estado_origem' => ['type' => 'string', 'length' => 100, 'null' => false, 'default' => '', 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'lat_destino' => ['type' => 'float', 'length' => null, 'precision' => null, 'unsigned' => false, 'null' => false, 'default' => '0', 'comment' => ''],
        'lng_destino' => ['type' => 'float', 'length' => null, 'precision' => null, 'unsigned' => false, 'null' => false, 'default' => '0', 'comment' => ''],
        'cidade_destino' => ['type' => 'string', 'length' => 100, 'null' => false, 'default' => '', 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'estado_destino' => ['type' => 'string', 'length' => 100, 'null' => false, 'default' => '', 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'tempo' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'distancia' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'frete_id_ida' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'data' => ['type' => 'date', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        '_indexes' => [
            'FK_frete_motorista' => ['type' => 'index', 'columns' => ['motorista_id'], 'length' => []],
            'FK_frete_veiculo' => ['type' => 'index', 'columns' => ['veiculo_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'FK_frete_motorista' => ['type' => 'foreign', 'columns' => ['motorista_id'], 'references' => ['motorista', 'id'], 'update' => 'cascade', 'delete' => 'restrict', 'length' => []],
            'FK_frete_veiculo' => ['type' => 'foreign', 'columns' => ['veiculo_id'], 'references' => ['veiculo', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
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
                'motorista_id' => 1,
                'veiculo_id' => 1,
                'lat_origem' => 1,
                'lng_origem' => 1,
                'cidade_origem' => 'Lorem ipsum dolor sit amet',
                'estado_origem' => 'Lorem ipsum dolor sit amet',
                'lat_destino' => 1,
                'lng_destino' => 1,
                'cidade_destino' => 'Lorem ipsum dolor sit amet',
                'estado_destino' => 'Lorem ipsum dolor sit amet',
                'tempo' => 1,
                'distancia' => 1,
                'frete_id_ida' => 1,
                'data' => '2019-08-06'
            ],
        ];
        parent::init();
    }
}
