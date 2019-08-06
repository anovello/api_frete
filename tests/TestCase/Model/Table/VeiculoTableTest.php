<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\VeiculoTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\VeiculoTable Test Case
 */
class VeiculoTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\VeiculoTable
     */
    public $Veiculo;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Veiculo',
        'app.Motorista',
        'app.VeiculoTipo',
        'app.Frete'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Veiculo') ? [] : ['className' => VeiculoTable::class];
        $this->Veiculo = TableRegistry::getTableLocator()->get('Veiculo', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Veiculo);

        parent::tearDown();
    }

    public function testInserirError()
    {
        $data = [
            'motorista_id' => 1,
            'modelo' => 'Cargo',
            'veiculo_tipo_id' => 4
        ];

        $veiculo = $this->Veiculo->newEntity($data);
        $this->Veiculo->save($veiculo);

        $this->assertEquals(null, $veiculo->id);
    }

    public function testInserirSuccess()
    {
        $data = [
            'motorista_id' => 1,
            'placa' => 'KKK1234',
            'marca' => 'FORD',
            'modelo' => 'Cargo',
            'veiculo_tipo_id' => 4
        ];

        $veiculo = $this->Veiculo->newEntity($data);

        if ( $this->Veiculo->save($veiculo)) {
            $ret = true;
        } else {
            $ret = false;
        }
        $this->assertEquals(true, $ret);
    }
}
