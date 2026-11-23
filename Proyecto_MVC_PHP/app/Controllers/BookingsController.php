<?php
namespace App\Controllers;
use App\Core\ModuleController;
class BookingsController extends ModuleController {
 protected string $title='Sistema de reservas'; protected string $slug='bookings'; protected string $description='Registra citas y consulta las reservas existentes. No permite reservar dos citas para la misma fecha y hora.'; protected array $fields=['client'=>['type'=>'text','label'=>'Nombre del cliente'],'service'=>['type'=>'text','label'=>'Servicio'],'date'=>['type'=>'date','label'=>'Fecha'],'time'=>['type'=>'time','label'=>'Hora']];
 public function create(): void { $date=$this->clean($_POST['date']??''); $time=$this->clean($_POST['time']??''); foreach($this->model->all() as $b) if(($b['date']??'')===$date && ($b['time']??'')===$time) { $_SESSION['flash']='Ese horario ya está reservado. Elige otro.'; return; } parent::create(); }
}
