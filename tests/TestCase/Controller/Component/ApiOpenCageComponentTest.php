<?php
namespace App\Test\TestCase\Controller\Component;

use App\Controller\Component\ApiOpenCageComponent;
use Cake\Controller\ComponentRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\Component\ApiOpenCageComponent Test Case
 */
class ApiOpenCageComponentTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Controller\Component\ApiOpenCageComponent
     */
    public $ApiOpenCage;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $registry = new ComponentRegistry();
        $this->ApiOpenCage = new ApiOpenCageComponent($registry);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ApiOpenCage);

        parent::tearDown();
    }

    /**
     * Test initial setup
     *
     * @return void
     */
    public function testInitialization()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
