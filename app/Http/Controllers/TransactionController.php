<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function detail($invoice) // Ubah $id jadi $invoice
    {
        $data = Transaction::with(['user', 'items'])
            ->where('invoice_number', $invoice)
            ->firstOrFail();

        return view('admin.transaction_detail', compact('data'));
    }
    public function destroy($id)
    {
        $data = Transaction::findOrFail($id);
        $data->update(['status' => 'cancelled']);
        return redirect()->route('dashboard.index');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:completed,cancelled'
        ]);

        $data = Transaction::findOrFail($id);
        $datlama = $data->status;
        $datbaru = $request->status;

        if ($datbaru === 'cancelled' && $datlama !== 'cancelled') {
            $items = $data->items;

            foreach ($items as $item) {
                Product::where('id', $item->product_id)->increment('stock', $item->quantity);
            }
        }

        $data->update([
            'status' => $datbaru
        ]);

        return redirect()->route('dashboard.index');
    }
}
