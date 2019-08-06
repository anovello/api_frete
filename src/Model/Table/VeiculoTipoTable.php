<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * VeiculoTipo Model
 *
 * @property \App\Model\Table\VeiculoTable|\Cake\ORM\Association\HasMany $Veiculo
 *
 * @method \App\Model\Entity\VeiculoTipo get($primaryKey, $options = [])
 * @method \App\Model\Entity\VeiculoTipo newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\VeiculoTipo[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\VeiculoTipo|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\VeiculoTipo saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\VeiculoTipo patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\VeiculoTipo[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\VeiculoTipo findOrCreate($search, callable $callback = null, $options = [])
 */
class VeiculoTipoTable extends Table
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

        $this->setTable('veiculo_tipo');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('Veiculo', [
            'foreignKey' => 'veiculo_tipo_id'
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
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('nome')
            ->maxLength('nome', 50)
            ->requirePresence('nome', 'create')
            ->notEmptyString('nome');

        return $validator;
    }
}
