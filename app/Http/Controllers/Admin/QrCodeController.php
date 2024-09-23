<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\organization;
use Barryvdh\DomPDF\Facade\Pdf;
use Dompdf\Dompdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QrCodeController extends Controller
{
    public function index(Request $request){
        $companies=organization::where('user_id',auth()->user()->id)->orderBy('created_at','desc')->get();
        if(auth()->user()->role_id==1){
            $companies = organization::orderBy('created_at','desc')->get();
        }
        $host=$request->getSchemeAndHttpHost();
        // $imagePath = storage_path('app/qrcode/nazirbay.png');
        // $image = "data:image/svg+xml;base64,".base64_encode(file_get_contents($imagePath));

        return view('pages.qrcode.index',compact('companies','host'));
    }

    public function savePngQrCode($web_name)
    {
        // $filepath = 'data:image/svg+xml;base64,'.base64_encode(file_get_contents(storage_path('app/qrcode/dbc.png')));
        // return storage_path('app/qrcode/'.$web_name.'.png');
        return Response::download(storage_path('app/qrcode/'.$web_name.'.png'));
    }


    
    
    public function saveStickerQrCode($web_name){
        
        $pdf = PDF::loadView('pages.qrcode.sticker',compact('web_name'))->setOption(['dpi' => 150, 'defaultFont' => 'sans-serif']);

        return $pdf->download($web_name.'.pdf');
    }

    public function sticker($web_name){
        $img='data:image/png;base64,'.base64_encode(file_get_contents(storage_path('app/qrcode/'.$web_name.'.png')));
        return view('pages.qrcode.sticker',compact('web_name','img'));
    }
}
