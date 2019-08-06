<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Veiculo Model
 *
 * @property \App\Model\Table\MotoristaTable|\Cake\ORM\Association\BelongsTo $Motorista
 * @property \App\Model\Table\VeiculoTipoTable|\Cake\ORM\Association\BelongsTo $VeiculoTipo
 * @property \App\Model\Table\FreteTable|\Cake\ORM\Association\HasMany $Frete
 *
 * @method \App\Model\Entity\Veiculo get($primaryKey, $options = [])
 * @method \App\Model\Entity\Veiculo newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Veiculo[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Veiculo|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Veiculo saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Veiculo patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Veiculo[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Veiculo findOrCreate($search, callable $callback = null, $options = [])
 */
class VeiculoTable extends Table
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

        $this->setTable('veiculo');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Motorista', [
            'foreignKey' => 'motorista_id'
        ]);
        $this->belongsTo('VeiculoTipo', [
            'foreignKey' => 'veiculo_tipo_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Frete', [
            'foreignKey' => 'veiculo_id'
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
            ->scalar('placa')
            ->maxLength('placa', 7, 'Placa inválida.')
            ->notEmptyString('placa')
            ->add('placa', 'unique', [
                'rule' => function($value, $context) {
                    $data = $context['data'];

                    if (!empty($data['id'])) {
                        $ret = $this->find()->where(['placa' => $value, 'id !=' => $data['id']])->first();
                    } else {
                        $ret = $this->find()->where(['placa' => $value])->first();
                    }

                    if (!$ret) {
                        return true;
                    } 
                    return false;
                },
                'message' => 'Placa ja cadastrada.'
            ]);

        $validator
            ->scalar('marca')
            ->requirePresence('marca', 'create', 'Marca é obrigatório.')
            ->maxLength('marca', 50)
            ->notEmptyString('marca');

        $validator
            ->scalar('modelo')
            ->requirePresence('modelo', 'create', 'Modelo é obrigatório.')
            ->maxLength('modelo', 50)
            ->notEmptyString('modelo');

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
        $rules->add($rules->existsIn(['motorista_id'], 'Motorista'));
        $rules->add($rules->existsIn(['veiculo_tipo_id'], 'VeiculoTipo'));

        return $rules;
    }
}
