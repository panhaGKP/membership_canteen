<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;


/**
 * Customer Entity
 *
 * @property int $id
 * @property string|null $name
 * @property string $gender
 * @property \Cake\I18n\FrozenDate|null $date_of_birth
 * @property string|null $phone_number
 * @property string|null $profile_picture
 * @property \Cake\I18n\FrozenTime|null $deleted
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Checkin[] $checkins
 * @property \App\Model\Entity\Membership[] $memberships
 */
class Customer extends Entity
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
        'gender' => true,
        'date_of_birth' => true,
        'phone_number' => true,
        'profile_picture' => true,
        'deleted' => true,
        'created' => true,
        'modified' => true,
        'checkins' => true,
        'memberships' => true,
    ];
}
