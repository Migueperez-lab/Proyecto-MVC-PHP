<?php
namespace App\Core;
class App {
 private array $routes=[];
 public function __construct() {
  $map=['tasks'=>'Task','tips'=>'Tip','passwords'=>'Password','expenses'=>'Expense','bookings'=>'Booking','notes'=>'Note','events'=>'Event','recipes'=>'Recipe','memory'=>'Memory','surveys'=>'Survey','stopwatch'=>'Lap'];
  foreach($map as $slug=>$model) { $controller='App\\Controllers\\'.ucfirst($slug).'Controller'; $modelClass='App\\Models\\'.$model.'Model'; $this->routes[$slug]=[new $controller(new $modelClass()),'app/Views/'.$slug.'/index.php']; }
 }
 public function run(): void {
  $slug=$_GET['page']??'tasks'; if(!isset($this->routes[$slug])) $slug='tasks'; [$controller,$view]=$this->routes[$slug];
  if($_SERVER['REQUEST_METHOD']==='POST') { $controller->handle($_POST['action']??''); header('Location: index.php?page='.urlencode($slug)); exit; }
  $data=$controller->index(); extract($data); $current=$slug; require dirname(__DIR__).'/Views/layouts/header.php'; require dirname(__DIR__,2).'/'.$view; require dirname(__DIR__).'/Views/layouts/footer.php';
 }
}
