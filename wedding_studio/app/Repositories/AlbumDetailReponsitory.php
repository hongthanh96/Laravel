<?php
    namespace App\Repositories;

use App\Models\Albumdetail;

class AlbumDetailReponsitory{
        public function all(){
            $albums = Albumdetail::all();
            return $albums;
        }
    }
?>
