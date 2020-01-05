<?php

namespace App\Http\Controllers;

use App\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function summary(Request $request)
    {
        return response()->json([
            'balance' => Auth::user()->balance
        ]);
    }

    public function transactionsByDay(Request $request)
    {
        $request->validate([
            'day' => 'required'
        ]);
    }

    public function create(Request $request)
    {
        $request->validate(['amount' => 'required', 'title' => 'required']);

        $newTransaction = Transaction::create([
            'user_id' => Auth::user()->id,
            'amount' => $request->get('amount'),
            'title' => $request->get('title')
        ]);

        return response()->json([
            'message' => 'Transaction created successfully',
        ]);
    }

}
