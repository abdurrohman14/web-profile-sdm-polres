@extends('partials.main')
@section('content')

<h1>Super Admin Dashboard</h1>
{{-- <div class="container mt-3">
    <h1>Jabatan</h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Parent</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($jabatans as $jabatan)
            <tr>
                <td>{{ $jabatan->id }}</td>
                <td>{{ $jabatan->nama }}</td>
                <td>{{ $jabatan->parent->nama ?? 'N/A' }}</td>
                <td>
                    <a href="" class="btn btn-primary btn-sm">View</a>
                    <a href="" class="btn btn-warning btn-sm">Edit</a>
                    <form action="" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this item?');">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div> --}}

@endsection