<?php
namespace Rrule\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * OccurrencesFixture
 *
 */
class OccurrencesFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'biginteger', 'length' => 20, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'rrule_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'start_on' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'end_on' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        '_indexes' => [
            'rrule_id' => ['type' => 'index', 'columns' => ['rrule_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8mb4_general_ci'
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
                'rrule_id' => 1,
                'created' => '2018-06-22 13:42:31',
                'modified' => '2018-06-22 13:42:31',
                'start_on' => '2018-06-22 13:42:31',
                'end_on' => '2018-06-22 13:42:31'
            ],
        ];
        parent::init();
    }
}
