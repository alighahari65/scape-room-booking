<?php

namespace App\Http\Controllers;

use App\Enums\ScapeRoom\ScapeRoomStatus;
use App\Http\Resources\ScapeRoomResourse;
use App\Models\ScapeRoom;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use Exception;

class ScapeRoomController extends Controller
{
    use ApiResponse;

    public function list(Request $request)
    {
        try {
            $data = ScapeRoom::with(['timeSlots'])->get();
            return $this->successResponse(ScapeRoomResourse::collection($data));
        } catch (Exception $e) {
            return $this->errorResponse($e->getMessage(), 500);
        }
    }

    public function findById(Request $request, $id)
    {
        try {
            $data = ScapeRoom::with(['timeSlots'])->find($id);
            return $this->successResponse(new ScapeRoomResourse($data));
        } catch (Exception $e) {
            return $this->errorResponse($e->getMessage(), 500);
        }
    }

    public function AvailableSpecificRoom(Request $request, $id)
    {
        try {
            $data = ScapeRoom::where('is_available', ScapeRoomStatus::Active->value)
            ->with(['timeSlots'])->find($id);
            return $this->successResponse(new ScapeRoomResourse($data));
        } catch (Exception $e) {
            return $this->errorResponse($e->getMessage(), 500);
        }
    }
}
