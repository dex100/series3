<?php
namespace App\Controller;

class SeriesController extends AppController
{
	public function index($estado = "viendo") {
        $this->viewBuilder()->layout('inicio');
		$query = $this->Series->find('all');
		if ($estado != 'todo') {
			$query = $query->where(['Series.estado' => $estado]);
		}
		$this->set('listado', $query);
		$this->set('estado', $estado);
	}

	public function add($estado) {
        $this->viewBuilder()->layout('inicio');
		if ($this->request->is('post')) {
			if ($this->request->data['estado'] == 'completado' && !$this->request->data['ffin']) {
				$this->request->data['ffin'] = date("Y-m-d");
			}
			$serie = $this->Series->newEntity($this->request->data);
			if ($this->Series->save($serie)) {
				$this->Flash->success('Serie agregada.');
				return $this->redirect(['action' => 'index', $estado]);
			}
			$this->Flash->error('Error al agregar.');
		}
		$this->set('estado', $estado);
	}
    
	public function up() {
		if ($this->request->is('ajax')) {
			$id = $this->request->data('id');
			$progreso = $this->request->data('progreso');
			$serie = $this->Series->get($id);
			$serie->progreso = $progreso;
			$descarga = $serie->descarga ?: '0';
			if ($serie->tipo == 'serie' && $descarga < $progreso) {
				$serie->descarga = $progreso;
			}
			if ($progreso == $serie->total) {
				$serie->estado = 'completado';
				$serie->ffin = date("Y-m-d");
			}
			$descarga = $serie->descarga;
			$this->Series->save($serie);
			$this->set(compact('id', 'progreso', 'descarga'));
		}
	}
	
	public function upd() {
		if ($this->request->is('ajax')) {
			$id = $this->request->data('id');
			$descarga = $this->request->data('descarga');
			$serie = $this->Series->get($id);
			$serie->descarga = $descarga;
			if ($serie->tipo == 'anime' && $descarga == $serie->total) {
				$serie->estado = 'completado';
			}
			$this->Series->save($serie);
			$this->set(compact('id', 'descarga'));
		}
	}
	
	public function edit($id, $estado) {
		$this->viewBuilder()->layout('inicio');
		$serie = $this->Series->get($id);
		if ($this->request->is(['post','put'])) {
			$this->Series->patchEntity($serie, $this->request->data);
			if ($this->Series->save($serie)) {
				$this->Flash->success('Serie actualizada.');
				return $this->redirect(['action' => 'index', $estado]);
			}
			$this->Flash->error('Error al actualizar.');
		}
		$serie->fini = $serie->fini->format('Y-m-d');
		$serie->ffin = $serie->ffin->format('Y-m-d');
		$this->set(compact('serie', 'estado'));
	}
}
