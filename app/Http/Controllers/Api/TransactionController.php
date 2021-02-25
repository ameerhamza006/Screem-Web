<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\TransactionResource;
use App\Models\Cradit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function index(Request $request)
    {
        $startDate = $request->query('start_date');
        $endDate = $request->query('end_date');

        $user = Auth::user();
        $credit = Cradit::with('user')
            ->whereHas('user', function ($query) use ($user) {
                $query->where('id', $user->id);
            });

        if ($startDate) {
            $credit->where('date', '>=', date('Y-m-d', strtotime($startDate)));
        }

        if ($endDate) {
            $credit->where('date', '<=', date('Y-m-d', strtotime($endDate)));
        }

        $transactions = $credit->get();

        return TransactionResource::collection($transactions);
    }

    public function show(Cradit $transaction)
    {
        return TransactionResource::make($transaction->load('user'));
    }
}
