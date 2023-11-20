<?php

namespace App\Http\Controllers;

use App\Models\WalletTransaction;
use Illuminate\Http\Request;

class WalletController extends Controller
{
    public function checkBalance($walletId)
    {
        $wallet = WalletTransaction::where('wallet_id', $walletId)->firstOrFail();
        return response()->json(['balance' => $wallet->balance]);
    }

    public function deposit(Request $request, $walletId)
    {
        $request->validate([
            'amount' => 'required|numeric|min:0.01',
        ]);

        $wallet = WalletTransaction::where('wallet_id', $walletId)->firstOrFail();
        $wallet->balance += $request->amount;
        $wallet->save();

        return response()->json(['message' => 'Deposit successful']);
    }

    public function withdraw(Request $request, $walletId)
    {
        $request->validate([
            'amount' => 'required|numeric|min:0.01',
        ]);

        $wallet = WalletTransaction::where('wallet_id', $walletId)->firstOrFail();

        if ($wallet->balance < $request->amount) {
            return response()->json(['message' => 'Insufficient funds'], 422);
        }

        $wallet->balance -= $request->amount;
        $wallet->save();

        return response()->json(['message' => 'Withdrawal successful']);
    }
}
