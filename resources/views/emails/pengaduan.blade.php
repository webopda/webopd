<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Terima Kasih</title>
</head>
<body>
    <p>Halo {{ $pengaduan->nama }},</p>
    <p>Terima kasih telah melakukan pengaduan. Pesan anda akan segera kami balas.</p>
    <p>Detail Pengaduan:</p>
    <ul>
        <li><strong>NIK:</strong> {{ $pengaduan->nik }}</li>
        <li><strong>Tanggal Kunjungan:</strong> {{ $pengaduan->tanggal_kunjungan }}</li>
        <li><strong>Pesan:</strong> {{ $pengaduan->pesan }}</li>
    </ul>
    <br>
    <p>Hormat kami,</p>
    <p>Tim Pengaduan</p>
</body>
</html>
