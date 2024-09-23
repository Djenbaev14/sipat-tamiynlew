<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bonus;
use App\Models\Organization;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class AuthController extends Controller
{
    public function registerPage(){
        return view('pages.auth.register');
    }
    public function register(Request $request){
        $request->validate([
            'organization_name'=>'required|min:3',
            'name'=>'required|min:4',
            'phone'=>'required|unique:users,phone,'.$request->phone,
            'email'=>'required|unique:users,email,'.$request->email,
            'password'=>'required|min:6',
            'confirm_password'=>'required|same:password|min:6'
        ]);
        DB::beginTransaction();
        try {
            $host=$request->getSchemeAndHttpHost();
            $organization_name_count=Organization::where('name',$request->organization_name)->count();
            $user=User::create([
                'name'=>$request->name,
                'phone'=>$request->phone,
                'email'=>$request->email,
                'password'=>Hash::make($request->password),
                'remember_token'=>$request->session()->token()
            ]);
            if($organization_name_count>0){
                $organization=Organization::create([
                    'user_id'=>$user->id,
                    'name'=>$request->organization_name,
                    'web_name'=>strtolower($request->organization_name)."-".++$organization_name_count
                ]);
            }else{
                $organization=Organization::create([
                    'user_id'=>$user->id,
                    'name'=>$request->organization_name,
                    'web_name'=>strtolower($request->organization_name)
                ]);
            }
            Auth::attempt(request()->only('email','password'));
            QrCode::size(500)->format('png')->generate($host.'/organization/'.$organization->web_name.'/review', storage_path('app/qrcode/'.$organization->web_name.'.png'));
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            toast('Не удалось','error');
            return redirect()->route('register-page');
        }
        toast('Успешно создано','success');
        return redirect()->route('home');
    }
    public function loginPage(){
        return view('pages.auth.login');
    }

    public function login(Request $request){
        $request->validate([
            'login'=>'required',
            'password'=>'required|min:5'
        ]);
        if(Auth::attempt(request()->only('login','password'))){
            return redirect()->route('home');
        }
        return redirect()->back()->with('error', 'Логин ямаса Парол кате');
    }

    public function logout(Request $request){

        Auth::logout();

        return redirect()->route('login');
    }
}
