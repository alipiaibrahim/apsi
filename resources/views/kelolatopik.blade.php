@extends('adminlte::page')

@section('title', 'Kelola Topik')

@section('content_header')
    <h1 class="text-center text-bold" style="font-family:Arial, Helvetica, sans-serif">KELOLA TOPIK</h1>
@stop
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    {{-- {{ __('Pengelolaan Topik') }} --}}
                </div>
                
                <div class="card-body">
                        <!-- <a href="/koordinator/kelolatopik/tambah"> -->
                            <button type="button" class="btn btn-primaryfloat-left btn-success mr-3" data-toggle="modal" data-target="#modalTambahData">
                                + Tambah Data
                            </button></a>
                            <div class="table-responsive">
                                <table id="table-data" class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Judul</th>
                                        <th scope="col">Dosen </th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $id=1; @endphp
                                    @foreach($topik as $key)
                                    <tr>
                                        <th>{{$id++}}</th>
                                        <td>{{$key->judul}}</td>
                                        <td>{{$key->dosen}}</td>
                                        <td>{{$key->status}}</td>
                                    
                                        <td>
                                                <div class="btn-group" role="group" aria-label="Basic Example">
                                                        <button type="button" id="btn-edit-topiks" class="btn btn-primary" data-toggle="modal" data-target="#modalEdit" data-id="{{ $key->id }}" data-judul="{{ $key->judul }}" data-dosen="{{ $key->dosen }}" data-status="{{ $key->status }}">Ubah</button>
                                                        <button type="button" id="btn-delete-topiks" class="btn btn-danger" data-toggle="modal" data-target="#modalDeleteData" data-id="{{ $key->id }}" data-judul="{{$key->judul}}">Hapus</button>
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
                                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Penelitian</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form method="post" action="{{ route('koordinator.kelolatopik.tambah') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="judul">Judul</label>
                                        <input type="text" class="form-control" placeholder="Masukan Data" name="judul" id="judul" required />
                                    </div>
                                    <div class="form-group">
                                        <label for="dosen">Dosen</label>
                                        <input type="text" class="form-control" placeholder="Masukan dosen " name="dosen" id="dosen" required />
                                    </div>
                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <input type="text" class="form-control" placeholder="Masukan status kategori" name="status" id="status" required />
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
                                <h5 class="modal-title" id="exampleModalLabel">Ubah Data Penelitian</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form method="post" action="{{ route('koordinator.kelolatopik.update') }}" enctype="multipart/form-data">
                                    @csrf
                                    @method('PATCH')
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="edit-judul">Judul</label>
                                                <input type="text" class="form-control" name="judul" id="edit-judul" required />
                                            </div>
                                            <div class="form-group">
                                                <label for="edit-dosen">Dosen</label>
                                                <input type="text" class="form-control" name="dosen" id="edit-dosen" required />
                                            </div>
                                            <div class="form-group">
                                                <label for="edit-status">Status</label>
                                                <input type="text" class="form-control" name="status" id="edit-status" required />
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
                                <h5 class="modal-title" id="exampleModalLabel">Hapus Data Penelitian</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Apakah anda yakin akan menghapus data topik <strong class="font-italic" id="delete-judul"></strong>?
                                <form method="post" action="{{ route('koordinator.kelolatopik.delete') }}" enctype="multipart/form-data">
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
                        $(document).on('click', '#btn-edit-topiks', function() {
                            let id = $(this).data('id');
                            let judul = $(this).data('judul');
                            let dosen = $(this).data('dosen');
                            let status = $(this).data('status');
                            $('#edit-judul').val(judul);
                            $('#edit-dosen').val(dosen);
                            $('#edit-status').val(status);
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
                
                        $(document).on('click', '#btn-delete-topiks', function() {
                            let id = $(this).data('id');
                            let judul = $(this).data('judul');
                            $('#delete-id').val(id);
                            $('#delete-judul').text(judul);
                        });
                    });
                </script>
                @stop