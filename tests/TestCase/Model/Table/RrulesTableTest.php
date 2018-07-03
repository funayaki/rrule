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

    public function testStringRrule()
    {
        // New
        $rrule = $this->Rrules->newEntity();
        $rrule->rrule = 'FREQ=YEARLY;INTERVAL=1;BYMONTH=1;BYMONTHDAY=1;COUNT=1';
        $success = $this->Rrules->save($rrule);
        $this->assertTrue((bool)$success);
        $this->assertEquals(1, count($success->occurrences));
    }

    public function testReplaceStrategy()
    {
        // New
        $rrule = $this->Rrules->newEntity();
        $rrule->rrule = 'FREQ=YEARLY;INTERVAL=1;BYMONTH=1;BYMONTHDAY=1;COUNT=1';
        $success = $this->Rrules->save($rrule);
        $this->assertTrue((bool)$success);

        // Update
        $rrule->rrule = 'FREQ=MONTHLY;INTERVAL=1;BYMONTHDAY=1;COUNT=12';
        $success = $this->Rrules->save($rrule);
        $this->assertTrue((bool)$success);
        $this->assertEquals(12, count($success->occurrences));
    }

    public function testDeletingAssociatedOccurrences()
    {
        $rrule = $this->Rrules->get(1);
        $this->Rrules->delete($rrule);
        $exists = $this->Rrules->Occurrences->exists(['id' => 1]);
        $this->assertFalse($exists);
    }
}
