<div class="page-wrapper">
    <input type="checkbox" class="modal-toggle" @checked($show) />
    <div class="modal" role="dialog">
        <div class="modal-box">
            <h3 class="text-lg font-bold">Detail Transaksi</h3>
            <div class="py-4 space-y-4">
                <div class="flex flex-col">
                    <div class="text-sm opacity-50">Tanggal Transaksi</div>
                    <div>{{ $transaksi?->created_at->format('d F Y H:i') }}</div>
                </div>
                <div class="flex flex-col">
                    <div class="text-sm opacity-50">Nama Customer</div>
                    <div>{{ $transaksi->customer?->name ?? '-' }}</div>
                </div>
                <div class="flex flex-col">
                    <div class="text-sm opacity-50">Total Bayar</div>
                    <div>Rp. {{ Number::format($transaksi?->price ?? 0) }}</div>
                </div>
                <div class="table-wrapper">
                    <table class="table">
                        <thead>
                            <th>Nama Menu</th>
                            <th>Qty</th>
                            <th>Harga</th>
                        </thead>
                        <tbody>
                            @foreach ($transaksi->items ?? [] as $key => $item)
                                <tr>
                                    <td>{{ $key }}</td>
                                    <td>{{ $item['qty'] }}</td>
                                    <td>{{ Number::format($item['price']) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-action">
                <button type="button" class="btn" wire:click="closeModal">Close</button>
            </div>
        </div>
    </div>
</div>
