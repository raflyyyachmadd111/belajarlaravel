<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>

    <div>
        <div class="container">
            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>

            @endif
            <button data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-primary">Tambah Data</button>

            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labellebdy="exampleModalLabel" area-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-tittle" id="exampleModalLabel">Tambah Data Barang</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form method="post" action="{{ route('barang.store') }}">
                            @csrf
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="itemName" class="form-label">Nama Barang</label>
                                    <input type="text" class="form-control" name="nama" placeholder="Kopi Slukatan">
                                </div>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="itemName" class="form-label">Hrga Barang</label>
                                    <input type="number" class="form-control" name="harga" placeholder="1000">
                                </div>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="itemName" class="form-label">Jumlah Barang</label>
                                    <input type="number" class="form-control" name="jumlah" placeholder="222">
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama Barang</th>
                                <th scope="col">Harga Barang</th>
                                <th scope="col">Jumlah Barang</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $item)
                            <tr>
                                <th scope="row">{{ $item->id }}</th>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->harga }}</td>
                                <td>{{ $item->jumlah }}</td>
                                <td>
                                    <a href="{{ route('barang.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('barang.destroy', $item->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>