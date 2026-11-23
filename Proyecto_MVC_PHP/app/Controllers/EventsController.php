<?php
namespace App\Controllers;
use App\Core\ModuleController;
class EventsController extends ModuleController {
 protected string $title='Calendario de eventos'; protected string $slug='events'; protected string $description='Agrega, edita y elimina eventos del calendario.'; protected array $fields=['title'=>['type'=>'text','label'=>'Evento'],'date'=>['type'=>'date','label'=>'Fecha'],'time'=>['type'=>'time','label'=>'Hora'],'description'=>['type'=>'textarea','label'=>'Descripción']];
 public function index(): array { $d=parent::index(); usort($d['items'],fn($a,$b)=>strcmp(($a['date']??'').($a['time']??''),($b['date']??'').($b['time']??''))); return $d; }
}
