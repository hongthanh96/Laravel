<?php 

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

    class MyController extends BaseController
    {
        use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
        public function Hello(){
            echo "Xin chào các bạn!";
        }
        public function KhoaHoc($name){
            echo "Khóa học: ". $name;
        }
    }
?>