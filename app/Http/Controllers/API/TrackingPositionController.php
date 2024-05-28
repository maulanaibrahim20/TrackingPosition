<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TrackingPositionController extends Controller
{
    public function updatePosition(Request $request)
    {
        try {

            DB::beginTransaction();

            DB::commit();

            return response()->json([
                "status" => true
            ]);

        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                "status" => false
            ]);
        }
    }
}
