<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\LoginModel;
use App\Models\GruposModel;
use App\Models\GruposContratadosModel;

use CodeIgniter\Files\File;

class Grupos extends BaseController {
    public function index() {
        

        $session = session();

        if (!$session->get('auth')) {
            return redirect()->to('login');
        } else {
            $auth = $session->get('auth');
        }

        $membros_model          = new LoginModel();
        $grupos_model           = new GruposContratadosModel();
        $membros                = $membros_model->findAll();
        $grupos                 = $grupos_model->findAll();
        $data['grupos']         = $grupos;
        $data['membros']        = $membros;
        
        $data['title']          = APP_NAME;
        $data['description']    = '...';
         
        $data['src'] = base_url('public/assets/');

        echo View('grupos/index', $data);
    }



    public function bvEditar($id) {

        $data['view']['action'] = array('name' => 'bv', 'alias' => '!BV');

        $request = $this->request;

        if ($request->getMethod() === 'post') {
            helper('form');


                $GruposContratadosModel = new \App\Models\GruposContratadosModel();  

                // Obtendo os dados do contrato a ser atualizado
                $contrato   = $GruposContratadosModel->find($id);

                $mensagem   = preg_replace('/\s+/', ' ', trim($request->getPost('mensagem')));

                // Verificando se o contrato foi encontrado
                if ($contrato) {
                    $data_update_entity = [
                        'msg_bv'    => $mensagem
                    ];


                    $imagem = $request->getFile('imagem');

                    if ($imagem && $imagem->isValid()) {

                        // Caminho para a pasta public/uploads/bv/
                        $imagemPath = FCPATH . 'uploads/bv/';

                        // Se a pasta não existir, crie-a
                        if (!is_dir($imagemPath)) {
                            mkdir($imagemPath, 0755, true);
                        }

                        // Obtendo um nome de arquivo único
                        $imagemName = $imagem->getRandomName();

                        // Movendo a imagem para a pasta public/uploads/bv/
                        if (!$imagem->move($imagemPath, $imagemName)) {
                            die("Erro ao mover a imagem.");
                        }

                        $data_update_entity['img_bv'] = $imagemName;

                        // Excluindo o arquivo antigo se existir
                        if (!empty($contrato['img_bv']) && file_exists($imagemPath . $contrato['img_bv'])) {
                            unlink($imagemPath . $contrato['img_bv']);
                        }
                    }
                }

                $session = session();

                if ($GruposContratadosModel->update(['id' => $id], $data_update_entity)) {
                    $session->setFlashdata('success', 'Registro gravado com sucesso.');
                    return redirect()->to(base_url('grupos/bvEditar/' . $id));
                } else {
                    $session->setFlashdata('error', 'Ocorreu um erro ao gravar o registro.');
                    return redirect()->to(base_url('grupos/bvEditar/' . $id));
                }
            
        }

        $membros_model          = new LoginModel();
        $grupos_model           = new GruposContratadosModel();
        $data['membros']        = $membros_model->findAll();
        $data['grupos']         = $grupos_model->where('id', $id)->first();
        
        $data['title']          = APP_NAME;
        $data['description']    = '...';
         
        $data['src'] = base_url('public/assets/');

        echo View('grupos/funcoes', $data);
    }


    public function anu1Editar($id) {

        $data['view']['action'] = array('name' => 'anu1', 'alias' => '!ANU1');

        $request = $this->request;

        if ($request->getMethod() === 'post') {
            helper('form');
         

                $GruposContratadosModel = new \App\Models\GruposContratadosModel(); 

                // Obtendo os dados do contrato a ser atualizado
                $contrato   = $GruposContratadosModel->find($id);

                $mensagem   = preg_replace('/\s+/', ' ', trim($request->getPost('mensagem')));

                // Verificando se o contrato foi encontrado
                if ($contrato) {
                    $data_update_entity = [
                        'msg_publi1' => $mensagem
                    ];


                    $imagem = $request->getFile('imagem');

                    if ($imagem && $imagem->isValid()) {

                        // Caminho para a pasta public/uploads/bv/
                        $imagemPath = FCPATH . 'uploads/anu1/';

                        // Se a pasta não existir, crie-a
                        if (!is_dir($imagemPath)) {
                            mkdir($imagemPath, 0755, true);
                        }

                        // Obtendo um nome de arquivo único
                        $imagemName = $imagem->getRandomName();

                        // Movendo a imagem para a pasta public/uploads/bv/
                        if (!$imagem->move($imagemPath, $imagemName)) {
                            die("Erro ao mover a imagem.");
                        }

                        $data_update_entity['img_publi1'] = $imagemName;

                        // Excluindo o arquivo antigo se existir
                        if (!empty($contrato['img_publi1']) && file_exists($imagemPath . $contrato['img_publi1'])) {
                            unlink($imagemPath . $contrato['img_publi1']);
                        }
                    }
                }

                $session = session();

                if ($GruposContratadosModel->update(['id' => $id], $data_update_entity)) {
                    $session->setFlashdata('success', 'Registro gravado com sucesso.');
                    return redirect()->to(base_url('grupos/anu1Editar/' . $id));
                } else {
                    $session->setFlashdata('error', 'Ocorreu um erro ao gravar o registro.');
                    return redirect()->to(base_url('grupos/anu1Editar/' . $id));
                }
            
        }

        $membros_model          = new LoginModel();
        $grupos_model           = new GruposContratadosModel();
        $data['membros']        = $membros_model->findAll();
        $data['grupos']         = $grupos_model->where('id', $id)->first();
        
        $data['title']          = APP_NAME;
        $data['description']    = '...';
         
        $data['src'] = base_url('public/assets/');

        echo View('grupos/funcoesp1', $data);
    }


    public function anu2Editar($id) {

        $data['view']['action'] = array('name' => 'anu2', 'alias' => '!ANU2');

        $request = $this->request;

        if ($request->getMethod() === 'post') {
            helper('form');

   
                $GruposContratadosModel = new \App\Models\GruposContratadosModel();

                // Obtendo os dados do contrato a ser atualizado
                $contrato   = $GruposContratadosModel->find($id);

                $mensagem   = preg_replace('/\s+/', ' ', trim($request->getPost('mensagem')));

                // Verificando se o contrato foi encontrado
                if ($contrato) {
                    $data_update_entity = [
                        'msg_publi2' => $mensagem
                    ];


                    $imagem = $request->getFile('imagem');

                    if ($imagem && $imagem->isValid()) {

                        // Caminho para a pasta public/uploads/bv/
                        $imagemPath = FCPATH . 'uploads/anu2/';

                        // Se a pasta não existir, crie-a
                        if (!is_dir($imagemPath)) {
                            mkdir($imagemPath, 0755, true);
                        }

                        // Obtendo um nome de arquivo único
                        $imagemName = $imagem->getRandomName();

                        // Movendo a imagem para a pasta public/uploads/bv/
                        if (!$imagem->move($imagemPath, $imagemName)) {
                            die("Erro ao mover a imagem.");
                        }

                        $data_update_entity['img_publi2'] = $imagemName;

                        // Excluindo o arquivo antigo se existir
                        if (!empty($contrato['img_publi2']) && file_exists($imagemPath . $contrato['img_publi2'])) {
                            unlink($imagemPath . $contrato['img_publi2']);
                        }
                    }
                }

                $session = session();

                if ($GruposContratadosModel->update(['id' => $id], $data_update_entity)) {
                    $session->setFlashdata('success', 'Registro gravado com sucesso.');
                    return redirect()->to(base_url('grupos/anu2Editar/' . $id));
                } else {
                    $session->setFlashdata('error', 'Ocorreu um erro ao gravar o registro.');
                    return redirect()->to(base_url('grupos/anu2Editar/' . $id));
                }
           
        }

        $membros_model          = new LoginModel();
        $grupos_model           = new GruposContratadosModel();
        $data['membros']        = $membros_model->findAll();
        $data['grupos']         = $grupos_model->where('id', $id)->first();
        
        $data['title']          = APP_NAME;
        $data['description']    = '...';
         
        $data['src'] = base_url('public/assets/');

        echo View('grupos/funcoesp2', $data);
    }


    public function anu3Editar($id) {

        $data['view']['action'] = array('name' => 'anu3', 'alias' => '!ANU3');

        $request = $this->request;

        if ($request->getMethod() === 'post') {
            helper('form');


         

                $GruposContratadosModel = new \App\Models\GruposContratadosModel();

                // Obtendo os dados do contrato a ser atualizado
                $contrato   = $GruposContratadosModel->find($id);

                $mensagem   = preg_replace('/\s+/', ' ', trim($request->getPost('mensagem')));

                // Verificando se o contrato foi encontrado
                if ($contrato) {
                    $data_update_entity = [
                        'msg_publi3' => $mensagem
                    ];


                    $imagem = $request->getFile('imagem');

                    if ($imagem && $imagem->isValid()) {

                        // Caminho para a pasta public/uploads/bv/
                        $imagemPath = FCPATH . 'uploads/anu3/';

                        // Se a pasta não existir, crie-a
                        if (!is_dir($imagemPath)) {
                            mkdir($imagemPath, 0755, true);
                        }

                        // Obtendo um nome de arquivo único
                        $imagemName = $imagem->getRandomName();

                        // Movendo a imagem para a pasta public/uploads/bv/
                        if (!$imagem->move($imagemPath, $imagemName)) {
                            die("Erro ao mover a imagem.");
                        }

                        $data_update_entity['img_publi3'] = $imagemName;

                        // Excluindo o arquivo antigo se existir
                        if (!empty($contrato['img_publi3']) && file_exists($imagemPath . $contrato['img_publi3'])) {
                            unlink($imagemPath . $contrato['img_publi3']);
                        }
                    }
                }

                $session = session();

                if ($GruposContratadosModel->update(['id' => $id], $data_update_entity)) {
                    $session->setFlashdata('success', 'Registro gravado com sucesso.');
                    return redirect()->to(base_url('grupos/anu3Editar/' . $id));
                } else {
                    $session->setFlashdata('error', 'Ocorreu um erro ao gravar o registro.');
                    return redirect()->to(base_url('grupos/anu3Editar/' . $id));
                }
            
        }

        $membros_model          = new LoginModel();
        $grupos_model           = new GruposContratadosModel();
        $data['membros']        = $membros_model->findAll();
        $data['grupos']         = $grupos_model->where('id', $id)->first();
        
        $data['title']          = APP_NAME;
        $data['description']    = '...';
         
        $data['src'] = base_url('public/assets/');

        echo View('grupos/funcoesp3', $data);
    }






    public function excluir($ProdutoId) {
        $produto_model = new ProdutoModel();

        $produto_model
                ->where('ProdutoId', $ProdutoId)
                ->delete();

        return redirect()->to('/produtos/listar?alert=successDelete');
    }
}
