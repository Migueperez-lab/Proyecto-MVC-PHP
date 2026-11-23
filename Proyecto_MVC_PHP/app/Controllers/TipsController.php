<?php
namespace App\Controllers;
use App\Core\ModuleController;
class TipsController extends ModuleController {
 protected string $title='Calculadora de propinas'; protected string $slug='tips'; protected string $description='Calcula cuánto dejar de propina y cuánto paga cada persona.'; protected array $fields=[];
 public function index(): array { $d=parent::index(); $d['result']=null; if(isset($_POST['calculate'])) { $total=max(0,(float)($_POST['total']??0)); $percent=max(0,(float)($_POST['percent']??10)); $people=max(1,(int)($_POST['people']??1)); $tip=$total*$percent/100; $d['result']=['total'=>$total,'tip'=>$tip,'grand'=>$total+$tip,'each'=>($total+$tip)/$people,'people'=>$people,'percent'=>$percent]; } return $d; }
}
