@extends('adminlte::page')

@section('title', 'Pengajuan Proposal')

@section('content_header')
    <h1 class="text-center text-bold" style="font-family:Arial, Helvetica, sans-serif">PENGAJUAN PROPOSAL</h1>
@stop
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    {{-- {{ __('Pengelolaan Data Proposal') }} --}}

                </div>
                
                        <!-- <a href="/koordinator/kelolatopik/tambah"> -->
                            <div class="card-body">
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
                                        <th scope="col">Nama</th>
                                        <th scope="col">NPM </th>
                                        <th scope="col">Judul Tugas Akhir</th>
                                        <th scope="col">Proposal</th>
                                        {{-- <th scope="col">Tanggal Pengajuan</th> --}}
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $id=1; @endphp
                                    @foreach($dataproposals as $key)
                                    <tr>
                                        <th>{{$id++}}</th>
                                        <td>{{$key->nama}}</td>
                                        <td>{{$key->npm}}</td>
                                        <td>{{$key->judul_tugas}}</td>
                                        {{-- <td>{{$key->proposal}}</td> --}}
                                        <td>
                                            @if($key->proposal !== null)
                                            {{$key->proposal}}
                                                {{-- <img src="{{asset('storage/proposal_dataproposals/'.$key->proposal) }}" width="100px"/> --}}
                                            @else
                                                [gambar tidak tersedia]
                                            @endif
                                        </td>
                                        {{-- <td>{{$key->created_at}}</td> --}}
                                    
                                        <td>
                                                <div class="btn-group" role="group" aria-label="Basic Example">
                                                        <button type="button" id="btn-edit-dataproposals" class="btn btn-primary" data-toggle="modal" data-target="#modalEdit" data-id="{{ $key->id }}" data-nama="{{ $key->nama }}" data-npm="{{ $key->npm }}" data-judul_tugas="{{ $key->judul_tugas }}" data-proposal="{{ $key->proposal }}">Terima</button>
                                                        <button type="button" id="btn-delete-dataproposals" class="btn btn-danger" data-toggle="modal" data-target="#modalDeleteData" data-id="{{ $key->id }}" data-nama="{{$key->nama}}">Revisi</button>
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
                    </div>
        </div>                <!-- Modal Tambah Data -->
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
                        <form method="post" action="{{ route('mahasiswa.dataproposal.tambah') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control" placeholder="Masukan Data" name="nama" id="nama" required />
                            </div>
                            <div class="form-group">
                                <label for="npm">Npm</label>
                                <input type="text" class="form-control" placeholder="Masukan npm " name="npm" id="npm" required />
                            </div>
                            <div class="form-group">
                                <label for="judul_tugas">Judul Tugas</label>
                                <input type="text" class="form-control" placeholder="Masukan judul_tugas kategori" name="judul_tugas" id="judul_tugas" required />
                            </div>
                            {{-- <div class="form-group">
                                <label for="tgl_pengajuan">tgl_pengajuan</label>
                                <input type="text" class="form-control" placeholder="Masukan tgl_pengajuan kategori" name="tgl_pengajuan" id="tgl_pengajuan" required />
                            </div> --}}
                            <div class="form-group">
                                <label for="proposal">Proposal</label>
                                <input type="file" class="form-control" name="proposal" id="proposal"/>
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
                    <form method="post" action="{{ route('mahasiswa.dataproposal.update') }}" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="edit-nama">Nama</label>
                                    <input type="text" class="form-control" placeholder="Masukan Data" name="nama" id="nama" required />
                                </div>
                                <div class="form-group">
                                    <label for="edit-npm">Npm</label>
                                    <input type="text" class="form-control" placeholder="Masukan npm " name="npm" id="npm" required />
                                </div>
                                <div class="form-group">
                                    <label for="edit-judul_tugas">Judul Tugas</label>
                                    <input type="text" class="form-control" placeholder="Masukan judul_tugas kategori" name="judul_tugas" id="judul_tugas" required />
                                </div>
                                {{-- <div class="form-group">
                                    <label for="tgl_pengajuan">tgl_pengajuan</label>
                                    <input type="text" class="form-control" placeholder="Masukan tgl_pengajuan kategori" name="tgl_pengajuan" id="tgl_pengajuan" required />
                                </div> --}}
                                <div class="form-group">
                                    <label for="edit-proposal">Proposal</label>
                                    <input type="file" class="form-control" name="proposal" id="proposal"/>
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
        @section('css')
    <style>
        input[type=text], select, textarea {
        width: 100%; /* Full width */
        padding: 12px; /* Some padding */ 
        border: 1px solid #ccc; /* Gray border */
        border-radius: 4px; /* Rounded borders */
        box-sizing: border-box; /* Make sure that padding and width stays in place */
        margin-top: 6px; /* Add a top margin */
        margin-bottom: 16px; /* Bottom margin */
        resize: vertical /* Allow the user to vertically resize the textarea (not horizontally) */
}
    
    </style>
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
                $(function(){
        
        
                    $(document).on('click', '#btn-edit-dataproposals', function(){
                        let id = $(this).data('id');
        
                        $('#image-area').empty();
        
                        $.ajax({
                            type: "get",
                            url: baseurl+'/admin/ajaxadmin/datadataproposal/'+id,
                            dataType: 'json',
                            success: function(res){
                                $('#edit-nama').val(res.nama);
                                $('#edit-npm').val(res.npm);
                                $('#edit-judul_tugas').val(res.judul_tugas);
                                $('#edit-id').val(res.id);
                                $('#edit-old-proposal').val(res.proposal);
        
                                if (res.cover !== null) {
                                    // $('#image-area').append(
                                        $('#edit-proposal').val(res.proposal);
                                        // "<img src='"+baseurl+"/storage/cover_drug/"+res.cover+"' width='200px'/>"
                                    // );
                                } else {
                                    $('#image-area').append('[Gambar tidak tersedia]');
                                }
                            },
                        });
                    });
        
                });
            </script>
        @stop
        
        @section('js')
            <script>
        
            </script>
        @stop