@extends('dashboard-layouts.app')
@section('title')
Edit Data
@endsection
@section('style-libraries')
<link rel="stylesheet" href="{{ asset('assets/css/select2/dist/css/select2.min.css') }}">
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
@endsection
@section('content')
  <section class="section">
    <div class="section-header">
      <div class="section-header-back">
        <a href="{{ route('positions.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
      </div>
      <h1>Form Edit Jabatan</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ url('/dashboard') }}">Dasbor</a></div>
        <div class="breadcrumb-item"><a href="{{ route('positions.index') }}">Jabatan</a></div>
        <div class="breadcrumb-item">Form Edit Jabatan</div>
      </div>
    </div>

    <div class="section-body">
        <h2 class="section-title">Form Edit Jabatan</h2>
          <p class="section-lead">
            Yang memiliki tanda <span class="text-danger">*</span> wajib diisi!
          </p>

      <div class="card">
        <div class="card-header">
          <h4>Form</h4>
        </div>

        <div class="card-body">
          <form action="{{ route('positions.update', $position->id) }}" method="POST" class="needs-validation" novalidate="">
            @method('put')
            @csrf
            <div class="form-group">
              <label>Nama<span class="text-danger">*</span></label>
              <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Nama" value="{{ $position->name }}" required autocomplete="name">
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

            <div class="form-group">
              <label for="part_id" class="form-label">Bagian <span class="text-danger">*</span></label>
              <select id="part_id" type="text" class="form-control select2 @error('part_id') is-invalid @enderror" name="part_id" required autocomplete="part_id">
                  <option value="" disabled selected>-Pilih Bagian-</option>
                  @foreach ($parts as $part)
                  <option value="{{$part->id}}"@if ($position->part_id == $part->id)selected @endif>{{$part->name}}</option>
                  @endforeach
              </select>
              @if (count($errors) > 0)
                @error('part_id')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              @else
                <div class="invalid-feedback">
                  Mohon isikan bagian Anda
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
@section('script-libraies')
<script src="{{ asset('assets/css/select2/dist/js/select2.full.min.js') }}"></script>
<script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.11.2/jquery.mask.min.js" integrity="sha512-Y/GIYsd+LaQm6bGysIClyez2HGCIN1yrs94wUrHoRAD5RSURkqqVQEU6mM51O90hqS80ABFTGtiDpSXd2O05nw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endsection
