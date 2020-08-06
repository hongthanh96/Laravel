<?php
    namespace App\Repositories;
    use App\Models\Service;

class ServiceReponsitory{
        public function all(){
            $services = Service::all();
            return $services;
        }

        public function create($service){
            $service->save();
        }

        public function findById($serviceID){
            $service = Service::findOrFail($serviceID);
            return $service;
        }

        public function delete($serviceID){
            $service = Service::findOrFail($serviceID);
            return $service;
        }

    }

?>
