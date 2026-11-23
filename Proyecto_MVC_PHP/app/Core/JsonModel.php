<?php
namespace App\Core;
class JsonModel {
    protected string $file;
    public function __construct(string $name) {
        $dir = dirname(__DIR__, 2) . '/storage';
        if (!is_dir($dir)) mkdir($dir, 0777, true);
        $this->file = $dir . '/' . $name . '.json';
        if (!file_exists($this->file)) file_put_contents($this->file, '[]');
    }
    public function all(): array { $data=json_decode((string)file_get_contents($this->file), true); return is_array($data)?$data:[]; }
    public function save(array $item): void { $items=$this->all(); $item['id']=$item['id'] ?? bin2hex(random_bytes(5)); $items[]=$item; $this->write($items); }
    public function update(string $id, array $changes): void { $items=$this->all(); foreach($items as &$item) if((string)$item['id']===$id) $item=array_merge($item,$changes); unset($item); $this->write($items); }
    public function delete(string $id): void { $this->write(array_values(array_filter($this->all(),fn($x)=>(string)$x['id']!==$id))); }
    protected function write(array $items): void { file_put_contents($this->file,json_encode($items,JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE),LOCK_EX); }
}
