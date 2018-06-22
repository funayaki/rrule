<?php
namespace Rrule\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use Rrule\Model\Table\RrulesTable;

/**
 * Rrule\Model\Table\RrulesTable Test Case
 */
class RrulesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \Rrule\Model\Table\RrulesTable
     */
    public $Rrules;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'plugin.rrule.rrules',
        'plugin.rrule.occurrences'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Rrules') ? [] : ['className' => RrulesTable::class];
        $this->Rrules = TableRegistry::get('Rrules', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Rrules);

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
