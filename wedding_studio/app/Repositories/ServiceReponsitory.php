<?php
    namespace App\Repositories;
    use App\Models\Service;

class ServiceReponsitory{
        public function all(){
            $services = Service::all();
            return $services;
        }

    }

?>
