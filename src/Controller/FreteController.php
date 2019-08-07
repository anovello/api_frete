<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Frete Controller
 *
 * @property \App\Model\Table\FreteTable $Frete
 *
 * @method \App\Model\Entity\Frete[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class FreteController extends AppController
{
    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $frete = $this->Frete->newEntity();
        $ret = [
            'success' => false,
            'errors' => false
        ];

        if ($this->request->is('post')) {
            $this->loadComponent('ApiOpenCage');
            $data = (Array)$this->request->input('json_decode');

            if (!empty($data['motorista_id']) && !empty($data['cidade_origem']) && !empty($data['cidade_destino']) ) {
                $valid = $this->Frete->find()->
                                       where([
                                            'motorista_id' => $data['motorista_id']
                                        ])->
                                       order(['id'=> 'desc'])->first();

                $data['cidade_destino'] = strtoupper($data['cidade_destino']); 
                $data['cidade_origem'] = strtoupper($data['cidade_origem']); 
                
                if ($valid) {
                    if ($valid->cidade_destino == $data['cidade_origem']) {
                        $data['frete_id_ida'] = $valid->id;
                    } else {
                        $data['frete_id_ida'] = 0;
                    }
                } else {
                    $data['frete_id_ida'] = 0;
                }
            } else {
                $data['frete_id_ida'] = 0;
            }
            $data['data'] = date('Y-m-d');
            $frete = $this->Frete->patchEntity($frete, $data);

            $geocodeIni = $this->ApiOpenCage->getLatLng($data['lat_origem'],$data['lng_origem']);
            $geocodeDes = $this->ApiOpenCage->getLatLng($data['lat_destino'],$data['lng_destino']);

            if (!$geocodeIni) {
                $frete->errors('lat_origem', 'Lat e Lng Inválida.');
                $frete->errors('lng_origem', 'Lat e Lng Inválida.');
            } else {
                $frete->cidade_origem = $geocodeIni['cidade'];
                $frete->estado_origem = $geocodeIni['estado'];
            }

            if (!$geocodeDes) {
                $frete->errors('lat_destino', 'Lat e Lng Inválida.');
                $frete->errors('lng_destino', 'Lat e Lng Inválida.');
            } else {
                $frete->cidade_destino = $geocodeDes['cidade'];
                $frete->estado_destino = $geocodeDes['estado'];
            }

            if ($this->Frete->save($frete)) {
                $ret['success'] = true;
                $ret['message'] = 'Frete cadastrado com sucesso.';
                $ret['frete_id'] = $frete->id;
            } else {
                $ret['errors'] = $frete->errors();
            }

            $this->response->body(json_encode($ret));
        }
    }

    public function motoristaCargaVoltar()
    {
        $ret = [
            'success' => true,
            'errors' => false
        ];

        $ret['data'] = $this->Frete->verificarCargaVolta();
        $this->response->body(json_encode($ret));
    }

    public function qtdFrete()
    {
        $type = $this->request->getQuery('type');
        $data = date('Y-m-d');

        if ($type == 'semana') {
            $data = date('Y-m-d', strtotime('-1 week'));
        }else if ($type == 'mes') {
            $data = date('Y-m-d', strtotime('-1 month'));
        }

        $ret = [
            'success' => true,
            'errors' => false
        ];

        $ret['data'] = $this->Frete->qtdFrete($data);
        $ret['total'] = count($ret['data']);
        $this->response->body(json_encode($ret));
    }

    public function origemDestinoTipo()
    {
        $type = $this->request->getQuery('type');
        $data = date('Y-m-d');

        if ($type == 'semana') {
            $data = date('Y-m-d', strtotime('-1 week'));
        }else if ($type == 'mes') {
            $data = date('Y-m-d', strtotime('-1 month'));
        }

        $ret = [
            'success' => true,
            'errors' => false
        ];

        $ret['data'] = $this->Frete->origemDestinoTipo($data);
        $ret['total'] = count($ret['data']);
        $this->response->body(json_encode($ret));
    }


}
