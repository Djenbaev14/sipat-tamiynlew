<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\Organization;
use App\Models\Poll;
use App\Models\Rating;
use App\Models\SurveyPoll;
use App\Models\TheSurvery;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class OrganizationController extends Controller
{
    public function index(){
        $companies=Organization::where('user_id',auth()->user()->id)->orderBy('created_at','desc')->get();
        if(auth()->user()->role_id==1){
            $companies=Organization::orderBy('created_at','desc')->get();
        }
        $surveries=TheSurvery::all();
        return view('pages.organization.index',compact('companies','surveries'));
    }

    public function create(){
        return view('pages.organization.create',);
    }
    public function Cstore(Request $request){
        $request->validate([
            'organization_name'=>'required|unique:organizations,name,'.$request->organization_name,
            'name'=>'required',
            'phone'=>'required',
            'login'=>'required|unique:users,login,'.$request->login,
            'password'=>'required',
        ]);

        DB::beginTransaction();
        try {
            $host=$request->getSchemeAndHttpHost();

            $user=User::create([
                'role_id'=>2,
                'login'=>$request->login,
                'name'=>$request->name,
                'phone'=>$request->phone,
                'password'=>$request->password,
            ]);

            $organization=Organization::create([
                'user_id'=>$user->id,
                'name'=>$request->organization_name,
                'web_name'=>Str::slug($request->organization_name, '-')
            ]);

            
            QrCode::size(500)->format('png')->generate($host.'/organization/'.$organization->web_name.'/review', storage_path('app/qrcode/'.$organization->web_name.'.png'));
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            toast('Не удалось','error');
            return redirect()->route('organization.index');
        }
        toast('Успешно создано','success');
        return redirect()->route('organization.index');
    }
    public function update(Request $request,$web_name){
        $organization=Organization::where('web_name',$web_name)->first();
        return view('pages.organization.update',compact('organization'));
    }

    // public function Ustore(Request $request,$web_name){
    //     $request->validate([
    //         'name'=>'required',
    //         'poll'=>'array',
    //     ]);
    //     DB::beginTransaction();
    //     try {
    //         $organization=Organization::where('web_name',$web_name)->first();
    //         $organization->update([
    //             'name'=>$request->name
    //         ]);
    //         if($request->update_poll){
    //             foreach ($request->update_poll as $key => $value) {
    //                 Poll::where('id',$key)->update([
    //                     'poll'=>$value
    //                 ]);
    //             }
    //         }
    //         for ($i=0; $i < count($request->poll); $i++) { 
    //             if($request->poll[$i]){
    //                 Poll::create([
    //                     'organization_id'=>$organization->id,
    //                     'poll'=>$request->poll[$i]
    //                 ]);
    //             }
    //         }
    //         DB::commit();
    //     } catch (\Throwable $th) {
    //         DB::rollBack();
    //         toast('Есть ошибка при изменении','error');
    //     }

    //     toast('Изменения обновлены','success');
    //     return redirect()->route('organization.update',$web_name);

    // }

    public function reviews(Request $request){
        $start_date = $request->start_date ? $request->start_date : date('Y-01-01');
        $end_date = $request->end_date ? $request->end_date : date('Y-m-d');
        $organization_id=$request->organization_id ? $request->organization_id : null;
        $rating=$request->rating ? $request->rating : null;
        
        if(!$organization_id){
            $reviews=TheSurvery::whereBetween(DB::raw('date(created_at)'), [$start_date,$end_date])->orderBy('created_at','desc')->get();
            if($request->rating){
                $reviews=TheSurvery::where('rating',$request->rating)->whereBetween(DB::raw('date(created_at)'), [$start_date,$end_date])->orderBy('created_at','desc')->get();
            }else{
                $reviews=TheSurvery::whereBetween(DB::raw('date(created_at)'), [$start_date,$end_date])->orderBy('created_at','desc')->get();
            }
        }else{
            if($request->rating){
                $reviews=TheSurvery::where('organization_id',$request->organization_id)->where('rating',$request->rating)->whereBetween(DB::raw('date(created_at)'), [$start_date,$end_date])->orderBy('created_at','desc')->get();
            }else{
                $reviews=TheSurvery::where('organization_id',$request->organization_id)->whereBetween(DB::raw('date(created_at)'), [$start_date,$end_date])->orderBy('created_at','desc')->get();
            }
        }
        $companies=Organization::where('user_id',auth()->user()->id)->orderBy('created_at','desc')->get();
        if(auth()->user()->role_id==1){
        $companies=Organization::orderBy('created_at','desc')->get();
        }
        return view('pages.organization.reviews',compact('reviews','companies','organization_id','start_date','end_date','rating'));
    }
    
}
