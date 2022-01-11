<?php

namespace App\Http\Controllers;

use App\Http\Resources\QrCodeResource;
use App\Repositories\QrCodeRepositoryInterface;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class DashboardController extends Controller
{
    private $qrCodeRepository;

    public function __construct(QrCodeRepositoryInterface $qrCodeRepository)
    {
        $this->qrCodeRepository = $qrCodeRepository;
    }

    public function newQrCode()
    {
        return Inertia::render('Generate');
    }

    public function allQrCodes(Request $request)
    {
        $qrCodes = $this->qrCodeRepository->getAllByUser($request->user()->id);

        return Inertia::render('AllQrCodes', [
            'qrCodes' => QrCodeResource::collection($qrCodes)
        ]);
    }
}
