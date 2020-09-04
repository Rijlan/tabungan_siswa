<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Tabungan Siswa</title>
    <link href="../../css/print.css" rel="stylesheet">
</head>
<body onload="window.print()">
    <div class="container">
        <div class="print">
            <div class="print-header">
                <h1>Laporan Tabungan Siswa</h1>
                <h3>{{ $profile->nama_sekolah }}</h3>
                <p>Periode : {{ $start }} - {{ $end }}</p>
            </div>
            <div class="print-body">
                <table class="table-print" border="1">
                    <thead>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Petugas</th>
                        <th>Pemasukan</th>
                        <th>Pengeluaran</th>
                    </thead>
                    @if($result->count() < 1)
                    <tbody>
                        <td colspan="5" class="t-center">Data Kosong</td>
                    </tbody>
                    @else
                    @foreach($result as $key => $res)
                    <tbody>
                        <td class="t-center"> {{ $key+1 }} </td>
                        <td class="t-center"> {{ $res->tanggal }} </td>
                        <td> {{ $res->petugas }} </td>
                        <td class="t-right">Rp. {{ number_format($res->setor) }} </td>
                        <td class="t-right">Rp. {{ number_format($res->tarik) }} </td>
                    </tbody>
                    @endforeach
                    @endif
                    <tfoot>
                        <tr>
                            <th colspan="3">Total</th>
                            <td class="t-right">Rp. {{ number_format($setor) }} </td>
                            <td class="t-right">Rp. {{ number_format($tarik) }} </td>
                        </tr>
                        <tr>
                            <th colspan="3"></th>
                            <th class="t-right">Total Saldo Tabungan</th>
                            <td class="t-right">Rp. {{ number_format($saldo) }} </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</body>
</html>