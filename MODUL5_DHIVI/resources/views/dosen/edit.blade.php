<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit dosen</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <section class="container mt-5">
        <h2>Edit dosen</h2>
        <form action="{{ route('dosen.update', $dosen->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="nama_dosen" class="form-label">Nama dosen</label>
                <input type="text" name="nama_dosen" id="nama_dosen" class="form-control" value="{{ $dosen->nama_dosen }}" required>

                <label for="kode_dosen" class="form-label">Kode Dosen</label>
                <input type="text" name="kode_dosen" id="kode_dosen" class="form-control" value="{{ $dosen->kode_dosen }}" required>

                <label for="nip" class="form-label">NIP</label>
                <input type="text" name="nip" id="nip" class="form-control" value="{{ $dosen->nip }}" required>

                <label for="email" class="form-label">Email</label>
                <input type="text" name="email" id="email" class="form-control" value="{{ $dosen->email }}" required>

                <label for="no_telepon" class="form-label">No.Telp</label>
                <input type="text" name="no_telepon" id="no_telepon" class="form-control" value="{{ $dosen->no_telepon }}" required>
            </div>

            <button type="submit" class="btn btn-success">Perbarui</button>
            <a href="{{ route('dosen.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
