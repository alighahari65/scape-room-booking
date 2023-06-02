<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\BookingResource;
use App\Models\Booking;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Exception;

class BookingController extends Controller
{
    use ApiResponse;

    // Create New Booking
    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'userId' => 'required|integer',
                'scapeRoomTimeSlotId' => 'required|integer',
            ]);

            // Check If Already Reserved
            $validator->after(function ($validator) use ($request) {
                $itemCount = Booking::where('scape_room_time_slot_id', $request->scapeRoomTimeSlotId)->count();
                if ($itemCount) {
                    $validator->errors()->add('general', Booking::RESERVED);
                }
            });

            if ($validator->fails()) {
                return $this->errorResponse($validator->errors(), 422);
            }

            $price = $request->price;
            if (isUserBirthday(auth()->user())) {
                $price = finalPrice($request->price, Booking::DISCOUNT);
            }

            // Create New Booking
            $data = Booking::create([
                'scape_room_time_slot_id' => $request->scapeRoomTimeSlotId,
                'user_id' => $request->userId,
                'final_price' => $price

            ]);
            return $this->successResponse(new BookingResource($data));
        } catch (Exception $e) {
            return $this->errorResponse($e->getMessage(), 500);
        }
    }

    // Return List Of Bookings;
    public function list(Request $request)
    {
        try {
            $data = Booking::where('user_id', auth()->id())->with(['scapeRoomTimeSlot', 'user'])->get();
            return $this->successResponse(BookingResource::collection($data));
        } catch (Exception $e) {
            return $this->errorResponse($e->getMessage(), 500);
        }
    }

    // Destroy booking
    public function destroy(Request $request, $id)
    {
        try {
            $item = Booking::where('user_id', auth()->id())->find($id);
            $item->delete();
            return $this->successResponse($message = 'SUCCESSFULLY DELETED');
        } catch (Exception $e) {
            return $this->errorResponse($e->getMessage(), 500);
        }
    }
}
