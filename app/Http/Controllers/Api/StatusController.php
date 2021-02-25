<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\StatusResource;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StatusController extends Controller
{
    public function index(Request $request)
    {
        $startDate = $request->query('start_date');
        $endDate = $request->query('end_date');

        $user = Auth::user();
        $status = Status::with('user')
            ->whereHas('user', function ($query) use ($user) {
                $query->where('id', $user->id);
            });

        if ($startDate) {
            $status->where('date', '>=', date('Y-m-d', strtotime($startDate)));
        }

        if ($endDate) {
            $status->where('date', '<=', date('Y-m-d', strtotime($endDate)));
        }

        $userStatusList = $status->get();

        return StatusResource::collection($userStatusList);
    }

    public function show(Status $status)
    {
        return StatusResource::make($status->load('user'));
    }
}
