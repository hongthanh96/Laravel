<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;

    class MyController extends Controller
    {
        public function Hello(){
            echo "Xin chào các bạn!";
        }
        public function KhoaHoc($name){
            echo "Khóa học: ". $name;
        }
    }
?>