<?php

namespace App\Repositories\Eloquent;

use App\Models\QrCode;
use App\Repositories\QrCodeRepositoryInterface;

class QRCodeRepository extends BaseRepository implements QrCodeRepositoryInterface
{
    public function __construct(QrCode $model)
    {
        parent::__construct($model);
    }
}
