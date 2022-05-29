@extends('adminlte::page')

@section('title', 'Topik')

@section('content_header')
    <h1 class="text-center text-bold" style="font-family:Arial, Helvetica, sans-serif">TOPIK</h1>
@stop
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    {{ __('Topik') }}

                </div>
                
                    <div class="container">
                        <!-- <a href="/koordinator/kelolatopik/tambah"> -->
                            <table class="table">
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
                                                        <button type="button" id="btn-edit-topiks" class="btn" data-toggle="modal" data-target="#modalEdit" data-id="{{ $key->id }}" data-judul="{{ $key->judul }}" data-dosen="{{ $key->dosen }}" data-status="{{ $key->status }}"><i class="fa fa-edit"></i></button>
                                                        <button type="button" id="btn-delete-topiks" class="btn" data-toggle="modal" data-target="#modalDeleteData" data-id="{{ $key->id }}" data-judul="{{$key->judul}}"><i class="fa fa-trash"></i></button>
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
                
                <!-- Modal Edit Data -->
                <div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit Data </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form method="post" action="{{ route('mahasiswa.topik.update') }}" enctype="multipart/form-data">
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
                                                <select id="edit-status" name="edit-status">
                                                    <option selected>Belum Diambil</option>
                                                    <option value="diambil">Diambil</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <input type="hidden" name="id" id="edit-id" />
                
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success">Update Data</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Modal Edit Data -->
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
                    });
                </script>
                @stop