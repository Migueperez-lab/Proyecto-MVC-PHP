<?php
namespace App\Controllers;
use App\Core\ModuleController;
class PasswordsController extends ModuleController {
 protected string $title='Generador de contraseñas seguras'; protected string $slug='passwords'; protected string $description='Genera una contraseña aleatoria. Selecciona longitud y tipos de caracteres.'; protected array $fields=[];
 public function index(): array { $d=parent::index(); $d['password']=null; if(isset($_POST['generate'])) { $len=max(6,min(64,(int)($_POST['length']??16))); $chars=''; if(isset($_POST['lower']))$chars.='abcdefghijklmnopqrstuvwxyz'; if(isset($_POST['upper']))$chars.='ABCDEFGHIJKLMNOPQRSTUVWXYZ'; if(isset($_POST['numbers']))$chars.='0123456789'; if(isset($_POST['symbols']))$chars.='!@#$%&*_-+='; if($chars==='')$chars='abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'; $p=''; for($i=0;$i<$len;$i++)$p.=$chars[random_int(0,strlen($chars)-1)]; $d['password']=$p; } return $d; }
}
