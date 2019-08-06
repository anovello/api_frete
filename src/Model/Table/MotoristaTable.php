<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Motorista Model
 *
 * @method \App\Model\Entity\Motoristum get($primaryKey, $options = [])
 * @method \App\Model\Entity\Motoristum newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Motoristum[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Motoristum|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Motoristum saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Motoristum patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Motoristum[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Motoristum findOrCreate($search, callable $callback = null, $options = [])
 */
class MotoristaTable extends Table
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

        $this->setTable('motorista');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
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
            ->requirePresence('nome', 'create', 'O Nome é obrigatório.')
            ->maxLength('nome', 255)
            ->notEmptyString('nome');

        $validator
            ->date('data_nascimento')
            ->requirePresence('data_nascimento', 'create', 'Data de nascimento é obrigatório.')
            ->notEmptyDate('data_nascimento')
            ->add('data_nascimento', 'custom', [
                'rule' => function ($value, $context) {
                    $anos = date('Y') - date('Y', strtotime($value));

                    if ($anos >= 18 && $anos <= 65) {
                        return true;
                    }
                    return false;
                },
                'message' => 'A idade do motorista deve ser maior de 18 e menor que 65.'
            ]);

        $validator
            ->scalar('sexo')
            ->requirePresence('sexo', 'create', 'Sexo é obrigatório, envie "f" ou "m"')
            ->maxLength('sexo', 1, 'Sexo inválido, envie "m" ou "f".')
            ->notEmptyString('sexo');

        $validator
            ->scalar('tipo_cnh')
            ->maxLength('tipo_cnh', 1, 'Digite apenas um caracter.')
            ->notEmptyString('tipo_cnh')
            ->add('tipo_cnh', 'custom', [
                'rule' => function ($value, $context) {
                    $cnh = ['C','D','E'];
                    if (in_array(strtoupper($value), $cnh)) {
                        return true;
                    }
                    return false;
                },
                'message' => 'Categoria CNH inválida, use "B", "C", "D" ou "E".'
            ]);

        $validator
            ->scalar('cpf')
            ->requirePresence('cpf', 'create', 'O CPF é obrigatório.')
            ->notEmptyString('cpf')
            ->add('cpf', 'custom', [
                'rule' => function ($value, $context) {
                    // Verifica se um número foi informado
                    if(empty($value)) {
                        return false;
                    }

                    // Elimina possivel mascara
                    $cpf = preg_replace("/[^0-9]/", "", $value);
                    $cpf = str_pad($value, 11, '0', STR_PAD_LEFT);
                    
                    // Verifica se o numero de digitos informados é igual a 11 
                    if (strlen($cpf) != 11) {
                        return false;
                    }
                    // Verifica se nenhuma das sequências invalidas abaixo 
                    // foi digitada. Caso afirmativo, retorna falso
                    else if ($cpf == '00000000000' || 
                        $cpf == '11111111111' || 
                        $cpf == '22222222222' || 
                        $cpf == '33333333333' || 
                        $cpf == '44444444444' || 
                        $cpf == '55555555555' || 
                        $cpf == '66666666666' || 
                        $cpf == '77777777777' || 
                        $cpf == '88888888888' || 
                        $cpf == '99999999999') {
                        return false;
                     // Calcula os digitos verificadores para verificar se o
                     // CPF é válido
                     } else {   
                        
                        for ($t = 9; $t < 11; $t++) {
                            
                            for ($d = 0, $c = 0; $c < $t; $c++) {
                                $d += $cpf{$c} * (($t + 1) - $c);
                            }
                            $d = ((10 * $d) % 11) % 10;
                            if ($cpf{$c} != $d) {
                                return false;
                            }
                        }

                        return true;
                    }
                },
                'message' => 'CPF inválido.'
            ])
            ->add('cpf', 'unique', [
                'rule' => function($value, $context) {
                    $data = $context['data'];

                    if (!empty($data['id'])) {
                        $ret = $this->find()->where(['cpf' => $value, 'id !=' => $data['id']])->first();
                    } else {
                        $ret = $this->find()->where(['cpf' => $value])->first();
                    }

                    if (!$ret) {
                        return true;
                    } 
                    return false;
                },
                'message' => 'CPF ja cadastrado, utilize o editar.'
            ]);

        return $validator;
    }

    public function motoristaCaminhao()
    {
        return $this->find()->select([
                                'nome' => 'Motorista.nome',
                                'cpf' => 'Motorista.cpf'
                            ])
                            ->group(['nome','cpf'])
                            ->join([
                                'Veiculo' => [
                                    'table' => 'veiculo',
                                    'type'  => 'INNER',
                                    'conditions' => 'Veiculo.motorista_id = Motorista.id'
                                ]])
                            ->all();
    }
}
