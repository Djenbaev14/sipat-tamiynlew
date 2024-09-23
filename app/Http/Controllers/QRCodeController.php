<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QRCodeController extends Controller
{
    public function generateQRCode()
    {
        // Data to encode in the QR code
        $data = 'Hello, World!';

        // Output file path (change this according to your desktop path)
        $desktopPath = getenv("HOMEPATH") . "\\Desktop\\";
        $filename = $desktopPath . 'qrcode.png';

        // Generate QR code
        QrCode::size(500)->generate($data, $filename);

        return "QR code generated and saved to $filename";
    }
}
