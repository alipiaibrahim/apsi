@extends('adminlte::page')

@section('title', 'Kelola Dosen')

@section('content_header')
    <h1 class="text-center text-bold" style="font-family:Arial, Helvetica, sans-serif">KELOLA DOSEN</h1>
@stop
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    {{-- {{ __('Pengelolaan Dosen') }} --}}

                </div>
                <div class="card-body">
                    <!-- <a href="/prodi/keloladosen/tambah"> -->
                        <button type="button" class="btn btn-primaryfloat-left btn-success mr-3" data-toggle="modal" data-target="#modalTambahData">
                            + Tambah Data
                        </button></a>
                        <div class="table-responsive">
                            <table id="table-data" class="table">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">NIDN</th>
                                    <th scope="col">Nama </th>
                                    <th scope="col">Jabatan</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $id=1; @endphp
                                @foreach($keloladosens as $key)
                                <tr>
                                    <th>{{$id++}}</th>
                                    <td>{{$key->nidn}}</td>
                                    <td>{{$key->nama}}</td>
                                    <td>{{$key->jabatan}}</td>
                                
                                    <td>
                                            <div class="btn-group" role="group" aria-label="Basic Example">
                                                    <button type="button" id="btn-edit-dosens" class="btn btn-primary" data-toggle="modal" data-target="#modalEdit" data-id="{{ $key->id }}" data-nidn="{{ $key->nidn }}" data-nama="{{ $key->nama }}" data-jabatan="{{ $key->jabatan }}">Ubah</button>
                                                    <button type="button" id="btn-delete-dosens" class="btn btn-danger" data-toggle="modal" data-target="#modalDeleteData" data-id="{{ $key->id }}" data-nama="{{$key->nama}}">Hapus</button>
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
                </div>
            
            
            <!-- Modal Tambah Data -->
            <div class="modal fade" id="modalTambahData" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tambah Data Dosen</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="post" action="{{ route('admin.keloladosen.tambah') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="nidn">NIDN</label>
                                    <input type="text" class="form-control" placeholder="Masukan Data" name="nidn" id="nidn" required />
                                </div>
                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input type="text" class="form-control" placeholder="Masukan Nama " name="nama" id="Nama" required />
                                </div>
                                <div class="form-group">
                                    <label for="jabatan">Jabatan</label>
                                    <input type="text" class="form-control" placeholder="Masukan jabatan" name="jabatan" id="jabatan" required />
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal Tambah Data -->
            
            <!-- Modal Edit Data -->
            <div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Ubah Data Dosen</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="post" action="{{ route('admin.keloladosen.update') }}" enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="edit-nidn">NIDN</label>
                                            <input type="text" class="form-control" name="nidn" id="edit-nidn" required />
                                        </div>
                                        <div class="form-group">
                                            <label for="edit-nama">Nama</label>
                                            <input type="text" class="form-control" name="nama" id="edit-nama" required />
                                        </div>
                                        <div class="form-group">
                                            <label for="edit-jabatan">Jabatan</label>
                                            <input type="text" class="form-control" name="jabatan" id="edit-jabatan" required />
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="id" id="edit-id" />
            
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-success">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Modal Edit Data -->
            
            <!-- Modal Hapus Data -->
            <div class="modal fade" id="modalDeleteData" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Hapus Data Dosen</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Apakah anda yakin akan menghapus data Dosen <strong class="font-italic" id="delete-nama"></strong>?
                            <form method="post" action="{{ route('admin.keloladosen.delete') }}" enctype="multipart/form-data">
                                @csrf
                                @method('DELETE')
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="id" id="delete-id" value="" />
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
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
                    $(document).on('click', '#btn-edit-dosens', function() {
                        let id = $(this).data('id');
                        let nidn = $(this).data('nidn');
                        let nama = $(this).data('nama');
                        let jabatan = $(this).data('jabatan');
                        $('#edit-nidn').val(nidn);
                        $('#edit-nama').val(nama);
                        $('#edit-jabatan').val(jabatan);
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
            
                    $(document).on('click', '#btn-delete-dosens', function() {
                        let id = $(this).data('id');
                        let nama = $(this).data('nama');
                        $('#delete-id').val(id);
                        $('#delete-nama').text(nama);
                    });
                });
            </script>
            @stop