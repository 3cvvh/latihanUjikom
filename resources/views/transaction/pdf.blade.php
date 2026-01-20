<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Invoice Transaksi</title>
    <style>
        body { font-family: sans-serif; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #333; padding: 8px; text-align: left; }
    </style>
</head>
<body>
    <h2>Invoice Transaksi</h2>
    <p>Nama: {{ $record->name }}</p>
    <p>Email: {{ $record->email }}</p>
    <p>Total: Rp {{ number_format($record->grand_total_amount, 0, ',', '.') }}</p>

    <table>
        <tr>
            <th>ID Transaksi</th>
            <td>{{ $record->booking_trx_id }}</td>
        </tr>
        <tr>
            <th>Status</th>
            <td>{{ $record->is_paid ? 'Sudah Dibayar' : 'Belum Dibayar' }}</td>
        </tr>
    </table>
</body>
</html>
