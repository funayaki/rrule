<?php
namespace Rrule\Model\Entity;

use Cake\ORM\Entity;

/**
 * Occurrence Entity
 *
 * @property int $id
 * @property int $rrule_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property \Cake\I18n\FrozenTime $start_on
 * @property \Cake\I18n\FrozenTime $end_on
 *
 * @property \Rrule\Model\Entity\Rrule $rrule
 */
class Occurrence extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true
    ];
}
