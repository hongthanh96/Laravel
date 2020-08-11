<?php
    namespace App\Repositories;

use App\Models\Albumdetail;
use App\Models\Packdetail;
use App\Models\Service;

class HomepageRepository
     {
        public function serviceAll(){
            $services = Service::all();
            return $services;
        }

        public function packDetailAll(){
            $packDetails = Packdetail::all();
            return $packDetails;
        }

        public function albumHot(){
            $albumHots =  Albumdetail::where('isHot','1')->get();
            return $albumHots;
        }
    }
?>
