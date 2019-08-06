<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * VeiculoFixture
 */
class VeiculoFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'veiculo';
    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'motorista_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'placa' => ['type' => 'string', 'length' => 7, 'null' => false, 'default' => '', 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'marca' => ['type' => 'string', 'length' => 50, 'null' => false, 'default' => '', 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'modelo' => ['type' => 'string', 'length' => 50, 'null' => false, 'default' => '', 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'veiculo_tipo_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'FK__motorista' => ['type' => 'index', 'columns' => ['motorista_id'], 'length' => []],
            'FK__veiculo_tipo' => ['type' => 'index', 'columns' => ['veiculo_tipo_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'FK__motorista' => ['type' => 'foreign', 'columns' => ['motorista_id'], 'references' => ['motorista', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'FK__veiculo_tipo' => ['type' => 'foreign', 'columns' => ['veiculo_tipo_id'], 'references' => ['veiculo_tipo', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
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
                'placa' => 'AAA1010',
                'marca' => 'M.Benz',
                'modelo' => 'L1513',
                'veiculo_tipo_id' => 1
            ],
        ];
        parent::init();
    }
}
