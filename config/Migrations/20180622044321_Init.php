<?php
use Migrations\AbstractMigration;

class Init extends AbstractMigration
{
    public function up()
    {

        $this->table('occurrences', ['id' => false, 'primary_key' => ['id']])
            ->addColumn('id', 'biginteger', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 20,
                'null' => false,
            ])
            ->addColumn('rrule_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('start_on', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('end_on', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addIndex(
                [
                    'rrule_id',
                ]
            )
            ->create();

        $this->table('rrules')
            ->addColumn('rrule', 'text', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('created_by', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ])
            ->addColumn('modified_by', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ])
            ->addIndex(
                [
                    'created_by',
                ]
            )
            ->addIndex(
                [
                    'modified_by',
                ]
            )
            ->create();
    }

    public function down()
    {
        $this->dropTable('occurrences');
        $this->dropTable('rrules');
    }
}
