<?php

namespace App\Http\Controllers;

use App\Http\Requests\QrCodeGenerateRequest;
use App\Http\Resources\QrCodeResource;
use App\Services\QrCodeService;
use Illuminate\Http\Request;
use QrCode;

class QrCodeController extends Controller
{
    public function index(Request $request)
    {
        return QrCodeResource::collection($request->user()->qrCodes);
    }

    public function store(QrCodeGenerateRequest $request, QrCodeService $qrCodeService)
    {
        $backgroundColor = $request->input('background_color');
        $fillColor = $request->input('fill_color');
        $size = $request->input("size");
        $content = $request->input("content");

        $qrCode = $qrCodeService->generate($size, $fillColor, $backgroundColor, $content);
        $qrCodeService->save($qrCode, $request->user());

        return $qrCode;
    }
}
