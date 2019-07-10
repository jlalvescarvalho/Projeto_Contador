<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PlanilhaTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PlanilhaTable Test Case
 */
class PlanilhaTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PlanilhaTable
     */
    public $Planilha;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Planilha'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Planilha') ? [] : ['className' => PlanilhaTable::class];
        $this->Planilha = TableRegistry::getTableLocator()->get('Planilha', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Planilha);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
