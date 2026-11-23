<?php
namespace App\Controllers;
use App\Core\ModuleController;
class SurveysController extends ModuleController {
 protected string $title='Plataforma de encuestas'; protected string $slug='surveys'; protected string $description='Crea encuestas de dos opciones, recibe respuestas y consulta los resultados.'; protected array $fields=['question'=>['type'=>'text','label'=>'Pregunta'],'option1'=>['type'=>'text','label'=>'Opción 1'],'option2'=>['type'=>'text','label'=>'Opción 2']];
 public function handle(string $action): void { if($action==='vote') { $id=$this->clean($_POST['id']??''); $choice=$this->clean($_POST['choice']??''); foreach($this->model->all() as $s) if((string)$s['id']===$id && in_array($choice,['1','2'],true)) { $votes=$s['votes']??['1'=>0,'2'=>0]; $votes[$choice]=(int)($votes[$choice]??0)+1; $this->model->update($id,['votes'=>$votes]); } $_SESSION['flash']='Tu respuesta fue registrada.'; } else parent::handle($action); }
 public function create(): void { $data=[]; foreach($this->fields as $k=>$f) { $v=$this->clean($_POST[$k]??''); if($v===''){$_SESSION['flash']='Completa todos los campos.';return;} $data[$k]=$v; } $data['votes']=['1'=>0,'2'=>0]; $this->model->save($data); $_SESSION['flash']='Encuesta creada.'; }
}
