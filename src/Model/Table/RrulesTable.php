<?php
namespace Rrule\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Rrules Model
 *
 * @property \Rrule\Model\Table\OccurrencesTable|\Cake\ORM\Association\HasMany $Occurrences
 *
 * @method \Rrule\Model\Entity\Rrule get($primaryKey, $options = [])
 * @method \Rrule\Model\Entity\Rrule newEntity($data = null, array $options = [])
 * @method \Rrule\Model\Entity\Rrule[] newEntities(array $data, array $options = [])
 * @method \Rrule\Model\Entity\Rrule|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \Rrule\Model\Entity\Rrule patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \Rrule\Model\Entity\Rrule[] patchEntities($entities, array $data, array $options = [])
 * @method \Rrule\Model\Entity\Rrule findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class RrulesTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('rrules');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
        $this->addBehavior('Rrule.Calendarable');

        $this->hasMany('Occurrences', [
            'foreignKey' => 'rrule_id',
            'className' => 'Rrule.Occurrences',
            'dependent' => true,
            'saveStrategy' => 'replace'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('rrule')
            ->requirePresence('rrule', 'create')
            ->notEmpty('rrule');

        $validator
            ->integer('created_by')
            ->allowEmpty('created_by');

        $validator
            ->integer('modified_by')
            ->allowEmpty('modified_by');

        return $validator;
    }
}
