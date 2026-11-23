<?php
namespace App\Controllers;
use App\Core\ModuleController;
class ExpensesController extends ModuleController {
 protected string $title='Gestor de gastos'; protected string $slug='expenses'; protected string $description='Registra gastos diarios, clasifícalos y revisa el resumen mensual.'; protected array $fields=['concept'=>['type'=>'text','label'=>'Concepto'],'amount'=>['type'=>'number','label'=>'Valor en COP'],'category'=>['type'=>'select','label'=>'Categoría','options'=>['Alimentación','Transporte','Estudio','Salud','Otros']],'date'=>['type'=>'date','label'=>'Fecha']];
 public function index(): array { $d=parent::index(); $month=$_GET['month']??date('Y-m'); $items=array_filter($d['items'],fn($x)=>substr($x['date']??'',0,7)===$month); $d['month']=$month; $d['monthItems']=$items; $d['sum']=array_sum(array_map(fn($x)=>(float)($x['amount']??0),$items)); return $d; }
}
