<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Halaman Detail Surat</h1>
    
    @if ($surat)
        <p>{{$surat['nomor_surat']}}</p>
        <a href="{{route('surat.index')}}">Kembali</a>
    @else
            data tidak ada
        <a href="{{route('surat.index')}}">Kembali</a>
    @endif
</body>
</html>