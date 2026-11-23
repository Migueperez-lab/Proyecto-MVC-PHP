<?php
namespace App\Controllers;
use App\Core\ModuleController;
class TasksController extends ModuleController {
 protected string $title='Lista de tareas'; protected string $slug='tasks'; protected string $description='Organiza tus pendientes y marca las que ya terminaste.'; protected array $fields=['task'=>['type'=>'text','label'=>'Tarea'],'priority'=>['type'=>'select','label'=>'Prioridad','options'=>['Alta','Media','Baja']]];
 public function handle(string $action): void { if($action==='toggle') { $id=$this->clean($_POST['id']??''); foreach($this->model->all() as $x) if((string)$x['id']===$id) $this->model->update($id,['done'=>!($x['done']??false)]); $_SESSION['flash']='Estado de la tarea actualizado.'; } else parent::handle($action); }
}
