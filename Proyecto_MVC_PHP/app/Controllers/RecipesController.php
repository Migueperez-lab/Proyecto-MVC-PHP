<?php
namespace App\Controllers;
use App\Core\ModuleController;
class RecipesController extends ModuleController {
 protected string $title='Plataforma de recetas'; protected string $slug='recipes'; protected string $description='Guarda recetas y busca por tipo de comida o ingredientes. Puedes compartir una receta copiando su enlace.'; protected array $fields=['name'=>['type'=>'text','label'=>'Nombre'],'category'=>['type'=>'select','label'=>'Tipo de comida','options'=>['Desayuno','Almuerzo','Cena','Postre','Bebida']],'ingredients'=>['type'=>'text','label'=>'Ingredientes'],'instructions'=>['type'=>'textarea','label'=>'Preparación']];
 public function index(): array { $d=parent::index(); $q=strtolower(trim($_GET['q']??'')); if($q!=='')$d['items']=array_values(array_filter($d['items'],fn($r)=>str_contains(strtolower(($r['name']??'').' '.($r['ingredients']??'').' '.($r['category']??'')),$q))); $d['query']=$q; return $d; }
}
