<?php
namespace Rrule\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Occurrences Model
 *
 * @property \Rrule\Model\Table\RrulesTable|\Cake\ORM\Association\BelongsTo $Rrules
 *
 * @method \Rrule\Model\Entity\Occurrence get($primaryKey, $options = [])
 * @method \Rrule\Model\Entity\Occurrence newEntity($data = null, array $options = [])
 * @method \Rrule\Model\Entity\Occurrence[] newEntities(array $data, array $options = [])
 * @method \Rrule\Model\Entity\Occurrence|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \Rrule\Model\Entity\Occurrence patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \Rrule\Model\Entity\Occurrence[] patchEntities($entities, array $data, array $options = [])
 * @method \Rrule\Model\Entity\Occurrence findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class OccurrencesTable extends Table
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

        $this->setTable('occurrences');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Rrules', [
            'foreignKey' => 'rrule_id',
            'joinType' => 'INNER',
            'className' => 'Rrule.Rrules'
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
            ->allowEmpty('id', 'create');

        $validator
            ->dateTime('start_on')
            ->requirePresence('start_on', 'create')
            ->notEmpty('start_on');

        $validator
            ->dateTime('end_on')
            ->requirePresence('end_on', 'create')
            ->notEmpty('end_on');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['rrule_id'], 'Rrules'));

        return $rules;
    }
}
