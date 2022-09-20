<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Bundle Entity
 *
 * @property int $id
 * @property string $name
 * @property int $price
 * @property int $duration
 * @property \Cake\I18n\FrozenTime|null $deleted
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\Membership[] $memberships
 */
class Bundle extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected $_accessible = [
        'name' => true,
        'price' => true,
        'duration' => true,
        'deleted' => true,
        'created' => true,
        'modified' => true,
        'memberships' => true,
    ];
}
