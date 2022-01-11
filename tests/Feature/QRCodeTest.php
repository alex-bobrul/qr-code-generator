<?php

namespace Tests\Feature;

use App\Models\QrCode;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class QRCodeTest extends TestCase
{
    use RefreshDatabase;

    public function test_qr_code_creation()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post('/qr-codes', [
            "background_color" => "rgba(255, 255, 255, 1)",
            "content" => "http://google.com",
            "fill_color" => "rgba(0, 0, 0, 1)",
            "size" => "500"
        ]);

        $response->assertStatus(200);
        $this->assertDatabaseHas(QrCode::class, [
            'author_id' => $user->id
        ]);
    }
}
