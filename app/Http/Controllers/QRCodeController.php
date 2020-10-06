<?php

namespace App\Http\Controllers;

use QrCode;

class QRCodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function simpleQr()
    {
        return QrCode::size(300)->generate('A basic example of QR code!');
    }

    public function colorQr()
    {
        return QrCode::size(300)
            ->backgroundColor(255, 55, 0)
            ->generate('Color QR code example');
    }

    public function imageQr()
    {
        $image = QrCode::format('png')
            ->merge('images/laravel.png', 0.5, true)
            ->size(500)->errorCorrection('H')
            ->generate('Image qr code example');
        return response($image)->header('Content-type', 'image/png');
    }

    public function emailQrCode()
    {
        return QrCode::size(500)
            ->email('laratutorials@gmail.com', 'Welcome to Lara Tutorials!', 'This is !.');
    }

    public function qrCodePhone()
    {
        QrCode::phoneNumber('111-222-6666');
    }

    public function textQrCode()
    {
        QrCode::SMS('111-222-6666', 'Body of the message');
    }
}
