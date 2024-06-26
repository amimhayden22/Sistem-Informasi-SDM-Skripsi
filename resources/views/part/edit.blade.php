@extends('dashboard-layouts.app')
@section('title')
    Edit Data
@endsection
@section('content')
  <section class="section">
    <div class="section-header">
      <div class="section-header-back">
        <a href="{{ route('parts.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
      </div>
      <h1>Form Edit Bagian</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ url('/dashboard') }}">Dasbor</a></div>
        <div class="breadcrumb-item"><a href="{{ route('parts.index') }}">Bagian</a></div>
        <div class="breadcrumb-item">Form Edit Bagian</div>
      </div>
    </div>

        <div class="section-body">
            <h2 class="section-title">Form Edit Bagian</h2>
              <p class="section-lead">
                Yang memiliki tanda <span class="text-danger">*</span> wajib diisi!
              </p>
              @if (session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
              @endif
                <div class="card">
                  <div class="card-header">
                    <h4>Form</h4>
                  </div>
      
                <div class="card-body">
                    <form action="{{ route('parts.update', $part->id) }}" method="POST" class="needs-validation" novalidate="">
                      @method('put')
                      @csrf
                    <div class="form-group">
                        <label>Nama<span class="text-danger">*</span></label>
                        <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Nama" value="{{ $part->name }}" required autocomplete="name">
                        @if (count($errors) > 0)
                          @error('name')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                          @enderror
                        @else
                          <div class="invalid-feedback">
                            Mohon isikan nama Anda
                          </div>
                        @endif
                    </div>
                    <div class="float-right">
                        <div class="form-group">
                          <button class="btn btn-primary" type="submit">Edit</button>
                        </div>
                    </div>
                </form>
              </div>
          </div>
        </div>
    </section>
@endsection