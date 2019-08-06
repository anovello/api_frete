<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MotoristaTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MotoristaTable Test Case
 */
class MotoristaTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\MotoristaTable
     */
    public $Motorista;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Motorista'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Motorista') ? [] : ['className' => MotoristaTable::class];
        $this->Motorista = TableRegistry::getTableLocator()->get('Motorista', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Motorista);

        parent::tearDown();
    }

    public function testInserirError()
    {
        $data = [
            'nome' => 'Angelo Augusto Novello',
            'data_nascimento' => date('Y-m-d'),
            'sexo' => 'm',
            'tipo_cnh' => 'A',
            'cpf' => '10278988851'
        ];

        $motoristum = $this->Motorista->newEntity($data);

        $this->Motorista->save($motoristum);
        $this->assertEquals(null, $motoristum->id);
    }

    public function testInserirSuccess()
    {
        $data = [
            'nome' => 'Angelo Augusto Novello',
            'data_nascimento' => '1992-08-08',
            'sexo' => 'm',
            'tipo_cnh' => 'C',
            'cpf' => '40289288851'
        ];

        $motoristum = $this->Motorista->newEntity($data);

        if ($this->Motorista->save($motoristum) ) {
            $ret = true;
        } else {
            $ret = false;
        }

        $this->assertEquals(true, $ret);
    }


    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testAlterarDefault()
    {
        $data = $this->Motorista->find()->where(['id' => 1])->first();

        $data->nome = 'Pedro Novello 2';

        if ($this->Motorista->save($data) ) {
            $ret = true;
        } else {
            $ret = false;
        }

        $this->assertEquals(true, $ret);
    }
}
