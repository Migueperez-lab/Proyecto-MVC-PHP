<?php
namespace App\Controllers;
use App\Core\ModuleController;
class NotesController extends ModuleController {
 protected string $title='Gestor de notas'; protected string $slug='notes'; protected string $description='Guarda notas, clasifícalas y búscalas por título, contenido o categoría.'; protected array $fields=['title'=>['type'=>'text','label'=>'Título'],'category'=>['type'=>'text','label'=>'Categoría'],'content'=>['type'=>'textarea','label'=>'Contenido']];
 public function index(): array { $d=parent::index(); $q=strtolower(trim($_GET['q']??'')); if($q!=='')$d['items']=array_values(array_filter($d['items'],fn($n)=>str_contains(strtolower(($n['title']??'').' '.($n['content']??'').' '.($n['category']??'')),$q))); $d['query']=$q; return $d; }
}
