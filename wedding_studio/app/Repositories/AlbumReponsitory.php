<?php
    namespace App\Repositories;

use App\Models\Album;

class AlbumReponsitory{
        public function all(){
            $albums = Album::all();
            return $albums;
        }

        public function add($requests){
            $album = new Album;
            $album->name = $requests['name'];
            $album->save();
            return $album;
        }
    }
?>
