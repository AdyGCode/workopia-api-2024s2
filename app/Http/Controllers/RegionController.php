<?php

namespace App\Http\Controllers;

use App\Classes\ApiResponseClass;
use App\Models\Region;
use App\Http\Requests\StoreRegionRequest;
use App\Http\Requests\UpdateRegionRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
    public function index(Request $request)
    {
        $perPage = (int) $request->query('per_page', 4);

        if ($perPage < 1 || $perPage > 100) {
            return ApiResponseClass::sendResponse(
                [],
                "Per Page must be an integer greater than 0",
                false,
                400
            );
        }

        $regions = Region::paginate($perPage);
        return ApiResponseClass::sendResponse(
            $regions,
            "regions retrieved successfully",
            200
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
