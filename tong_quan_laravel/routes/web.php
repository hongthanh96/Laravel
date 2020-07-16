<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get("homepage",function(){
    return "Đây là trang chủ";
});
//truyen tham so
Route::get('hoten/{ten}',function($ten){
    echo "họ tên của bạn là: ". $ten;
});
Route::get('hue/{ngay}',function($ngay){
    echo "Huế ".$ngay;
})->where(['ngay' => '[a-zA-Z]+']);

//dinh danh router
Route::get('route1',["as" => 'myroute',function(){
    echo "Hello Route 1";
}]);
Route::get('Route2',function(){
    echo "Đây là route 2";
})->name('myRoute2');

Route::get('goiten',function(){
    return redirect()->route('myRoute2');
});
Route::get('login',function(){
    return view('login');
});
Route::post('/login',function(\Illuminate\Http\Request $request){
    if($request->userName == "admin" && $request->password == "admin"){
        return view('welcome_admin');
    }
    else{
        return view('login_erro');
    }
});

Route::get('/product',function(){
    return view('product_discount');
});
Route::post('/product',function(\Illuminate\Http\Request $request){
    $discription = $request->discription;
    $list_price = $request->list_price;
    $discount_percent = $request->discount_percent;
    $discount_amount = $list_price * $discount_percent * 0.1;
    $discountPrice = $list_price - $discount_amount;

    return view('show_discount_amount',[
        'discription' => $discription,
        'list_price' => $list_price,
        'discount_percent' => $discount_percent,
        'discount_amount' => $discount_amount,
        'discountPrice' => $discountPrice,
    ]
);
});

Route::get('/dictionary',function(){
    return view('dictionary');
});
Route::post('/dictionary',function(\Illuminate\Http\Request $request){
    $search = $request->search;
    $dictionary = [
        "hello" => 'xin chào',
        "book" => 'quyển sách',
        "pen" => 'but mực',
        "pencil" => 'bút chì',
        'computer' => 'máy tinh',
    ];
   
    return view('show_dictionary',[
        'search' => $search,
        'dictionary' => $dictionary,
    ]);
});

//route timezone
Route::get('/',function(){
    return view('timezone');
});
Route::get('/{timezone?}',function($timezone = null){
      if (!empty($timezone)) {

        // Khởi tạo giá trị giờ theo múi giờ UTC
        $time = new DateTime(date('Y-m-d H:i:s'), new DateTimeZone('UTC'));

        // Thay đổi về múi giờ được chọn
        $time->setTimezone(new DateTimeZone(str_replace('-', '/', $timezone)));

        // Hiển thị giờ theo định dạng mong muốn
        echo 'Múi giờ bạn chọn ' . $timezone . ' hiện tại đang là: ' . $time->format('d-m-Y H:i:s');
    }
    return view('show_timezone');
});


//group
Route::group(['prefix'=>'MyGroup'],function(){
    Route::get('User1',function(){
        echo "User 1";
    });
    Route::get('User2',function(){
        echo "User 2";
    });
    Route::get('User3',function(){
        echo "User 3";
    });
});

//goi Controller
Route::get('CallController', 'MyController@Hello');
Route::get('thamso/{name}','MyController@KhoaHoc');
Route::get('home','HomeController@index');