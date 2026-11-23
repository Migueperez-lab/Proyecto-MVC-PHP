<?php
namespace App\Controllers;
use App\Core\ModuleController;
class StopwatchController extends ModuleController { protected string $title='Cronómetro online'; protected string $slug='stopwatch'; protected string $description='Inicia, pausa, reinicia y registra vueltas o tiempos parciales.'; protected array $fields=[]; }
