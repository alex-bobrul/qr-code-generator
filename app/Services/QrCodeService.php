<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\QrCodeRepositoryInterface;
use QrCode;
use Illuminate\Support\Facades\Storage;

class QrCodeService
{
    private $qrCodeRepository;

    public function __construct(QrCodeRepositoryInterface $qrCodeRepository)
    {
        $this->qrCodeRepository = $qrCodeRepository;
    }

    public function generate(int $size, string $color, string $backgroundColor, string $content)
    {
        [$fillR, $fillG, $fillB, $fillA] = $this->splitColor($color);
        $fillA = $this->increaseOpacityStyle($fillA);

        [$bgcR, $bgcG, $bgcB, $bgcA] = $this->splitColor($backgroundColor);
        $bgcA = $this->increaseOpacityStyle($bgcA);

        return QrCode::size($size)
            ->color($fillR, $fillG, $fillB, $fillA)
            ->backgroundColor($bgcR, $bgcG, $bgcB, $bgcA)
            ->generate($content);
    }

    public function save($qrCode, User $user)
    {
        $path = 'qr-codes/' . $this->generateFileName();
        Storage::disk('public')->put($path, $qrCode);

        $this->qrCodeRepository->create([
            'path' => $path,
            'author_id' => $user->id
        ]);
    }

    /**
     * @param string $color
     * @return void
     */
    private function splitColor(string $color): array
    {
        return sscanf($color, "rgba(%d, %d, %d, %f)");
    }

    /**
     * @param float $opacity
     * @return int
     */
    private function increaseOpacityStyle(float $opacity): int
    {
        return $opacity * 100;
    }

    private function generateFileName()
    {
        return uniqid() . '.svg';
    }
}
