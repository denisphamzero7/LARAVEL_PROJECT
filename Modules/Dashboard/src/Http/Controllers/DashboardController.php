<?php
namespace Modules\dashboard\src\http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller{
    public function index(){
        $page_title = 'Tổng quan dashboard';
        return view('dashboard::index', compact('page_title'));
    }
    public function detail($id){
        return 'detail' .$id;
    }
    public function create(){
        $user= new User();
        $user->name = 'John Doe';
        $user->email = 'john.doe@example.com';
        $user->password = Hash::make('123123');
        $user->save();
        return 'ok';
    }
}