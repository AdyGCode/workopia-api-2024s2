<?php

namespace App\Http\Controllers;

use App\Classes\ApiResponseClass;
use App\Models\Region;
use App\Http\Requests\StoreRegionRequest;
use App\Http\Requests\UpdateRegionRequest;

class RegionController extends Controller
{
    /**
     * Retrieve all regions.
     *
     * @group Region
     *
     * @response status=200 scenario="Regions Found" {
     *     "success": true,
     *     "message": "regions retrieved successfully",
     *     "data": [
     *          {
     *              'id': 1,
     *              'name': 'World Region 1',
     *              'created_at': '2024-07-01T00:00:00.000000Z',
     *              'updated_at': '2024-07-01T00:00:00.000000Z',
     *          },
     *          {
     *              'id': 2,
     *              'name': 'World Region 2',
     *              'created_at': '2024-07-01T00:00:00.000000Z',
     *              'updated_at': '2024-07-01T00:00:00.000000Z',
     *          }
     *     ]
     *   }
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $regions = Region::all();
        return ApiResponseClass::sendResponse(
            $regions,
            "regions retrieved successfully"
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRegionRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Region $region)
    {
        return ApiResponseClass::sendResponse(
            $region,
            "region successfully retrieved"
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRegionRequest $request, Region $region)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Region $region)
    {
        //
    }
}
