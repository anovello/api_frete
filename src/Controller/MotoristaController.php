<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Motorista Controller
 *
 * @property \App\Model\Table\MotoristaTable $Motorista
 *
 * @method \App\Model\Entity\Motoristum[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MotoristaController extends AppController
{
    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $motoristum = $this->Motorista->newEntity();
        $ret = [
            'success' => false,
            'errors' => false
        ];

        if ($this->request->is('post')) {
            $data = (Array)$this->request->input('json_decode');

            if (!empty($data['data_nascimento'])) {
                $data['data_nascimento'] = date('Y-m-d', strtotime($data['data_nascimento']));
            }

            if (!empty($data['cpf'])) {
                $data['cpf'] = preg_replace('/[^0-9]/', '', $data['cpf']);
            }

            $motoristum = $this->Motorista->patchEntity($motoristum, $data);

            if ($this->Motorista->save($motoristum)) {
                $ret['success'] = true;
                $ret['message'] = 'Motorista cadastrado com sucesso.';
                $ret['codigo_motorista'] = $motoristum->id;
            } else {
                $ret['errors'] = $motoristum->errors();
            }

            $this->response->body(json_encode($ret));
        }
    }

    /**
     * Edit method
     *
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit()
    {
        $data = (Array)$this->request->input('json_decode');

        if (!empty($data['data_nascimento'])) {
            $data['data_nascimento'] = date('Y-m-d', strtotime($data['data_nascimento']));
        }

        if (!empty($data['cpf'])) {
            $data['cpf'] = preg_replace('/[^0-9]/', '', $data['cpf']);
        }

        $ret = [
            'success' => false,
            'errors' => false
        ];

        if (!empty($data['id'])) {
            $id = (int) $data['id'];

            if ($this->request->is(['put'])) {
                $motoristum = $this->Motorista->find()->where(['id' => $id ])->first();

                if ($motoristum) {
                    $motoristum = $this->Motorista->patchEntity($motoristum, $data);

                    if ($this->Motorista->save($motoristum)) {
                        $ret['success'] = true;
                        $ret['message'] = 'Motorista atualizado com sucesso.';
                        $ret['codigo_motorista'] = $motoristum->id;
                    } else {
                        $ret['message'] = 'Erro ao tentar atualizar o motorista.';
                        $ret['errors'] = $motoristum->errors();
                    }
                } else {
                    $ret['message'] = 'Motorista não encontrado, utilize o cadastrar.';
                    $ret['errors'] = true;
                }
            }
        } else {
            $ret['message'] = 'O id do motorista é obrigatório.';
            $ret['errors'] = true;
        }

        $this->response->body(json_encode($ret));
    }

    public function motoristaCaminhao()
    {
        $ret = [
            'success' => true,
            'errors' => false,
            'data' => $this->Motorista->motoristaCaminhao()
        ];

        $this->response->body(json_encode($ret));
    }

}
