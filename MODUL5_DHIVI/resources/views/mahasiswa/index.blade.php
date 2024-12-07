<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <section class="container mt-5">
        <a href="{{ route('mahasiswa.create') }}" class="btn btn-primary mb-3">Tambah mahasiswa</a>
        <a href="{{ route('dashboard') }}" class="btn btn-secondary mb-3">Kembali</a>

        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama mahasiswa</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            @foreach($mahasiswa as $m)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $m->nama_mahasiswa }}</td>
                <td>
                    <a href="{{ route('mahasiswa.edit', $m->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('mahasiswa.destroy', $m->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
        </table>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>