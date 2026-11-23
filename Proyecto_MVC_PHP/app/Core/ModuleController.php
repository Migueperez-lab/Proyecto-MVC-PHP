<?php
namespace App\Core;
abstract class ModuleController {
 protected $model; protected string $title=''; protected string $slug=''; protected array $fields=[]; protected string $description='';
 public function __construct($model) { $this->model=$model; }
 protected function clean($v): string { return trim(strip_tags((string)$v)); }
 public function index(): array { return ['title'=>$this->title,'slug'=>$this->slug,'fields'=>$this->fields,'description'=>$this->description,'items'=>$this->model->all()]; }
 public function create(): void { $data=[]; foreach($this->fields as $key=>$field) { if($key==='action') continue; $value=$this->clean($_POST[$key]??''); if(($field['required']??true) && $value==='') { $_SESSION['flash']='Completa todos los campos obligatorios.'; return; } $data[$key]=$value; } $this->model->save($data); $_SESSION['flash']='Registro guardado correctamente.'; }
 public function delete(): void { $this->model->delete($this->clean($_POST['id']??'')); $_SESSION['flash']='Registro eliminado.'; }
 public function update(): void { $id=$this->clean($_POST['id']??''); $changes=[]; foreach($this->fields as $key=>$field) if(isset($_POST[$key])) $changes[$key]=$this->clean($_POST[$key]); if($id!=='') $this->model->update($id,$changes); $_SESSION['flash']='Registro actualizado.'; }
 public function handle(string $action): void { if($action==='create') $this->create(); elseif($action==='delete') $this->delete(); elseif($action==='update') $this->update(); }
}
