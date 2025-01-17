<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Transaksi;

class Home extends Component
{
    public function toggleDone(Transaksi $transaksi)
    {
        $transaksi->done = !$transaksi->done;
        $transaksi->save();
    }

    public function render()
    {
        $today = date('Y-m-d');
        [$tahun, $bulan] = explode("-", date('Y-m'));



        $transaksi = Transaksi::whereMonth('created_at', $bulan)->whereYear('created_at', $tahun);
        return view('livewire.home', [
            'monthly' => $transaksi->get()->sum('price'),
            'today' => $transaksi->whereDate('created_at', $today)->get(),
            'datas' => Transaksi::where('done', false)->orderBy('created_at', 'desc')->get(),
        ]);
    }
}
