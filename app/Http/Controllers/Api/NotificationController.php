<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\NotificationResource;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function index(Request $request)
    {
        $startDate = $request->query('start_date');
        $endDate = $request->query('end_date');

        $user = Auth::user();
        $notifications = Notification::with('user')
            ->whereHas('user', function ($query) use ($user) {
                $query->where('id', $user->id);
            });

        if ($startDate) {
            $notifications->where('date', '>=', date('Y-m-d', strtotime($startDate)));
        }

        if($endDate) {
            $notifications->where('date', '<=', date('Y-m-d', strtotime($endDate)));
        }

        $userNotifications = $notifications->get();

        return NotificationResource::collection($userNotifications);
    }

    public function show(Notification $notification)
    {
        return NotificationResource::make($notification);
    }
}
