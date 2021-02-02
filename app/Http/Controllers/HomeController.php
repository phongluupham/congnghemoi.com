<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\ShoppingCart;
use App\Models\Slider;
use App\Models\User;
use App\Models\Suppliers;
use App\Models\ProductSuppliers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    //Hàm hiển thị trang chủ
    public function index()
    {
        $show_sliders = Slider::all();
        $show_product_latests = Product::latest()->take(7)->get();
        $show_category_all = Categories::all();
        return view('home.index',['show_sliders'=>$show_sliders, 'show_product_latests'=>$show_product_latests, 'show_category_all'=>$show_category_all]);
    }

    //Hàm hiển thị trang đăng nhập
    public function page_login()
    {
        if ((Auth::check() && Auth::user()->role_id == 1) || Auth::check() && Auth::user()->role_id == 2){
            return redirect('page-login');
        }else{
            return view('home.page_login');
        }

    }

    //Hàm hiển thị trang danh sách sản phẩm
    public function page_list_product()
    {
        $show_product_all = Product::paginate(12);
        return view('home.page_list_product',['show_product_all'=>$show_product_all]);
    }

    //Hàm hiển thị trang đăng ký
    public function page_register()
    {
        return view('home.page_register');
    }

    //Hàm hiển thị trang đăng ký CSDL
    public function post_register(Request $request)
    {
        $this->validate($request,[
            'InputUserRegister'=>'unique:users,username'

        ],[
            'InputUserRegister.unique'=>'Tên tài khoản đã tồn tại'
        ]);
        $add_register = new User();
        $add_register->fullname = $request->input('InputNameRegister');
        $add_register->username = $request->input('InputUserRegister');
        $add_register->password = bcrypt($request->input('InputPasswordRegister'));
        $add_register->email = $request->input('InputEmailRegister');
        $add_register->phone = $request->input('InputPhoneRegister');
        $add_register->role_id = 3;
        $add_register->save();

        return redirect('page-login')->with('message','Đã đăng ký thành công!!');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('page-login');
    }

    //Hàm hiển thị trang giỏ hàng
    public function page_shopping_cart($username, $id_user)
    {
        $show_carts = ShoppingCart::where('user_id', $id_user)->get();
        return view('home.page_shopping_cart',['show_carts'=>$show_carts]);
    }

    //Hàm hiển thị trang giỏ hàng
    public function update_cart(Request $request, $id_user, $id_cart)
    {
        $update_cart = ShoppingCart::find($id_cart);
        $update_cart->quality = $request->input('inputQuality');
        $update_cart->save();
        return redirect()->back();
    }

    public function delete_cart($id_cart)
    {
     ShoppingCart::destroy($id_cart);
     return redirect()->back();
    }

    //Hàm thêm giỏ hàng
    public function add_to_cart(Request $request, $id_user, $id_product)
    {
        $get_id_product = DB::table('shopping_carts')->where([['product_id','=',$id_product], ['user_id','=',$id_user]])->get();
        foreach ($get_id_product as $value){
            $id_product_cart = $value->id;
            $quality = $value->quality;
        }
        if (!empty($id_product_cart)){
            ShoppingCart::where([['product_id','=',$id_product], ['user_id','=',$id_user]])->update(['quality' => $quality + $request->input('inputQuality')]);
        }else {
            $add_cart = new ShoppingCart();
            $add_cart->user_id = $id_user;
            $add_cart->product_id = $id_product;
            $add_cart->quality = $request->input('inputQuality');
            $add_cart->save();
        }
        return redirect()->back();
    }

    //Hàm nhấp thêm giỏ hàng
    public function add_cart(Request $request, $id_user, $id_product)
    {
        $get_id_product = DB::table('shopping_carts')->where([['product_id','=',$id_product], ['user_id','=',$id_user]])->get();
        foreach ($get_id_product as $value){
            $id_product_cart = $value->id;
            $quality = $value->quality;
        }

        if (!empty($id_product_cart)){
            ShoppingCart::where([['product_id','=',$id_product], ['user_id','=',$id_user]])->update(['quality' => $quality + 1]);
        }else{
            $add_cart = new ShoppingCart();
            $add_cart->user_id = $id_user;
            $add_cart->product_id = $id_product;
            $add_cart->quality = 1;
            $add_cart->save();
        }
        return redirect()->back();
    }

    //Hàm hiển thị trang chi tiết sản phẩm
    public function page_product_detail($product_name, $id_product)
    {
        $view_detail_product = Product::find($id_product);
        $view_id_supplier = ProductSuppliers::where('product_id',$view_detail_product->id)->get();
        $get_categorys = Categories::where('id', $view_detail_product->category_id)->get();
        return view('home.page_product_detail', ['view_detail_product'=>$view_detail_product, 'get_categorys'=>$get_categorys,'view_id_supplier'=>$view_id_supplier]);
    }

    //Hàm hiển thị trang loại sản phẩm
    public function page_category_index($category_name,$id_category)
    {
        $view_category = Categories::find($id_category);
        $get_product_same_category = Product::where('category_id', $view_category->id)->paginate(8);
        return view('home.page_category_index', ['view_category'=>$view_category, 'get_product_same_category'=>$get_product_same_category]);
    }

    //Hàm hiển thị trang thanh toán
    public function page_checkout($id_user)
    {
        $get_carts = ShoppingCart::where('user_id',$id_user)->get();
        return view('home.page_checkout',['get_carts'=>$get_carts]);
    }

    //Hàm hiển thị trang thanh toán
    public function payment(Request $request, $id_user)
    {
        //thực hiện 1
        $add_order = new Order();
        $add_order->user_id = $id_user;
        $add_order->order_status = 0; //chờ thanh toán
        $add_order->save();

        //thực hiện 2
        $max_id_order = DB::table('orders')->max('id');

        //thực hiện 3
        $get_cart_users = ShoppingCart::where('user_id',$id_user)->get();
        foreach ($get_cart_users as $get_cart_user){

            $find_product = Product::find($get_cart_user->product_id);
            $qty = $find_product->product_quality;
            $price_product = $find_product->product_price;
            $add_detail = new OrderDetail();
            $add_detail->order_id = $max_id_order;
            $add_detail->product_id = $get_cart_user->product_id;
            $add_detail->total_quality = $get_cart_user->quality;
            $add_detail->total_price = $price_product * $get_cart_user->quality;
            $add_detail->save();

            Product::where('id', $get_cart_user->product_id)->update(['product_quality' => ($qty - $get_cart_user->quality)]);

        }

        ShoppingCart::where('user_id',$id_user)->delete();

        return redirect('/');

    }

    //Hàm thay đổi địa chỉ
    public function change_address_user(Request $request, $id_user)
    {
        $change_address = User::find($id_user);
        $change_address->address = $request->input('inputAddress');
        $change_address->save();
        return redirect()->back()->with('message', 'Đã thay đổi địa chỉ');
    }

    //Hàm hiển thị trang thông tin cá nhân
    public function change_password($id_user_pass)
    {
        $infor_password = User::find($id_user_pass);
        return view('home.profile_user.change_password',['infor_password'=>$infor_password]);
    }
    //Hàm hiển thị trang thông tin cá nhân
    public function update_password(Request $request, $id_user_pass)
    {

        $users = DB::table('users')->where('id', $id_user_pass)->get();

        $old_pass = $request->input('OldPasswordUser');
        $new_pass = $request->input('NewPasswordUser');
        $new_pass_confirm = $request->input('PasswordUserConfirm');

        $change_pass = User::find($id_user_pass);

        foreach($users as $val_users){
            //Lấy mật khẩu trong DB lưu vào biến
            $db_pass = $val_users->password;

            if(password_verify($old_pass,$db_pass)){
                if($new_pass == $new_pass_confirm){
                    $change_pass->password = bcrypt($request->input('PasswordUserConfirm'));
                    $change_pass->save();


                    return redirect()->back()->with('message','Thay đổi mật khẩu thành công');
                }else{
                    return redirect()->back()->with('message_error_pass_old_comfirm','Xác nhận mật khẩu sai!');
                }
            }else{
                return redirect()->back()->with('message_error_pass_old','Mật khẩu cũ không đúng!');
            }
        }
    }
    //Hàm hiển thị trang thông tin cá nhân
    public function page_infor_user($id_user3)
    {
        $infor_user = User::find($id_user3);
        return view('home.profile_user.infor_user',['infor_user'=>$infor_user]);
    }
    //Hàm hiển thị trang cập nhật thông tin cá nhân
    public function update_infor_user(Request $request, $id_user3)
    {
        $update_infor_user = User::find($id_user3);
        $update_infor_user->sex = $request->input('InputSexUser');
        $update_infor_user->birthday = $request->input('InputBirthdayUser');
        $update_infor_user->phone = $request->input('InputPhoneUser');
        $update_infor_user->email = $request->input('InputEmailUser');
        $update_infor_user->address = $request->input('InputAddressUser');

        if($request->hasFile('InputImageUser')){
            $image = $request->file('InputImageUser');
            $image_name = $image->getClientOriginalName();
            $image->move(public_path('upload_images'),$image_name);
            $update_infor_user->avatar = $image_name;
        }
        $update_infor_user->save();
        return redirect()->back()->with('message','Đã cập nhật thông tin');
    }
    //Hàm hiển thị trang chờ thanh toán
    public function page_wait_payment($id_user)
    {
        $show_orders = Order::where([['user_id', '=', $id_user], ['order_status','=',0]])->latest()->get();
        return view('home.profile_user.page_wait_payment',['show_orders'=>$show_orders]);
    }
    //Hàm hiển thị trang đã giao hàng
    public function page_deliveryed($id_user)
    {
        $show_deliveries = Order::where([['user_id','=',$id_user],['order_status','=',2]])->latest()->get();
        return view('home.profile_user.page_deliveryed',['show_deliveries'=>$show_deliveries]);
    }


     //Hàm đưa sản phẩm sang mục đã hủy
     public function cancel_order($id_user, $id_order)
     {
         Order::where('id', $id_order)
             ->where('user_id', $id_user)
             ->update(['order_status' => 1]);
         return redirect()->back()->with('message','Đã hủy đơn hàng');
     }

    //Hàm hiển thị trang đã hủy đơn hàng
    public function page_cancel_order($id_user)
    {
        $show_order_cancels = Order::where([['user_id','=', $id_user], ['order_status','=',1]])->latest()->take(10)->get();
        return view('home.profile_user.page_cancel_order',['show_order_cancels'=>$show_order_cancels]);
    }

    //Hàm tìm kiếm sản phẩm
    public function search_product(Request $request)
    {
        $show_searchs = DB::table('products')
            ->where('product_name','like','%'.($request->input('search')).'%')
            ->orWhere('product_price','like',$request->input('search'))->get();
        if (!empty($show_searchs)) {
            $count = $show_searchs->count();
        }
        else {
            $count = 0;
        }
        return view('home.page_show_search_product',['show_searchs'=>$show_searchs,'count'=>$count]);

    }
}
