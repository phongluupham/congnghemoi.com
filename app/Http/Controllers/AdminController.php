<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\ProductSuppliers;
use App\Models\RoleAccess;
use App\Models\Slider;
use App\Models\Suppliers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    // //Hàm hiển thị trang admin
    // public function page_admin()
    // {
    //     return view('layout.layoutadmin');
    // }

    //Hàm đăng nhập back-end
    public function post_login(Request $request)
    {
        $username = $request->input('inputUsername');
        $password = $request->input('inputPassword');

        if (Auth::attempt(['username' => $username, 'password' => $password, 'role_id' => 1])) {
            return redirect('page-index-admin');
        }elseif (Auth::attempt(['username' => $username, 'password' => $password, 'role_id' => 2])) {
                return redirect('page-index-admin');
        }elseif (Auth::attempt(['username' => $username, 'password' => $password, 'role_id' => 3])){
            return redirect('/');
        }else {
            $message = $request->session()->get('messagelogin');
            return redirect()->back()->with('messagelogin','');
        }



    }
     //Hàm hiển thị trang chủ admin
     public function page_index_admin()
     {
      if ((Auth::check() && Auth::user()->role_id == 1) || Auth::check() && Auth::user()->role_id == 2){
          $show_orders = Order::latest()->take(1)->get();
             return view('admin.index_admin',['show_orders'=>$show_orders]);
     }else
         return redirect('page-login');
     }

    //Hàm hiển thị trang đăng xuất
    public function logout()
    {
        Auth::logout();
        return redirect('page-login');
    }

     //Hàm hiển thị trang quyền truy cập
     public function page_role_access()
     {
         $show_roles = User::latest()->paginate(5);
         return view('admin.role_access',['show_roles'=>$show_roles]);


     }

     //Hàm hiển thị thêm quyền truy cập CSDL
     public function post_add_role_access(Request $request)
     {
         $add_role = new RoleAccess();
         $add_role->role_name = $request->input('inputRoleName');
         $add_role->role_discribe = $request->input('inputRoleDescription');
         $add_role->save();

         return redirect()->back()->with('message','Đã thêm quyền');
     }



     //Hàm hiển thị trang thay đổi quyền truy cập
     public function page_change_role_access($id_role)
     {
         $role_ids = User::find($id_role);
         return view('admin.change_role_access',['role_ids'=>$role_ids]);
     }
     //Hàm hiển thị trang thay đổi quyền truy cập back-end
     public function update_role(Request $request, $id_role)
     {
         $update_role = User::find($id_role);
         $update_role->role_id = $request->input('InputChangerole');
         $update_role->save();
        return redirect()->back()->with('message','Đã thay đổi quyền');
     }
     //Hàm hiển thị trang quản trị
     public function page_administrator()
     {
         $show_admins = User::where('role_id',1)->latest()->paginate(5);
         return view('admin.administrator',['show_admins'=>$show_admins]);
     }
     //Hàm hiển thị trang thêm mới quản trị CSDL
     public function post_administrator(Request $request)
     {
        $this->validate($request,[
            'InputAdminAccount'=>'unique:users,username',
            'InputAdminEmail'=>'unique:users,email'
            ],[
                'InputAdminAccount.unique'=>'Tên tài khoản đã tồn tại',
                 'InputAdminEmail.unique'=>'Tên email đã tồn tại'
        ]);
        $add_admin = new User();
        $add_admin->role_id = $request->input('InputRoleId');
        $add_admin->fullname = $request->input('InputAdminName');
        $add_admin->username = $request->input('InputAdminAccount');
        $add_admin->password = bcrypt($request->input('InputAdminPassword'));
        $add_admin->email = $request->input('InputAdminEmail');
        $add_admin->sex = $request->input('InputSex');
        $add_admin->birthday = $request->input('InputAdminBirthday');
        $add_admin->phone = $request->input('InputAdminPhone');
        $add_admin->address = $request->input('InputAdminAddress');

//        $add_admin->avatar = $request->input('InputRoleId');

         if($request->hasFile('InputFileImage')){
             $image = $request->file('InputFileImage');
             $image_name = $image->getClientOriginalName();
             $image->move(public_path('upload_images'),$image_name);
             $add_admin->avatar = $image_name;
         }
         $add_admin->save();

         return redirect('page-administrator' )->with('message','Đã thêm người dùng quản trị');

     }
     //Hàm hiển thị trang nhân viên
     public function page_staff()
     {
         $show_staffs = User::where('role_id',2)->latest()->paginate(5);
         return view('admin.staff',['show_staffs'=>$show_staffs]);
     }

    //Hàm xóa nhân viên từ CSDl
    public function delete_staff($id_staff)
    {
        //Cách 1
        User::destroy($id_staff);
        //Cách 2
        //User::where('id','=',$id_staff)->delete();
        //Cách 3
        //DB::table('users')->where('id',$id_staff)->delete();
        return redirect()->back()->with('message','Đã xóa nhân viên');
    }

    public function post_staff(Request $request)
    {
        $this->validate($request,[
            'InputStaffAccount'=>'unique:users,username',
            'InputStaffEmail'=>'unique:users,email'
        ],[
            'InputStaffAccount.unique'=>'Tên tài khoản đã tồn tại',
            'InputStaffEmail.unique'=>'Tên email đã tồn tại'
        ]);
        $add_staff = new User();
        $add_staff->role_id = 2;
        $add_staff->fullname = $request->input('InputStaffName');
        $add_staff->username = $request->input('InputStaffAccount');
        $add_staff->password = bcrypt($request->input('InputStaffPassword'));
        $add_staff->email = $request->input('InputStaffEmail');
        $add_staff->sex = $request->input('InputStaffSex');
        $add_staff->birthday = $request->input('InputStaffBirthday');
        $add_staff->phone = $request->input('InputStaffPhone');
        $add_staff->address = $request->input('InputStaffAddress');



        if($request->hasFile('InputFileImage2')){
            $image = $request->file('InputFileImage2');
            $image_name = $image->getClientOriginalName();
            $image->move(public_path('upload_images'),$image_name);
            $add_staff->avatar = $image_name;
        }
        $add_staff->save();

        return redirect('page-staff' )->with('message','Đã thêm người dùng nhân viên');

    }

     //Hàm hiển thị trang khách hàng
     public function page_customer()
     {
         $show_customer = User::where('role_id',3)->latest()->paginate(5);
         return view('admin.customer',['show_customer'=>$show_customer]);
     }
    //Hàm xóa khách hàng
    public function delete_customer($id_customer)
    {
        User::destroy($id_customer);
        return redirect()->back()->with('message','Đã xóa khách hàng');
    }

    //Hàm hiển thị trang loại sản phẩm
    public function page_category()
    {
        $show_categories = Categories::latest()->paginate(5);
        return view('admin.category',['show_categories'=>$show_categories]);
    }

    //Hàm hiển thị thêm loại sản phẩm CSDL
    public function post_add_category(Request $request)
    {
        $add_category = new Categories();
        $add_category->category_name = $request->input('InputNameCategory');
        $add_category->category_description = $request->input('InputDiscribeCategory');

        if($request->hasFile('InputImageCategory')){
            $image = $request->file('InputImageCategory');
            $image_name = $image->getClientOriginalName();
            $image->move(public_path('upload_images_category'),$image_name);
            $add_category->category_image = $image_name;
        }

        $add_category->save();

         return redirect()->back()->with('message','Đã thêm loại sản phẩm');
    }

    //Hàm hiển thị trang loại sản phẩm
    public function delete_category($id_category)
    {
        Categories::destroy($id_category);
        return redirect()->back()->with('message','Đã xóa loại sản phẩm');
    }

     //Hàm hiển thị trang danh sách sản phẩm
     public function page_list_product_admin()
     {
         $show_product = Product::latest()->paginate(5);
         return view('admin.list_product_admin',['show_product'=>$show_product]);
     }
    //Hàm hiển thị thêm danh sách sản phẩm CSDL
    public function post_list_product_admin(Request $request)
    {
        //Thực hiện run đầu tiên
        $this->validate($request,[
            'InputNameProduct'=>'unique:products,product_name'
        ],[
            'InputNameProduct.unique'=>'Tên sản phẩm đã tồn tại'
        ]);

        //Thực hiện run 2
        $add_product = new Product();
        $add_product->category_id = $request->input('InputCategoryId');
        $add_product->product_name = $request->input('InputNameProduct');
        $add_product->product_quality = $request->input('InputAmountProduct');
        $add_product->product_price	 = $request->input('InputPriceProduct');
        $add_product->product_discribe = $request->input('InputDiscribeProduct');
        $add_product->product_discount = $request->input('InputDiscountProduct');
        $add_product->product_unitprice = $request->input('InputUnitPriceProduct');
        $add_product->product_tax = $request->input('InputTaxProduct');

        if($request->hasFile('InputImageProduct')){
            $image = $request->file('InputImageProduct');
            $image_name = $image->getClientOriginalName();
            $image->move(public_path('upload_imagesproduct'),$image_name);
            $add_product->product_image = $image_name;
        }
        $add_product->save();

        //Thực hiện run 3
        $max_id_product = DB::table('products')->max('id');

        //thực hiện run 4
        $add_pro_sup = new ProductSuppliers();
        $add_pro_sup->product_id = $max_id_product;
        $add_pro_sup->supplier_id = $request->input('InputSupplierId');
        $add_pro_sup->save();

        return redirect('page-list-product-admin' )->with('message','Đã thêm sản phẩm');
    }

    //Hàm xóa sản phẩm
    public function delete_list_product_admin($id_product)
    {
        Product::destroy($id_product);
        return redirect()->back()->with('message','Đã xóa sản phẩm');
    }

    //Hàm hiển thị trang danh sách sản phẩm
     public function page_product_discribe($product_discribe, $id_product_discribe)
     {
        $show_product_discribe = Product::find($id_product_discribe);
         return view('admin.product_discribe',['show_product_discribe'=>$show_product_discribe]);
     }
     //Hàm hiển thị trang nhà cung cấp
     public function page_supplier()
     {
         $show_supplier = Suppliers::latest()->paginate(5);
         return view('admin.supplier',['show_supplier'=>$show_supplier]);

     }
     //Hàm hiển thị trang nhà cung cấp CSDL
     public function post_supplier(Request $request)
     {
         $this->validate($request,[
             'InputNameSupplier'=>'unique:suppliers,supplier_name',
             'InputImageSupplier'=>'unique:suppliers,supplier_image'
         ],[
             'InputNameSupplier.unique'=>'Tên nhà cung cấp đã tồn tại',
             'InputImageSupplier.unique'=>'Hình ảnh nhà cung cấp đã tồn tại'
         ]);
         $add_supplier = new Suppliers();
         $add_supplier->supplier_name = $request->input('InputNameSupplier');
         $add_supplier->supplier_address = $request->input('InputAddressSupplier');
         $add_supplier->supplier_discribe = $request->input('InputDiscribeSupplier');
         if($request->hasFile('InputImageSupplier')){
             $image = $request->file('InputImageSupplier');
             $image_name = $image->getClientOriginalName();
             $image->move(public_path('upload_imagessupplier'),$image_name);
             $add_supplier->supplier_image = $image_name;
         }
         $add_supplier->save();
         return redirect('page-supplier' )->with('message','Đã thêm nhà cung cấp');
     }

    //Hàm xóa nhà cung cấp
    public function delete_supplier($id_supplier)
    {
        Suppliers::destroy($id_supplier);
        return redirect()->back()->with('message','Đã xóa nhà cung cấp');

    }

     //Hàm hiển thị trang chỉnh sửa sản phẩm
     public function page_edit_list_product_admin($id_edit_product)
     {
         $edit_product = Product::find($id_edit_product);
         return view('admin.edit_list_product_admin',['edit_product'=>$edit_product]);
     }

    //Hàm hiển thị trang chỉnh sửa sản phẩm back-end
    public function update_edit_list_product_admin(Request $request, $id_edit_product)
    {
        $update_product = Product::find($id_edit_product);
        $update_product->product_name = $request->input('InputNameProductEdit');
        $update_product->product_price = $request->input('InputPriceProductEdit');
        $update_product->product_quality = $request->input('InputAmountProductEdit');
        $update_product->product_discount = $request->input('InputDiscountProductEdit');
        $update_product->product_unitprice = $request->input('InputUnitPriceProductEdit');
        $update_product->product_tax = $request->input('InputTaxProductEdit');
        $update_product->product_discribe = $request->input('InputDiscribeProductEdit');
        $update_product->category_id = $request->input('InputCategoryIdEdit');

        if($request->hasFile('InputImageProductEdit')){
            $image = $request->file('InputImageProductEdit');
            $image_name = $image->getClientOriginalName();
            $image->move(public_path('upload_imagesproduct'),$image_name);
            $update_product->product_image = $image_name;
        }
        $update_product->save();

        //Thực hiện run 3
        $product_suppliers = DB::table('product__suppliers')->where('product_id', $id_edit_product)->first();
        $max_id = $product_suppliers->id;

        //thực hiện run 4
        $update_pro_sup_edit = ProductSuppliers::find($max_id);
        $update_pro_sup_edit->product_id = $id_edit_product;
        $update_pro_sup_edit->supplier_id = $request->input('InputSupplierIdEdit');
        $update_pro_sup_edit->save();

        return redirect('page-list-product-admin')->with('message','Đã cập nhật sản phẩm');
    }

     //Hàm hiển thị trang chỉnh sửa nhà cung cấp
     public function page_edit_supplier($id_edit_supplier)
     {
         $edit_supplier = Suppliers::find($id_edit_supplier);
         return view('admin.edit_supplier',['edit_supplier'=>$edit_supplier]);
     }
    //Hàm hiển thị trang chỉnh sửa nhà cung cấp back-end
    public function update_edit_supplier(Request $request, $id_edit_supplier)
    {
        $update_supplier = Suppliers::find($id_edit_supplier);
        $update_supplier->supplier_name = $request->input('InputNameSupplierEdit');
        $update_supplier->supplier_address = $request->input('InputAddressSupplierEdit');
        $update_supplier->supplier_discribe = $request->input('InputDiscribeSupplierEdit');

        if($request->hasFile('InputImageSupplierEdit')){
            $image = $request->file('InputImageSupplierEdit');
            $image_name = $image->getClientOriginalName();
            $image->move(public_path('upload_imagessupplier'),$image_name);
            $update_supplier->supplier_image = $image_name;
        }
        $update_supplier->save();
        return redirect('page-supplier')->with('message','Đã cập nhật thông tin nhà cung cấp');
    }
     //Hàm hiển thị trang thông tin admin
     public function page_profile_admin($id_user)
     {
         $infor_user = User::find($id_user);
         return view('admin.profile_admin',['infor_user'=>$infor_user]);
     }
    //Hàm hiển thị trang cập nhật thông tin admin
    public function update_infor_user(Request $request,$id_user)
    {
        $update_infor_user = User::find($id_user);
        $update_infor_user->sex = $request->input('InputSexProfile');
        $update_infor_user->phone = $request->input('InputPhoneProfile');
        $update_infor_user->birthday = $request->input('InputBirthdayProfile');
        $update_infor_user->address = $request->input('InputAddressProfile');
        $update_infor_user->email = $request->input('InputEmailProfile');
        if($request->hasFile('InputImageProfile')){
            $image = $request->file('InputImageProfile');
            $image_name = $image->getClientOriginalName();
            $image->move(public_path('upload_images'),$image_name);
            $update_infor_user->avatar = $image_name;
        }
        $update_infor_user->save();
        return redirect()->back()->with('message','Đã cập nhật thông tin');
    }
     //Hàm hiển thị trang đổi mật khẩu admin
     public function page_change_password_admin($id_user_password)
     {
         $infor_password = User::find($id_user_password);
         return view('admin.change_password_admin',['infor_password'=>$infor_password]);
     }

    //Hàm cập nhật mật khẩu admin
    public function update_password_admin(Request $request, $id_user_password)
    {
        $users = DB::table('users')->where('id', $id_user_password)->get();

        $old_pass = $request->input('OldPassword');
        $new_pass = $request->input('NewPassword');
        $new_pass_confirm = $request->input('ConfirmNewPassword');

        $change = User::find($id_user_password);

        foreach($users as $val_users){
            //Lấy mật khẩu trong DB lưu vào biến
            $db_pass = $val_users->password;

            if(password_verify($old_pass,$db_pass)){
                if($new_pass == $new_pass_confirm){
                    $change->password = bcrypt($request->input('ConfirmNewPassword'));
                    $change->save();
                    return redirect()->back()->with('message','Thay đổi mật khẩu thành công');
                }else{
                    return redirect()->back()->with('message_error_pass_old_comfirm','Xác nhận mật khẩu sai!');
                }
            }else{
                return redirect()->back()->with('message_error_pass_old','Mật khẩu cũ không đúng!');
            }
        }
    }

//     //Thông tin cá nhân
//     public function infor_profile_user($id_user)
//     {
//        $infor_user = User::find($id_user);
//         return view('admin.infor_profile_user',['infor_user'=>$infor_user]);
//     }

     //Hàm hiển thị trang quản lí hóa đơn
     public function page_order_admin()
     {
        $show_order = Order::latest()->paginate(5);
         return view('admin.order_admin',['show_order'=>$show_order]);
     }

    //Hàm chuyển trạng thái sang đã giao hàng
    public function change_deliveries($id_user, $id_order)
    {
        Order::where('id',$id_order)
            ->where('user_id',$id_user)
            ->update(['order_status' => 2]); //Đã giao hàng
        return redirect()->back()->with('message','Đã duyệt đơn hàng');
    }

     //Hàm hiển thị trang quản lí chi tiết hóa đơn
     public function page_order_detail_admin($id_order)
     {
         $show_orders = Order::find($id_order);
         $show_order_details = OrderDetail::where('order_id', $id_order)->get();
         return view('admin.order_detail_admin',['show_orders'=>$show_orders, 'show_order_details'=>$show_order_details]);
     }
     //Hàm hiển thị trang in hóa đơn
     public function page_print_order($id_order)
     {
         $show_orders = Order::find($id_order);
         $show_order_details = OrderDetail::where('order_id', $id_order)->get();
         return view('admin.print_order',['show_orders'=>$show_orders, 'show_order_details'=>$show_order_details]);
     }
     //Hàm hiển thị trang slider
     public function page_slider()
     {
         $show_slider = Slider::latest()->paginate(5);
         return view('admin.slider',['show_slider'=>$show_slider]);
     }

    //Hàm hiển thị trang slider back-end
    public function post_slider(Request $request)
    {
        $this->validate($request,[
            'InputTitleSlider'=>'unique:sliders,title_slider',
            'InputImageSlider'=>'unique:sliders,image_slider'
        ],[
            'InputTitleSlider.unique'=>'Tiêu đề slider đã tồn tại',
            'InputImageSlider.unique'=>'Hình ảnh slider đã tồn tại'
        ]);
        $add_slider = new Slider();
        $add_slider->product_id = $request->input('InputProductId');;
        $add_slider->title_slider = $request->input('InputTitleSlider');
        if($request->hasFile('InputImageSlider')){
            $image = $request->file('InputImageSlider');
            $image_name = $image->getClientOriginalName();
            $image->move(public_path('upload_imagesslider'),$image_name);
            $add_slider->image_slider = $image_name;
        }
        $add_slider->save();
        return redirect('page-slider' )->with('message','Đã thêm slider');
    }

    //Hàm xóa slider
    public function delete_slider($id_slider)
    {
        Slider::destroy($id_slider);
        return redirect()->back()->with('message','Đã xóa slider');
    }

     //Hàm hiển thị trang chỉnh sửa slider
     public function page_edit_slider($id_slider_edit)
     {
         $edit_slider = Slider::find($id_slider_edit);
         return view('admin.edit_slider',['edit_slider'=>$edit_slider]);
     }

    //Hàm hiển thị trang chỉnh sửa slider back-end
    public function update_slider(Request $request, $id_slider_edit)
    {
        $update_slider = Slider::find($id_slider_edit);
        $update_slider->title_slider = $request->input('InputNameSliderEdit');
        $update_slider->product_id = $request->input('InputProductIdEdit');

        if($request->hasFile('InputImageSliderEdit')){
            $image = $request->file('InputImageSliderEdit');
            $image_name = $image->getClientOriginalName();
            $image->move(public_path('upload_imagesslider'),$image_name);
            $update_slider->image_slider = $image_name;
        }
        $update_slider->save();
        return redirect('page-slider')->with('message','Đã cập nhật slider');
    }

}
