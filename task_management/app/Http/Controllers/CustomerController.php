<?php
    namespace App\Http\Controllers;
    use Illuminate\Http\Request;
    class CustomerController extends Controller{
        public function index(){
            return view('customer.index');
        }
        public function create(){
            $number = $_POST["number"];
            $name = $_POST["name"];
            $phone = $_POST["phone"];
            $email = $_POST["email"];
            return view('customer.index',[
                'number'=> $number,
                'name'=> $name,
                'phone'=> $phone,
                'email'=> $email,
            ]);
        }
        public function show($id){
            switch ($id){
                case '1':
                    $number = $id;
                    $name = 'Nguyễn Văn A';
                    $phone = '01234567890';
                    $email = 'email.test@mail.com';
                break;
                case 2:
                    $number = $id;
                    $name = 'Nguyễn Văn B';
                    $phone = '01234567890';
                    $email = 'email.test@mail.com';
                break;

                case '3':
                    $number = $id;
                    $name = 'Nguyễn Văn C';
                    $phone = '01234567890';
                    $email = 'email.test@mail.com';
                break;
                case '4':
                    $number = $id;
                    $name = 'Nguyễn Văn E';
                    $phone = '01234567890';
                    $email = 'email.test@mail.com';
                break;
                case '5':
                    $number = $id;
                    $name = 'Nguyễn Văn F';
                    $phone = '01234567890';
                    $email = 'email.test@mail.com';
                break;
                default:
                    echo "Không tìm thấy khách hàng!";
            }
            return view('customer.show', compact('number','name','phone','email'));
        }
        public function edit($id){

        }
    }
?>
