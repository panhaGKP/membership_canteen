<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Memberships Model
 *
 * @property \App\Model\Table\CustomersTable&\Cake\ORM\Association\BelongsTo $Customers
 * @property \App\Model\Table\BundlesTable&\Cake\ORM\Association\BelongsTo $Bundles
 *
 * @method \App\Model\Entity\Membership newEmptyEntity()
 * @method \App\Model\Entity\Membership newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Membership[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Membership get($primaryKey, $options = [])
 * @method \App\Model\Entity\Membership findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Membership patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Membership[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Membership|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Membership saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Membership[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Membership[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Membership[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Membership[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class MembershipsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('memberships');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
        $this->addBehavior('Muffin/Trash.Trash',[]);

        $this->belongsTo('Customers', [
            'foreignKey' => 'customer_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Bundles', [
            'foreignKey' => 'bundle_id',
            'joinType' => 'INNER',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('customer_id')
            ->requirePresence('customer_id', 'create')
            ->notEmptyString('customer_id');

        $validator
            ->integer('bundle_id')
            ->requirePresence('bundle_id', 'create')
            ->notEmptyString('bundle_id');

        $validator
            ->date('start_date')
            ->requirePresence('start_date', 'create')
            ->notEmptyDate('start_date');

        $validator
            ->date('end_date')
            ->requirePresence('end_date', 'create')
            ->notEmptyDate('end_date');

        $validator
            ->notEmptyString('deleted');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn('customer_id', 'Customers'), ['errorField' => 'customer_id']);
        $rules->add($rules->existsIn('bundle_id', 'Bundles'), ['errorField' => 'bundle_id']);

        return $rules;
    }
}
