<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;


/**
 * Users Model
 *
 * @property \App\Model\Table\OfficesTable|\Cake\ORM\Association\BelongsTo $Offices
 *
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class UsersTable extends Table {


    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config) {
        parent::initialize($config);

        $this->setTable('users');
        $this->setDisplayField('username');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp',
            [
                'events' => [
                    'Model.beforeSave' => [
                        'created' => 'new',
                        'updated' => 'always'
                    ]
                ]
            ]);

        $this->belongsTo('Offices', [
            'foreignKey' => 'office_id',
            'joinType' => 'INNER'
        ]);
    }


    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator) {
        $validator->integer('id')
            ->allowEmptyString('id', 'create');

        $validator->scalar('username')
            ->maxLength('username', 255)
            ->requirePresence('username', 'create')
            ->allowEmptyString('username', false);

        $validator->email('email')
            ->requirePresence('email', 'create')
            ->allowEmptyString('email', false);

        $validator->scalar('password')
            ->maxLength('password', 255)
            ->requirePresence('password', 'create')
            ->allowEmptyString('password', false);

        $validator->boolean('deleted')
            ->allowEmptyString('deleted', false);

        $validator->boolean('administrator')
            ->allowEmptyString('administrator', false);

        return $validator;
    }


    /**
     * Login validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationLogin(Validator $validator) {
        $validator->scalar('username')
            ->allowEmptyString('username', false);

        $validator->scalar('password')
            ->allowEmptyString('password', false);

        return $validator;
    }


    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules) {
        $rules->add($rules->isUnique((array) 'username'));
        $rules->add($rules->isUnique((array) 'email'));
        $rules->add($rules->existsIn((array) 'office_id', 'Offices'));

        return $rules;
    }


    public function findActive(Query $query, array $options) {
        $expr = $query->newExpr();
        return $query->andWhere([
            $expr->eq("deleted", 0)
        ]);
    }


    public function findAdmin(Query $query, array $options) {
        $expr = $query->newExpr();
        return $query->andWhere([
            $expr->eq("deleted", 0),
            $expr->notEq("administrator", 0)
        ]);
    }
}
