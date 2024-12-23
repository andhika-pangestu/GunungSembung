<?php
namespace App\Http\Livewire;

use App\Models\Transaksi;
use Livewire\Component;

class PelunasanButton extends Component
{
    public $transaksiId;

    public function mount($transaksiId)
    {
        $this->transaksiId = $transaksiId;
    }

    public function pelunasan()
    {
        $transaksi = Transaksi::find($this->transaksiId);
        
        if ($transaksi && $transaksi->sisa > 0) {
            // Lakukan pembaruan status
            $transaksi->update([
                'jml_bayar' => $transaksi->sisa,
                'sisa' => 0,
                'status' => 'lunas',
            ]);

            // Update status booking menjadi lunas
            $transaksi->booking->update(['status' => 'lunas']);

            // Kirim notifikasi atau event lainnya
            session()->flash('message', 'Pembayaran telah lunas.');
        }
    }

    public function render()
    {
        return view('livewire.pelunasan-button');
    }
}
