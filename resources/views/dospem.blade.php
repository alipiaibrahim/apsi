@extends('adminlte::page')

@section('title', 'Dosen Pembimbing')

@section('content_header')
    <h1 class="text-center text-bold" style="font-family:Arial, Helvetica, sans-serif">DOSEN PEMBIMBING</h1>
@stop
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    {{-- {{ __('Pengelolaan Dospem') }} --}}

                </div>
                
                    <div class="container">
                        <!-- <a href="/koordinator/dospem/tambah"> -->
                            <button type="button" class="btn btn-primaryfloat-left btn-success mr-3" data-toggle="modal" data-target="#modalTambahData">
                                + Tambah Data
                            </button></a>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">NPM </th>
                                        <th scope="col">Proposal</th>
                                        <th scope="col">Dosen</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $id=1; @endphp
                                    @foreach($dospems as $key)

                                    <tr>

                                        <th>{{$id++}}</th>
                                        <td>{{$key->mahasiswas}}</td>
                                        <td>{{$key->npm}}</td>
                                        <td>{{$key->proposal}}</td>
                                        <td>{{$key->dosens}}</td>
                                    
                                        <td>
                                                <div class="btn-group" role="group" aria-label="Basic Example">
                                                        <button type="button" id="btn-edit-dospems" class="btn btn-primary" data-toggle="modal" data-target="#modalEdit" data-id="{{ $key->id }}" data-mahasiswas="{{ $key->mahasiswas }}" data-npm="{{ $key->npm }}" data-proposal="{{ $key->proposal }}" data-dosens="{{ $key->dosens }}">Pilih Dosen</button>
                                                </div>
                                            <!-- <button type="button" class="btn btn-danger">
                                                Hapus
                                            </button>
                                            <button type="button" class="btn btn-warning">
                                                Edit
                                            </button> -->
                                        </td>
                                    </tr>
                
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                <!-- Modal Tambah Data -->
            <div class="modal fade" id="modalTambahData" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="post" action="{{ route('koordinator.dospem.tambah') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="mahasiswas">Nama</label>
                                    <div class="input-group">
                                        <select name="mahasiswas" id="mahasiswas" placeholder="Input mahasiswas" aria-label="Example select with button addon">
                                        <option selected>Pilih....</option>
                                        @php
                                        $data=App\Models\Mahasiswa::get();
                                        @endphp
                                        @foreach($data as $key)
                                        <option value="{{$key->id}}">{{$key->nama}}</option>
                                        @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="npm">NPM</label>
                                    <div class="input-group">
                                        <select name="npm" id="npm" placeholder="Input npm" aria-label="Example select with button addon">
                                        <option selected>Pilih....</option>
                                        @php
                                        $data=App\Models\Mahasiswa::get();
                                        @endphp
                                        @foreach($data as $key)
                                        <option value="{{$key->id}}">{{$key->npm}}</option>
                                        @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="proposal">Proposal</label>
                                    <input type="text" class="form-control" placeholder="Masukan proposal" name="proposal" id="proposal" required />
                                </div>
                                <div class="form-group">
                                    <label for="dosens">Dosen</label>
                                    <div class="input-group">
                                        <select name="dosens" id="dosens" placeholder="Input dosens" aria-label="Example select with button addon">
                                        <option selected>Pilih....</option>
                                        @php
                                        $data=App\Models\Dosen::get();
                                        @endphp
                                        @foreach($data as $key)
                                        <option value="{{$key->id}}">{{$key->nama}}</option>
                                        @endforeach
                                        </select>
                                    </div>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                            <button type="submit" class="btn btn-primary">Tambah</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal Tambah Data -->

            
            <!-- Modal Hapus Data -->
            <div class="modal fade" id="modalDeleteData" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Apakah anda yakin akan menghapus data Dosen <strong class="font-italic" id="delete-mahasiswas"></strong>?
                            <form method="post" action="{{ route('koordinator.dospem.delete') }}" enctype="multipart/form-data">
                                @csrf
                                @method('DELETE')
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="id" id="delete-id" value="" />
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </div> 
                    </div>  
                </div>
            </div>
            
            <!-- Modal Hapus Data -->
            @stop
            
            @section('footer')
                <div class="float-right d-none d-sm-block">
                    <b>Version</b> 1.0.0
                </div>
                <strong>CopyRight &copy; {{date('Y')}}
                <a href="" target="_blank">APSINGASALGA</a>.</strong> All Right reserved
            @stop
            
            @section('js')
            <script>
                $(function() {
                    $(document).on('click', '#btn-edit-dospems', function() {
                        let id = $(this).data('id');
                        let mahasiswas = $(this).data('mahasiswas');
                        let npm = $(this).data('npm');
                        let proposal = $(this).data('proposal');
                        let dosen = $(this).data('dosen');
                        $('#edit-mahasiswas').val(mahasiswas);
                        $('#edit-npm').val(npm);
                        $('#edit-proposal').val(proposal);
                        $('#edit-dosen').val(dosen);
                        $('#edit-id').val(id);
            
                        // $.ajax({
                        //     type: "get",
                        //     url: baseurl + '/admin/ajaxadmin/dataCategories/' + id,
                        //     dataType: 'json',
                        //     success: function(res) {
                        //         console.log(res);
                        //     },
                        // });
                    });
            
                    $(document).on('click', '#btn-delete-dospems', function() {
                        let id = $(this).data('id');
                        let mahasiswas = $(this).data('mahasiswas');
                        $('#delete-id').val(id);
                        $('#delete-mahasiswas').text(mahasiswas);
                    });
                });
            </script>
            @stop