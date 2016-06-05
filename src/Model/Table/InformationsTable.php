<?php
namespace App\Model\Table;

use App\Model\Entity\Information;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Informations Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Users
 * @property \Cake\ORM\Association\BelongsTo $Informations
 * @property \Cake\ORM\Association\HasMany $Informations
 */
class InformationsTable extends Table
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

        $this->table('informations');
        $this->displayField('title');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Informations', [
            'foreignKey' => 'information_id'
        ]);
        $this->hasMany('Informations', [
            'foreignKey' => 'information_id'
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
            ->requirePresence('title', 'create')
            ->notEmpty('title');

        $validator
            ->requirePresence('argument', 'create')
            ->notEmpty('argument');

        $validator
            ->requirePresence('reference_link', 'create')
            ->notEmpty('reference_link');

        $validator
            ->decimal('trust_score')
            ->requirePresence('trust_score', 'create')
            ->notEmpty('trust_score');

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
        $rules->add($rules->existsIn(['user_id'], 'Users'));
        //$rules->add($rules->existsIn(['information_id'], 'Informations'));
        return $rules;
    }
    
    public function findTitle(Query $query, array $options){
        return $this->find()
                ->distinct(['Informations.id'])
                ->where(['informations.title like' => "%".implode(" ",$options['title'])."%"]);
                //->matching('Informations', function ($q) use ($options){
                //    return $q->where(['informations.title IN' => $options['title']]);
    }
}
