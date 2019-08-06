<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FreteTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FreteTable Test Case
 */
class FreteTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\FreteTable
     */
    public $Frete;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Frete',
        'app.Motorista',
        'app.Veiculo'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Frete') ? [] : ['className' => FreteTable::class];
        $this->Frete = TableRegistry::getTableLocator()->get('Frete', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Frete);

        parent::tearDown();
    }

    public function testInserirSuccess()
    {
        $data = [
            'motorista_id' => 1,
            'veiculo_id' => 1,
            'lat_origem' => '-22.973275',
            'lng_origem' => '-49.856824',
            'cidade_origem' => 'OURINHOS',
            'estado_origem' => 'SP',
            'lat_destino' => '-23.618022',
            'lng_destino' => '-46.643939',
            'cidade_origem' => 'SÃO PAULO',
            'estado_destino' => 'SP',
            'tempo' => '250',
            'distancia' => '375',
            'frete_id_ida' => '0',
            'data' => '2019-08-06'
        ];

        $frete = $this->Frete->newEntity($data);

        if ($this->Frete->save($frete)) {
            $ret = true;
        } else {
            $ret = false;
        }

        $this->assertEquals(null, $frete->id);
    }

    public function testInserirError()
    {
        $data = [
            'motorista_id' => 1,
            'veiculo_id' => 1,
            'lat_origem' => '-22.973275',
            'lng_origem' => '-49.856824',
            'cidade_origem' => 'OURINHOS',
            'estado_origem' => 'SP',
            'lat_destino' => '-23.618022',
            'estado_destino' => 'SP',
            'tempo' => '250',
            'distancia' => '375',
            'frete_id_ida' => '0',
            'data' => '2019-08-06'
        ];

        $frete = $this->Frete->newEntity($data);

        $this->Frete->save($frete);
        $this->assertEquals(null, $frete->id);
    }
}
