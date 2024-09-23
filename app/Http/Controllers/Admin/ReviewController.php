<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\organization;
use App\Models\Poll;
use App\Models\Rating;
use App\Models\SurveyPoll;
use App\Models\TheSurvery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Telegram\Bot\Api;
class ReviewController extends Controller
{
    // protected $telegram;

    // public function __construct()
    // {
    //     $this->telegram = new Api(env('TELEGRAM_BOT_TOKEN'));

        
    // }
    public function review(Request $request,$web_name){
        $ratings=Rating::all();
        $organization = organization::where('web_name',$web_name)->first();
        $bool=TheSurvery::where('organization_id',$organization->id)->where('remember_token',$request->session()->token())->exists();
       if(organization::where('web_name',$web_name)->exists()){
            return view('pages.review.index',compact('organization','ratings','bool'));
       }else{
            return view('pages.error.404');
       }
    }
    
    public function reviewStore(Request $request,$web_name){
            if($request->file){
                $request->validate([
                    'file'=>'mimes:png,jpeg,heif,heic,heif|max:2048',
                ]);
            }
            $request->validate([
                'rating'=>'required',
                'text'=>'required',
            ]);
            $file = $request->file('file') ? $request->file('file') : null;
            $orginalName = $request->file('file') ? $file->getClientOriginalName() : null;
            if($file){
                $file->move(public_path('assets/reviews_image'), $orginalName);
            }
            DB::beginTransaction();
            try {
                $survey=TheSurvery::create([
                    'organization_id'=>$request->organization_id,
                    'rating'=>$request->rating,
                    'text'=>$request->text,
                    'file'=>$orginalName,
                    'remember_token'=>$request->session()->token(),
                ]);

                $organization=organization::where('web_name',$web_name)->first();
                if($organization->telegram_api_token && $organization->chat_id){
                    $TELEGRAM = "https://api.telegram.org/bot". $organization->telegram_api_token; 
                    if($request->file('file')){
                        // Telegram API uchun URL
                    //    $telegramApiUrl = "https://api.telegram.org/bot" . $organization->telegram_api_token . "/sendDocument";
   
                       // Faylni yuborish
                       Http::attach(
                           'document', file_get_contents(public_path('assets/reviews_image/'.$orginalName)), basename(public_path('assets/reviews_image/'.$orginalName)),
                       )->post($TELEGRAM. "/sendDocument", [
                           'chat_id' => $organization->chat_id,
                           'caption'=> "<b>ID: </b>".$survey->id."\n".Rating::where('point',$request->rating)->first()->rating_ru."\n".$request->text,
                           'parse_mode'=> "HTML",
                       ]);
                    }else{
                        $query = http_build_query(array(
                            'chat_id'=> $organization->chat_id,
                            'text'=> "<b>ID: </b>".$survey->id."\n".Rating::where('point',$request->rating)->first()->rating_ru."\n".$request->text,
                            'parse_mode'=> "HTML",
                        ));
                        file_get_contents("$TELEGRAM/sendMessage?$query");
                    }
                    

                }
                DB::commit();
            } catch (\Throwable $th) {
                DB::rollBack();
                return $th->getMessage();
            }
        return redirect()->route('review.success',$web_name);

    }
    // public function sendMessage($chatId,$message,$token){
        
    //     $url="https://api.telegram.org/bot". $token ."/sendMessage?chat_id=" . $chatId;
    //     $url=$url. "&text". urlencode($message);
    //     $ch=curl_init();
    //     $optArray= array(
    //             CURLOPT_URL=>$url,
    //             CURLOPT_RETURNTRANSFER=>true
    //     );
    //     curl_setopt_array($ch,$optArray);
    //     $result=curl_exec($ch);
    //     curl_close($ch);
    //     return $result;
    // }
    public function reviewSuccess(Request $request,$web_name){
        $organization=organization::where('web_name',$web_name)->first();
        if(organization::where('web_name',$web_name)->exists() && TheSurvery::where('organization_id',$organization->id)->where('remember_token',$request->session()->token())->exists()){
            return view('pages.review.success',compact('organization'));
        }else{
            return view('pages.error.404');
        }
    }
}
