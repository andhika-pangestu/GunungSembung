<div>
    <h2>Total Pembayaran Bulanan</h2>
    <table>
        <thead>
            <tr>
                <th>Bulan</th>
                <th>Total Pembayaran</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($this->getData()['monthlyPayments'] as $payment)
                <tr>
                    <td>{{ $payment->month }}-{{ $payment->year }}</td>
                    <td>Rp. {{ number_format($payment->total, 0, ',', '.') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div> 