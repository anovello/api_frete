<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Frete Model
 *
 * @property \App\Model\Table\MotoristaTable|\Cake\ORM\Association\BelongsTo $Motorista
 * @property \App\Model\Table\VeiculoTable|\Cake\ORM\Association\BelongsTo $Veiculo
 *
 * @method \App\Model\Entity\Frete get($primaryKey, $options = [])
 * @method \App\Model\Entity\Frete newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Frete[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Frete|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Frete saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Frete patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Frete[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Frete findOrCreate($search, callable $callback = null, $options = [])
 */
class FreteTable extends Table
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

        $this->setTable('frete');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Motorista', [
            'foreignKey' => 'motorista_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Veiculo', [
            'foreignKey' => 'veiculo_id',
            'joinType' => 'INNER'
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
            ->numeric('lat_origem')
            ->requirePresence('lat_origem', 'create', 'O campo lat_origem é obrigatório.')
            ->notEmptyString('lat_origem');

        $validator
            ->numeric('lng_origem')
            ->requirePresence('lng_origem', 'create', 'O campo lng_origem é obrigatório.')
            ->notEmptyString('lng_origem');

        $validator
            ->scalar('cidade_origem')
            ->requirePresence('cidade_origem', 'create', 'O campo cidade_origem é obrigatório.')
            ->maxLength('cidade_origem', 100)
            ->notEmptyString('cidade_origem');

        $validator
            ->scalar('estado_origem')
            ->maxLength('estado_origem', 100)
            ->notEmptyString('estado_origem');

        $validator
            ->numeric('lat_destino')
            ->requirePresence('lat_destino', 'create', 'O campo lat_destino é obrigatório.')
            ->notEmptyString('lat_destino');

        $validator
            ->numeric('lng_destino')
            ->requirePresence('lng_destino', 'create', 'O campo lng_destino é obrigatório.')
            ->notEmptyString('lng_destino');

        $validator
            ->scalar('cidade_destino')
            ->requirePresence('cidade_destino', 'create', 'O campo cidade_destino é obrigatório.')
            ->maxLength('cidade_destino', 100)
            ->notEmptyString('cidade_destino');

        $validator
            ->scalar('estado_destino')
            ->maxLength('estado_destino', 100)
            ->notEmptyString('estado_destino');

        $validator
            ->integer('tempo')
            ->requirePresence('tempo', 'create', 'O tempo é obrigatório.')
            ->notEmptyString('tempo');

        $validator
            ->integer('distancia')
            ->requirePresence('distancia', 'create', 'O campo distancia é obrigatório.')
            ->notEmptyString('distancia');

        $validator
            ->integer('frete_id_ida')
            ->requirePresence('frete_id_ida', 'create')
            ->notEmptyString('frete_id_ida');

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
        $rules->add($rules->existsIn(['veiculo_id'], 'Veiculo'));

        return $rules;
    }

    public function verificarCargaVolta()
    {
        $ret_ids = $this->find()->select(['id' => 'MAX(Frete.id)'])
                                ->group(['motorista_id','veiculo_id'])
                                ->all();
        $ids = [];
        foreach ($ret_ids as $id) {
            $ids[] = $id->id;
        }

        $ret = $this->find()->select([
                                'data' => 'Frete.data',
                                'origem' => 'Frete.cidade_origem',
                                'destino' => 'Frete.cidade_destino',
                                'motorista_id' => 'Motorista.id',
                                'nome' => 'Motorista.nome',
                                'cpf' => 'Motorista.cpf',
                                'placa' => 'Veiculo.placa',
                                'marca' => 'Veiculo.marca',
                                'modelo' => 'Veiculo.modelo'
                            ])
                            ->where(['Frete.id IN' => $ids, 'Frete.frete_id_ida' => 0])
                            ->join([
                                'Motorista' => [
                                    'table' => 'motorista',
                                    'type'  => 'INNER',
                                    'conditions' => 'Motorista.id = Frete.motorista_id'
                                ],
                                'Veiculo' => [
                                    'table' => 'veiculo',
                                    'type'  => 'INNER',
                                    'conditions' => 'Veiculo.id = Frete.veiculo_id'
                                ]
                            ])
                            ->all()
                            ->toArray();

        return $ret;
    }

    public function qtdFrete($date)
    {
        $ret = $this->find()->where(['data BETWEEN "'.$date.' 00:00"'.' and "'.date('Y-m-d H:i:s').'"'])->all();
        return $ret;
    }

    public function origemDestinoTipo($date)
    {
        $ret = $this->find()
                    ->select([
                        'VeiculoTipo.nome',
                        'Veiculo.placa',
                        'Veiculo.marca',
                        'Veiculo.modelo',
                        'Frete.data',
                        'Frete.cidade_origem',
                        'Frete.estado_origem',
                        'Frete.cidade_destino',
                        'Frete.estado_destino'
                    ])
                    ->where(['data BETWEEN "'.$date.' 00:00"'.' and "'.date('Y-m-d H:i:s').'"'])
                    ->join([
                        'Veiculo' => [
                            'table' => 'veiculo',
                            'type'  => 'INNER',
                            'conditions' => 'Veiculo.id = Frete.veiculo_id'
                        ],
                        'VeiculoTipo' => [
                            'table' => 'veiculo_tipo',
                            'type'  => 'INNER',
                            'conditions' => 'Veiculo.veiculo_tipo_id = VeiculoTipo.id'
                        ]
                    ])
                    ->order(['VeiculoTipo.nome' => 'ASC'])
                    ->all();

        $data = [];

        foreach ($ret as $v) {
            $key = $v['VeiculoTipo']['nome'];
            if (!isset($data[$key])) {
                $data[$key] = [];
            }

            $data[$key][] = [
                'origem' => $v['cidade_origem'].' - '.$v['estado_origem'],
                'destino' => $v['cidade_destino'].' - '.$v['estado_destino'],
                'placa' => $v['Veiculo']['placa'],
                'marca' => $v['Veiculo']['marca'],
                'modelo' => $v['Veiculo']['modelo'],
                'data' => date('d/m/Y', strtotime($v['data'])),
                'tipo' => $key,
            ];
        }
        return $data;
    }
}
