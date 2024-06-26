@extends('dashboard-layouts.app')
@section('title')
    Pengguna
@endsection
@section('content')
<section class="section">
    <div class="section-header">
      <h1>Pengguna</h1>
      <div class="section-header-button">
        <a href="/create" class="btn btn-primary">Tambah Data</a>
    </div>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="{{ url('dashboard') }}">Dashboard</a></div>
      <div class="breadcrumb-item"><a href="{{ route('user.index') }}">Pengguna</a></div>
      <div class="breadcrumb-item">Tabel Pengguna</div>
  </div>
    </div>

    <h2 class="section-title">Pengguna</h2>
    <p class="section-lead">
        Anda dapat mengelola semua data kategori disini, seperti tambah dan edit.
    </p>
    
    <div class="card">
      <div class="card-header">
        <h4>Manajemen Pengguna</h4>
      </div>
      <div class="card-body">
        <div class="section-title mt-0">Pengguna</div>
        <table class="table table-hover">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">First</th>
              <th scope="col">Last</th>
              <th scope="col">Handle</th>
              <th scope="col">Yanto</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">1</th>
              <td>Mark</td>
              <td>Otto</td>
              <td>@mdo</td>
              <td>@mdo</td>
            </tr>
            <tr>
              <th scope="row">2</th>
              <td>Jacob</td>
              <td>Thornton</td>
              <td>@fat</td>
              <td>@mdo</td>
            </tr>
            <tr>
              <th scope="row">3</th>
              <td>Larry</td>
              <td>the Bird</td>
              <td>@twitter</td>
              <td>@mdo</td>
            </tr>
          </tbody>
        </table>

    




  </section>
@endsection