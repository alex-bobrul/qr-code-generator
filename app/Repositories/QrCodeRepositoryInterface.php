<?php
namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

interface QrCodeRepositoryInterface
{
    public function create(array $attributes): Model;
    public function getAllByUser(int $id): Collection;
}
