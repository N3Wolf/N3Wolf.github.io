<?php
namespace App\Model\Table;

use App\Model\Entity\Votelocation;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Votelocations Model
 *
 * @property \Cake\ORM\Association\HasMany $Users
 */
class VotelocationsTable extends Table
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

        $this->table('votelocations');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->hasMany('Users', [
            'foreignKey' => 'votelocation_id'
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
            ->integer('complete_city_code')
            ->requirePresence('complete_city_code', 'create')
            ->notEmpty('complete_city_code')
            ->add('complete_city_code', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->requirePresence('city_code', 'create')
            ->notEmpty('city_code');

        $validator
            ->requirePresence('state_code', 'create')
            ->notEmpty('state_code');

        $validator
            ->requirePresence('city_name', 'create')
            ->notEmpty('city_name');

        $validator
            ->requirePresence('state_name', 'create')
            ->notEmpty('state_name');

        $validator
            ->integer('mesoregion_code')
            ->allowEmpty('mesoregion_code');

        $validator
            ->allowEmpty('mesoregion_name');

        $validator
            ->allowEmpty('microregion_code');

        $validator
            ->allowEmpty('microregion_name');

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
        $rules->add($rules->isUnique(['complete_city_code']));
        return $rules;
    }
}
