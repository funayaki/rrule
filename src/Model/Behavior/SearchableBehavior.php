<?php
namespace RRule\Model\Behavior;

use ArrayObject;
use Cake\Core\Exception\Exception;
use Cake\Datasource\EntityInterface;
use Cake\Datasource\Exception\MissingModelException;
use Cake\Event\Event;
use Cake\ORM\Behavior;
use Cake\ORM\TableRegistry;
use Doctrine\Instantiator\Exception\InvalidArgumentException;
use Recurr\Rule;
use Recurr\Transformer\ArrayTransformer;
use Recurr\Transformer\ArrayTransformerConfig;
use ReflectionClass;

class SearchableBehavior extends Behavior
{

    /**
     * @var array
     */
    protected $_defaultConfig = [
        'field' => 'rrule',
        'occurrenceModel' => 'Occurrences',
    ];

    /**
     * @param array $config
     */
    public function initialize(array $config)
    {
        parent::initialize($config);
    }

    /**
     * @param Event $event
     * @param EntityInterface $entity
     * @param ArrayObject $options
     */
    public function beforeSave(Event $event, EntityInterface $entity, ArrayObject $options)
    {
        $field = $this->getConfig('field');

        $args = $entity->{$field};

        if (!is_array($args)) {
            $args = [$args];
        }

        $rrule = $this->_getRruleProcessor($args);
        $rruleFormatter = $this->_getRruleFormatter();

        // TODO Ensure the model associated with Occurrences model
        $entity->{$field} = $rrule->getString();
        $occurrences = [];
        foreach ($rruleFormatter->transform($rrule) as $occurrence) {
            $oEntity = $this->_getOccurrencesModel()->newEntity();
            $oEntity->start_on = $occurrence->getStart()->format('Y-m-d H:i:s');
            $oEntity->end_on = $occurrence->getEnd()->format('Y-m-d H:i:s');
            $occurrences[] = $oEntity;
        }

        $entity->{$this->_getOccurrencePropertyName()} = $occurrences;
    }

    /**
     * TODO
     *
     * @param $name
     * @return bool
     */
    protected function _checkOccurrencesIsAssociated($name)
    {
        $occurrenceModel = $this->getConfig('occurrenceModel');

        if ($this->getTable()->hasAssociation($occurrenceModel)) {
            return true;
        }

        return false;
    }

    /**
     * @return string
     */
    protected function _getOccurrencePropertyName()
    {
        return $this->_getOccurrencesModel()
            ->getProperty('propertyName');
    }

    /**
     * @return \Cake\ORM\Association|null
     */
    protected function _getOccurrencesModel()
    {
        $occurrenceModel = $this->getConfig('occurrenceModel');

        return $this->getTable()
            ->associations()
            ->get($occurrenceModel);
    }

    /**
     * TODO
     *
     */
    protected function _ensureOccurrencesReplaced()
    {
    }

    /**
     * TODO
     *
     * @param $rrule_parts
     * @return \Recurr\Rule
     */
    protected function _getRruleProcessor($rrule_parts)
    {
        $class = new ReflectionClass('Recurr\Rule');
        return $class->newInstanceArgs($rrule_parts);
    }

    /**
     * TODO
     *
     * @return \Recurr\Transformer\ArrayTransformer
     */
    protected function _getRruleFormatter()
    {
        $transformer = new ArrayTransformer();
        $transformerConfig = new ArrayTransformerConfig();
        $transformerConfig->enableLastDayOfMonthFix();
        $transformer->setConfig($transformerConfig);
        return $transformer;
    }
}