<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Balasan Pengaduan</title>
</head>
<body style="font-family: Arial, sans-serif; background:#f9f9f9; padding:20px;">
    <div style="max-width:600px; margin:auto; background:#fff; border-radius:8px; padding:20px; box-shadow:0 2px 6px rgba(0,0,0,.1)">
        <h2 style="color:#2c3e50;">Balasan Pengaduan Anda</h2>
        <p>Halo, berikut balasan untuk pengaduan Anda:</p>
        <hr>
        <div style="padding:10px; background:#f4f6f8; border-radius:5px;">
            {!! $pengaduan->balasan !!} 
        </div>
        <hr>
        <p style="font-size:12px; color:#888;">Email ini dikirim otomatis, mohon jangan dibalas langsung.</p>
    </div>
</body>
</html>
