<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * User Entity.
 *
 * @property int $id
 * @property string $email
 * @property string $rg
 * @property int $votelocation_id
 * @property \App\Model\Entity\Votelocation $votelocation
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property string $password
 * @property \App\Model\Entity\Information[] $informations
 * @property \App\Model\Entity\Profile[] $profiles
 */
class User extends Entity
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

    /**
     * Fields that are excluded from JSON an array versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password'
    ];
    
     protected function _setPassword($value){
        $hasher = new \Cake\Auth\DefaultPasswordHasher();
        return $hasher->hash($value);
    }
}