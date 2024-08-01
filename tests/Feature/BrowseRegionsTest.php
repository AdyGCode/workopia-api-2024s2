<?php

use App\Models\Region;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Carbon;
use function Spatie\PestPluginTestTime\testTime;

uses(RefreshDatabase::class);

// Freeze time!
testTime()->freeze('2024-07-01 00:00:00');

it('can fetch all regions', function () {
    $newRegion = Region::factory()->create();

    $response = $this->getJson('/api/v1/regions');

    $data = [
        'success' => true,
        'message' => 'regions retrieved successfully',
        'data' => [
            $newRegion->toArray(),
        ],
    ];


    $response->assertStatus(200)->assertJson($data);
});
