@extends('adminlte::page')

@section('title', 'Pengelolaan Dosen Pembimbing')

@section('content_header')
    <h1 class="text-center text-bold" style="font-family:Arial, Helvetica, sans-serif">PENGELOLAAN PROPOSAL</h1>
@stop
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    {{ __('Pengelolaan Proposal') }}

                </div>
                
                    <div class="container">
                        <!-- <a href="/koordinator/kelolatopik/tambah"> -->
                            <button type="button" class="btn btn-primaryfloat-left mr-3" data-toggle="modal" data-target="#modalTambahData">
                                + Tambah Data
                            </button></a>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">NPM </th>
                                        <th scope="col">Judul Akhir</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $id=1; @endphp
                                    @foreach($proposals as $key)
                                    <tr>
                                        <th>{{$id++}}</th>
                                        <td>{{$key->nama}}</td>
                                        <td>{{$key->npm}}</td>
                                        <td>{{$key->judul_akhir}}</td>
                                    
                                        <td>
                                                <div class="btn-group" role="group" aria-label="Basic Example">
                                                        <button type="button" id="btn-edit-topiks" class="btn" data-toggle="modal" data-target="#modalEdit" data-id="{{ $key->id }}" data-nama="{{ $key->nama }}" data-npm="{{ $key->npm }}" data-judul_tugas="{{ $key->judul_tugas }}">Terima</button>
                                                        <button type="button" id="btn-delete-topiks" class="btn" data-toggle="modal" data-target="#modalDeleteData" data-id="{{ $key->id }}" data-nama="{{$key->nama}}">Revisi</button>
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
                    
                @stop
                
                    @section('footer')
                        <div class="float-right d-none d-sm-block">
                            <b>Version</b> 1.0.0
                        </div>
                        <strong>CopyRight &copy; {{date('Y')}}
                        <a href="" target="_blank">APSINGASALGA</a>.</strong> All Right reserved
                    @stop