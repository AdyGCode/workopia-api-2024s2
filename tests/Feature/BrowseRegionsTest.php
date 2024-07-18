<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Carbon;
use function Spatie\PestPluginTestTime\testTime;

uses(RefreshDatabase::class);

// Freeze time!
//testTime()->freeze('2024-07-01 00:00:00');

it('can fetch all regions', function () {
    Carbon::setTestNow();

    $currentTime = Carbon::now()->toISOString();
    $data = [
        'success' => true,
        'message' => 'regions retrieved successfully',
        'data' => [
            [
                'id' => 1,
                'name' => 'World Region 1',
                'created_at' => $currentTime,
                'updated_at' => $currentTime,
            ],
            [
                'id' => 2,
                'name' => 'World Region 2',
                'created_at' => $currentTime,
                'updated_at' => $currentTime,
            ],
        ],
    ];

    foreach ($data['data'] as $region){
        \App\Models\Region::create($region);
    }

    $response = $this->getJson('/api/v1/regions');

    $response->assertStatus(200)->assertJson($data);
});
