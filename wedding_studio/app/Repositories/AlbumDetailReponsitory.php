<?php
    namespace App\Repositories;
use App\Models\Album;
use App\Models\Albumdetail;
use App\Repositories\AlbumDetailReponsitoryInterface;

class AlbumDetailReponsitory implements AlbumDetailReponsitoryInterface{
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
