@extends('adminlte::page')

@section('title', 'Kelola User')

@section('content_header')
    <h1 class="text-center text-bold" style="font-family:Arial, Helvetica, sans-serif">KELOLA USER</h1>
@stop
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    {{-- {{ __('Pengelolaan User') }} --}}
                </div>
                
                <div class="card-body">
                        <!-- <a href="/koordinator/kelolatopik/tambah"> -->
                            <button type="button" class="btn btn-primaryfloat-left btn-success mr-3" data-toggle="modal" data-target="#modalTambahData">
                                + Tambah Data
                            </button></a>
                            <div class="btn-group mb-5" role="group" aria-label="Basis Example">
                            </div>
                            <div class="table-responsive">
                                <table id="table-data" class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Username</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Password</th>
                                        <th scope="col">Roles ID</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $id=1; @endphp
                                    @foreach($users as $key)
                                    <tr>
                                        <th>{{$id++}}</th>
                                        <td>{{$key->name}}</td>
                                        <td>{{$key->username}}</td>
                                        <td>{{$key->email}}</td>
                                        <td>{{$key->password}}</td>
                                        <td>{{$key->roles_id}}</td>
                                    
                                        <td>
                                                <div class="btn-group" role="group" aria-label="Basic Example">
                                                        <button type="button" id="btn-edit-users" class="btn btn-primary" data-toggle="modal" data-target="#modalEdit" data-id="{{ $key->id }}" data-name="{{ $key->name }}" data-username="{{ $key->username }}" data-email="{{ $key->email }}" data-password="{{ $key->password }}" data-roles_id="{{ $key->roles_id }}">Ubah</button>
                                                        <button type="button" id="btn-delete-users" class="btn btn-danger" data-toggle="modal" data-target="#modalDeleteData" data-id="{{ $key->id }}" data-name="{{$key->name}}">Hapus</button>
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
                                <h5 class="modal-title" id="exampleModalLabel">Tambah Akun</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form method="post" action="{{ route('admin.kelolauser.tambah') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control" placeholder="Masukan Data" name="name" id="name" required />
                                    </div>
                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <input type="text" class="form-control" placeholder="Masukan username " name="username" id="username" required />
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="text" class="form-control" placeholder="Masukan Email" name="email" id="email" required />
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="text" class="form-control" placeholder="Masukan Password" name="password" id="password" required />
                                    </div>
                                    <div class="form-group">
                                        <label for="roles_id">Roles ID</label>
                                        {{-- <input type="text" class="form-control" placeholder="Masukan roles_id" name="roles_id" id="roles_id" required /> --}}
                                        <select id="roles_id" name="roles_id">
                                            <option selected>Pilih</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                        </select>
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
                                <h5 class="modal-title" id="exampleModalLabel">Ubah Akun</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form method="post" action="{{ route('admin.kelolauser.update') }}" enctype="multipart/form-data">
                                    @csrf
                                    @method('PATCH')
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="edit-name">name</label>
                                                <input type="text" class="form-control" name="name" id="edit-name" required />
                                            </div>
                                            <div class="form-group">
                                                <label for="edit-username">username</label>
                                                <input type="text" class="form-control" name="username" id="edit-username" required />
                                            </div>
                                            <div class="form-group">
                                                <label for="edit-email">email</label>
                                                <input type="text" class="form-control" name="email" id="edit-email" required />
                                            </div>
                                            <div class="form-group">
                                                <label for="edit-password">password</label>
                                                <input type="text" class="form-control" name="password" id="edit-password" required />
                                            </div>
                                            <div class="form-group">
                                                <label for="edit-roles_id">roles_id</label>
                                                {{-- <input type="text" class="form-control" name="roles_id" id="edit-roles_id" required /> --}}
                                                <select id="edit-roles_id" name="roles_id">
                                                    <option selected>Pilih</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                </select>
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
                                <h5 class="modal-title" id="exampleModalLabel">Hapus Akun</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Apakah anda yakin akan menghapus data user <strong class="font-italic" id="delete-name"></strong>?
                                <form method="post" action="{{ route('admin.kelolauser.delete') }}" enctype="multipart/form-data">
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
                        $(document).on('click', '#btn-edit-users', function() {
                            let id = $(this).data('id');
                            let name = $(this).data('name');
                            let username = $(this).data('username');
                            let email = $(this).data('email');
                            let password = $(this).data('password');
                            let roles_id = $(this).data('roles_id');
                            $('#edit-name').val(name);
                            $('#edit-username').val(username);
                            $('#edit-email').val(email);
                            $('#edit-password').val(password);
                            $('#edit-roles_id').val(roles_id);
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
                
                        $(document).on('click', '#btn-delete-users', function() {
                            let id = $(this).data('id');
                            let name = $(this).data('name');
                            $('#delete-id').val(id);
                            $('#delete-name').text(name);
                        });
                    });
                </script>
                @stop