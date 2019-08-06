<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Veiculo Controller
 *
 * @property \App\Model\Table\VeiculoTable $Veiculo
 *
 * @method \App\Model\Entity\Veiculo[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class VeiculoController extends AppController
{
    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $veiculo = $this->Veiculo->newEntity();

        if ($this->request->is('post')) {
            $data = (Array)$this->request->input('json_decode');

            if (!empty($data['placa'])) {
                $data['placa'] = str_replace('-', '', $data['placa']);
            }

            $veiculo = $this->Veiculo->patchEntity($veiculo, $data);
            
            if ($this->Veiculo->save($veiculo)) {
                $ret['success'] = true;
                $ret['message'] = 'Veículo cadastrado com sucesso.';
                $ret['codigo_veiculo'] = $veiculo->id;
            } else {
                $ret['errors'] = $veiculo->errors();
            }

            $this->response->body(json_encode($ret));
        }
    }
}
