<?php

namespace App\Http\Controllers;

use App\Enums\ScapeRoom\ScapeRoomStatus;
use App\Http\Resources\ScapeRoomResourse;
use App\Models\ScapeRoom;
use App\Models\ScapeRoomTimeSlot;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use Exception;
use Carbon\Carbon;

class ScapeRoomController extends Controller
{
    use ApiResponse;

    // Return List Of Rooms;
    public function list(Request $request)
    {
        try {
            
            $data = ScapeRoom::with(['timeSlots'])->get();
            return $this->successResponse(ScapeRoomResourse::collection($data));
        } catch (Exception $e) {
            return $this->errorResponse($e->getMessage(), 500);
        }
    }

    // Return Single Room;
    public function findById(Request $request, $id)
    {
        try {
            $data = ScapeRoom::with(['timeSlots'])->find($id);
            return $this->successResponse(new ScapeRoomResourse($data));
        } catch (Exception $e) {
            return $this->errorResponse($e->getMessage(), 500);
        }
    }

    // Return Single Room With Its Own Status;
    public function AvailableSpecificRoom(Request $request, $id)
    {
        try {
            $data = ScapeRoom::with(['timeSlots'])->where('id', $id)
                ->whereHas('scapeRoomTimeSlot', function (Builder $query) {
                    $query->where('is_available', ScapeRoomStatus::Active->value);
                })->first();

            return $this->successResponse(new ScapeRoomResourse($data));
        } catch (Exception $e) {
            return $this->errorResponse($e->getMessage(), 500);
        }
    }
}
