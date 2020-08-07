<?php
    namespace App\Repositories;

use App\Models\Album;
use App\Models\Albumdetail;

class AlbumDetailReponsitory{
        public function all(){
            $albumDetails = Albumdetail::all();
            return $albumDetails;
        }

        public function allAlbum(){
            $albums = Album::all();
            return $albums;
        }

        public function add($requests){
            $albumDetails = Albumdetail::create($requests);
            return $albumDetails;
        }
    }
?>
