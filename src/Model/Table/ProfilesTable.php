<?php
namespace App\Model\Table;

use App\Model\Entity\Profile;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Profiles Model
 *
 * @property \Cake\ORM\Association\BelongsToMany $Permissions
 * @property \Cake\ORM\Association\BelongsToMany $Users
 */
class ProfilesTable extends Table
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

        $this->table('profiles');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsToMany('Permissions', [
            'foreignKey' => 'profile_id',
            'targetForeignKey' => 'permission_id',
            'joinTable' => 'profiles_permissions'
        ]);
        $this->belongsToMany('Users', [
            'foreignKey' => 'profile_id',
            'targetForeignKey' => 'user_id',
            'joinTable' => 'users_profiles'
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
            ->allowEmpty('name');

        return $validator;
    }
}
