<?php
namespace Rrule\Test\TestCase\Model\Behavior;

use Cake\TestSuite\TestCase;
use Rrule\Model\Behavior\SearchableBehavior;

/**
 * Rrule\Model\Behavior\SearchableBehavior Test Case
 */
class SearchableBehaviorTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \Rrule\Model\Behavior\SearchableBehavior
     */
    public $Searchable;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $this->Searchable = new SearchableBehavior();
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Searchable);

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
