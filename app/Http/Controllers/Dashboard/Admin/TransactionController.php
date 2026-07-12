<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function detail(Transaction $transaction)
    {
        $transaction->load(['user', 'items.product']);

        return view('dashboard.admin.transactions-detail', ['data' => $transaction]);
    }

    public function update(Request $request, Transaction $transaction)
    {
        $request->validate(['status' => 'required|in:completed,cancelled']);

        if ($request->status === 'cancelled' && $transaction->status !== 'cancelled') {
            foreach ($transaction->items as $item) {
                Product::where('id', $item->product_id)->increment('stock', $item->quantity);
            }
        }

        $transaction->update(['status' => $request->status]);

        return redirect()->route('dashboard.admin.index', ['tab' => 'transactions'])->with('success', 'Status transaksi diperbarui.');
    }

    public function destroy(Transaction $transaction)
    {
        $transaction->update(['status' => 'cancelled']);

        return redirect()->route('dashboard.admin.index', ['tab' => 'transactions'])->with('success', 'Transaksi dibatalkan.');
    }
}