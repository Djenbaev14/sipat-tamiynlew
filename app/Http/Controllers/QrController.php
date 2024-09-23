<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QrController extends Controller
{
    public function generateQRCode()
    {
        DB::beginTransaction();
        try {
            // Data to encode in the QR code
            $data = 'Hello, World!';
    
            // Output file path (change this according to your desktop path)
            $desktopPath = getenv("HOMEPATH") . "\\Downloads\\";
            $filename = $desktopPath . 'qrcode.svg';
    
            // Generate QR code
            QrCode::size(500)->generate($data, $filename);
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();

            return 'qate';
        }
        // return QrCode::generate('https://cabinet.qrmap.ru/organization/organization/qrcode');

        return "QR code generated and saved to $filename";
    }
}
