<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Votelocation Entity.
 *
 * @property int $id
 * @property int $complete_city_code
 * @property string $city_code
 * @property string $state_code
 * @property string $city_name
 * @property string $state_name
 * @property int $mesoregion_code
 * @property string $mesoregion_name
 * @property string $microregion_code
 * @property string $microregion_name
 * @property \App\Model\Entity\User[] $users
 */
class Votelocation extends Entity
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
        '*' => true,
        'id' => false,
    ];
}
