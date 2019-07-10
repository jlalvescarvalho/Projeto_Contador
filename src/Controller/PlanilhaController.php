<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Network\Exception\InternalErrorException;
use Cake\Utility\Text;
use Cake\ORM\TableRegistry;

/**
 * Planilha Controller
 *
 * @property \App\Model\Table\PlanilhaTable $Planilha
 *
 * @method \App\Model\Entity\Planilha[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PlanilhaController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $planilha = $this->paginate($this->Planilha);

        $this->set(compact('planilha'));
    }

    /**
     * View method
     *
     * @param string|null $id Planilha id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $planilha = $this->Planilha->get($id, [
            'contain' => []
        ]);

        $this->set('planilha', $planilha);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add(){

        $planilha = $this->Planilha->newEntity();
        if ($this->request->is('post')) {

            $file = $this->request->getData();
            $filename = $file['nome']['name'];
            $file_tmp_name = $file['nome']['tmp_name'];
            $dir = WWW_ROOT.'plans'.DS.'uploads';
       
            $filename = Text::uuid().'-'.$filename;

            $array = ["nome" => $filename];


            $planilha = $this->Planilha->patchEntity($planilha, $array);
            if ($this->Planilha->save($planilha)) {
                move_uploaded_file($file_tmp_name, $dir.DS.$filename);
                $this->Flash->success(__('The planilha has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The planilha could not be saved. Please, try again.'));
        }
        $this->set(compact('planilha'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Planilha id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $planilha = $this->Planilha->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $planilha = $this->Planilha->patchEntity($planilha, $this->request->getData());
            if ($this->Planilha->save($planilha)) {
                $this->Flash->success(__('The planilha has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The planilha could not be saved. Please, try again.'));
        }
        $this->set(compact('planilha'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Planilha id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $planilha = $this->Planilha->get($id);
        if ($this->Planilha->delete($planilha)) {
            $this->Flash->success(__('The planilha has been deleted.'));
        } else {
            $this->Flash->error(__('The planilha could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
