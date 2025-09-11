@extends('layout.template')
@section('content')

         <div class="container mt-4">
        <div class="card shadow">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="mb-0">Misi</h4>
                <button class="btn btn-primary" wire:click="closeModal" data-toggle="modal" data-target="#tambah-modal">
                    + Tambah Data Misi
                </button>
            </div>
            <div class="card-body">
                            <div class="table-responsive">
                               
                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Misi</th>

                                            <th>Action</th>

                                        </tr>
                                    </thead>

                                    <tbody>
                                 @foreach ($tampil_misi as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->misi }}</td>
                                                <td>

                                        <a class="btn btn-yellow" data-toggle="modal" style="cursor: pointer;"
                                        data-target="#edit-modal{{$item->id}}" wire:click="edit({{$item->id}})">
                                        <svg xmlns="http://www.w3.org/2000/svg" x-bind:width="size" x-bind:height="size" viewBox="0 0 24 24" fill="none" stroke="currentColor" x-bind:stroke-width="stroke" stroke-linecap="round" stroke-linejoin="round" width="24" height="24" stroke-width="2">
                                            <path d="M12 17l-6 4v-14a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v4"></path>
                                            <path d="M18.42 15.61a2.1 2.1 0 1 1 2.97 2.97l-3.39 3.42h-3v-3l3.42 -3.39z"></path>
                                          </svg>
                                    </a>
                                        <a class="btn btn-danger" data-toggle="modal" style="cursor: pointer"
                                        data-target="#hapus-modal{{$item->id}}" >

                                        <svg xmlns="http://www.w3.org/2000/svg" x-bind:width="size" x-bind:height="size" viewBox="0 0 24 24" fill="none" stroke="currentColor" x-bind:stroke-width="stroke" stroke-linecap="round" stroke-linejoin="round" width="24" height="24" stroke-width="2">
                                            <path d="M4 7l16 0"></path>
                                            <path d="M10 11l0 6"></path>
                                            <path d="M14 11l0 6"></path>
                                            <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                                            <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
                                          </svg>

                                    </a>
                                                </td>
                                            </tr>
                                            @include('misi.edit')
                                            @include('misi.hapus')

                                        @endforeach
                        </tbody>
                                </table>
                                            @include('misi.tambah')

                            </div>
            </div>
        </div>
         </div>
         
    
            @endsection
