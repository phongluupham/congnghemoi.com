<?php
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckLogin;

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

//Trang đăng nhập
Route::get('page-login', [HomeController::class, 'page_login']);

//Đăng xuất
Route::get('logout', [AdminController::class, 'logout']);

//Trang đăng nhập CSDL
Route::post('post-login', [AdminController::class, 'post_login']);



//==========================================================================
//TRANG CHỦ
Route::get('/', [HomeController::class, 'index']);

//Trang sản phẩm
Route::get('page-list-product', [HomeController::class, 'page_list_product']);

//Trang đăng ký
Route::get('page-register', [HomeController::class, 'page_register']);

//Trang đăng ký CSDL
Route::post('post-register', [HomeController::class, 'post_register']);

//Trang giỏ hàng
Route::get('page-shopping-cart/{username}/{id_user}', [HomeController::class, 'page_shopping_cart']);

//Cập nhật giỏ hàng
Route::put('update-cart/{id_user}/{id_cart}', [HomeController::class, 'update_cart']);

//Xóa 1 món hàng trong giỏ hàng
Route::get('delete-cart/{id_cart}', [HomeController::class, 'delete_cart']);

//Trang chi tiết sản phẩm
Route::get('page-product-detail/{product_name}/{id_product}', [HomeController::class, 'page_product_detail']);

//Thêm vào giỏ hàng
Route::post('add-to-cart/{id_user}/{id_product}', [HomeController::class, 'add_to_cart']);

//Nhấp thêm vào giỏ hàng
Route::get('add-cart/{id_user}/{id_product}', [HomeController::class, 'add_cart']);

//Trang sản phẩm theo loại
Route::get('page-category-index/{category_name}/{id_category}', [HomeController::class, 'page_category_index']);

//Trang thanh toán
Route::get('page-checkout/{id_user}', [HomeController::class, 'page_checkout']);

//Trang thanh toán
Route::post('payment/{id_user}', [HomeController::class, 'payment']);

//Trang thanh toán
Route::put('change-address-user/{id_user}', [HomeController::class, 'change_address_user']);


//Trang thông tin cá nhân
//Route::get('page-profile-user', [HomeController::class, 'page_profile_user']);

//Trang đổi mật khẩu
Route::get('change-password/{id_user_pass}', [HomeController::class, 'change_password']);

//Trang cập nhật mật khẩu
Route::post('update-password/{id_user_pass}', [HomeController::class, 'update_password']);

//Trang thông tin cá nhân
Route::get('page-infor-user/{id_user3}', [HomeController::class, 'page_infor_user']);

//Trang cập nhật thông tin cá nhân
Route::put('update-infor-user/{id_user3}', [HomeController::class, 'update_infor_user']);

//Trang chờ thanh toán
Route::get('page-wait-payment/{id_user}', [HomeController::class, 'page_wait_payment']);

//Trang đã giao hàng
Route::get('page-deliveried/{id_user}', [HomeController::class, 'page_deliveryed']);

//Trang đã hủy
Route::get('page-cancel-order/{id_user}', [HomeController::class, 'page_cancel_order']);

//Trang đã hủy change-status
Route::get('cancel-order/{id_user}/{id_order}', [HomeController::class, 'cancel_order']);

////Trang hiển thị kết quả tìm kiếm
//Route::get('show-search-product', [HomeController::class, 'show_search_product']);

//Hàm tìm kiếm sản phẩm
Route::get('search-product', [HomeController::class, 'search_product']);
//==========================================================================



Route::middleware([CheckLogin::class])->group(function () {

    //==========================================================================
    // //ADMIN
    //Trang chủ admin
    Route::get('page-index-admin', [AdminController::class, 'page_index_admin']);

    //Trang quyền truy cập
    Route::get('page-role-access', [AdminController::class, 'page_role_access']);

    //Thêm quyền truy cập
    Route::post('post-add-role-access', [AdminController::class, 'post_add_role_access']);

    //Trang thay đổi quyền truy cập
    Route::get('page-change-role-access/{id_role}', [AdminController::class, 'page_change_role_access']);
    //Trang thay đổi quyền truy cập back-end
    Route::put('update-role/{id_role}', [AdminController::class, 'update_role']);
    //Trang quản trị
    Route::get('page-administrator', [AdminController::class, 'page_administrator']);
    //Trang thêm mới quản trị CSDL
    Route::post('post-administrator', [AdminController::class, 'post_administrator']);
    //Trang nhân viên
    Route::get('page-staff', [AdminController::class, 'page_staff']);
    //Trang thêm mới nhân viên CSDL
    Route::post('post-staff', [AdminController::class, 'post_staff']);

    //Trang xóa nhân viên CSDL
    Route::get('delete-staff/{id_staff}', [AdminController::class, 'delete_staff']);
    //Trang khách hàng
    Route::get('page-customer', [AdminController::class, 'page_customer']);
    //Trang xóa khách hàng
    Route::get('delete-customer/{id_customer}', [AdminController::class, 'delete_customer']);
    //Trang loại sản phẩm
    Route::get('page-category', [AdminController::class, 'page_category']);
    //Trang thêm loại sản phẩm CSDL
    Route::post('post-add-category', [AdminController::class, 'post_add_category']);
    //Trang xóa loại sản phẩm
    Route::get('delete-category/{id_category}', [AdminController::class, 'delete_category']);
    //Trang danh sách sản phẩm
    Route::get('page-list-product-admin', [AdminController::class, 'page_list_product_admin']);
    //Trang thêm sản phẩm CSDL
    Route::post('post-list-product-admin', [AdminController::class, 'post_list_product_admin']);
    //Trang thêm sản phẩm CSDL
    Route::get('delete-list-product-admin/{id_product}', [AdminController::class, 'delete_list_product_admin']);
    //Trang danh sách sản phẩm
    Route::get('page-product-discribe/{product_discribe}/{id_product_discribe}', [AdminController::class, 'page_product_discribe']);
    //Trang nhà cung cấp
    Route::get('page-supplier', [AdminController::class, 'page_supplier']);
    //Trang thêm nhà cung cấp CSDL
    Route::post('post-supplier', [AdminController::class, 'post_supplier']);
    //Trang nhà cung cấp
    Route::get('delete-supplier/{id_supplier}', [AdminController::class, 'delete_supplier']);
    //Trang chỉnh sửa sản phẩm
    Route::get('page-edit-list-product/{id_edit_product}', [AdminController::class, 'page_edit_list_product_admin']);
    //Trang chỉnh sửa sản phẩm back-end
    Route::put('update-edit-list-product/{id_edit_product}', [AdminController::class, 'update_edit_list_product_admin']);
    //Trang chỉnh sửa nhà cung cấp
    Route::get('page-edit-supplier/{id_edit_supplier}', [AdminController::class, 'page_edit_supplier']);
    //Trang chỉnh sửa nhà cung cấp back-end
    Route::put('update-edit-supplier/{id_edit_supplier}', [AdminController::class, 'update_edit_supplier']);
    //Trang thông tin admin
    Route::get('page-profile-admin/{id_user}', [AdminController::class, 'page_profile_admin']);
    //Trang cập nhật thông tin admin
    Route::put('update-infor-user-admin/{id_user}', [AdminController::class, 'update_infor_user']);
    //Trang đổi mật khẩu admin
    Route::get('page-change-password-admin/{id_user_password}', [AdminController::class, 'page_change_password_admin']);
    //Trang cập nhật mật khẩu admin
    Route::post('update-password-admin/{id_user_password}', [AdminController::class, 'update_password_admin']);
    //Trang quản lí hóa đơn
    Route::get('page-order-admin', [AdminController::class, 'page_order_admin']);
    //Trang quản lí chi tiết hóa đơn
    Route::get('page-order-detail-admin/{id_order}', [AdminController::class, 'page_order_detail_admin']);
    //Trang in hóa đơn
    Route::get('page-print-order/{id_order}', [AdminController::class, 'page_print_order']);
    //Trang slider
    Route::get('page-slider', [AdminController::class, 'page_slider']);
    //Trang thêm slider CSDL
    Route::post('post-slider', [AdminController::class, 'post_slider']);
    //Trang xóa slider
    Route::get('delete-slider/{id_slider}', [AdminController::class, 'delete_slider']);
    //Trang cập nhật slider
    Route::get('page-edit-slider/{id_slider_edit}', [AdminController::class, 'page_edit_slider']);
    //Trang cập nhật slider back-end
    Route::put('update-slider/{id_slider_edit}', [AdminController::class, 'update_slider']);
    //Trang chuyển trạng thái sang đã giao hàng
    Route::get('change-deliveries/{id_user}/{id_order}', [AdminController::class, 'change_deliveries']);

});





