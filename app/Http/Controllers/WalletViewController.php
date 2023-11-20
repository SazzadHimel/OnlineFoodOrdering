<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WalletViewController extends Controller
{
public function showCheckBalanceForm()
    {
        return view('wallet.check');
    }

    public function showDepositForm()
    {
        return view('wallet.deposit');
    }

    public function showWithdrawForm()
    {
        return view('wallet.withdraw');
    }
}
