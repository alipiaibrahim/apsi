@extends('adminlte::page')

@section('title', 'Pengelolaan Dosen Pembimbing')

@section('content_header')
    <h1 class="text-center text-bold" style="font-family:Arial, Helvetica, sans-serif">PENGELOLAAN DOSEN PEMBIMBING</h1>
@stop
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    {{-- {{ __('Pengelolaan Dospem') }} --}}

                </div>
                
                <div class="card-body">
                        <!-- <a href="/koordinator/dospem/tambah"> -->
                            {{-- <button type="button" class="btn btn-primaryfloat-left btn-success mr-3" data-toggle="modal" data-target="#modalTambahData">
                                + Tambah Data
                            </button></a> --}}
                            <div class="table-responsive">
                                <table id="table-data" class="table">
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
                                            <button type="button" id="btn-edit-dospems" class="btn btn-primary" data-toggle="modal" data-target="#modalEdit" data-id="{{ $key->id }}" data-mahasiswas="{{ $key->mahasiswas }}" data-npm="{{ $key->npm }}" data-proposal="{{ $key->proposal }}" data-dosens="{{ $key->dosens }}">Terima</button>
                                                {{-- <div class="btn-group" role="group" aria-label="Basic Example">
                                                        <div class="alert alert-success alert-block">
                                                        <button type="button" id="btn-edit-dospems" class="btn btn-primary" data-toggle="modal" data-target="#modalEdit" data-id="{{ $key->id }}" data-mahasiswas="{{ $key->mahasiswas }}" data-npm="{{ $key->npm }}" data-proposal="{{ $key->proposal }}" data-dosens="{{ $key->dosens }}">Terima</button>
                                                        {{-- <button type="button" class="btn btn-primary">Terima</button>
                                                        <strong>{{ $message }}</strong>
                                                </div> --}}
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
                    @stop
            
                    @section('footer')
                        <div class="float-right d-none d-sm-block">
                            <b>Version</b> 1.0.0
                        </div>
                        <strong>CopyRight &copy; {{date('Y')}}
                        <a href="" target="_blank">APSINGASALGA</a>.</strong> All Right reserved
                    @stop