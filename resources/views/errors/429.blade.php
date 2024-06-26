@extends('auth-layouts.app')
@section('title', __('Terlalu Banyak Permintaan'))
@section('content')
<div class="container mt-5">
        <div class="page-error">
          <div class="page-inner">
            <h1 style="color: #dc0a17">429</h1>
            <div class="page-description">
              Terlalu Banyak Permintaan.
            </div>
            <div class="page-search">
              <!-- <form>
                <div class="form-group floating-addon floating-addon-not-append">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <div class="input-group-text">
                        <i class="fas fa-search"></i>
                      </div>
                    </div>
                    <input type="text" class="form-control" placeholder="Search">
                    <div class="input-group-append">
                      <button class="btn btn-primary btn-lg">
                        Search
                      </button>
                    </div>
                  </div>
                </div>
              </form> -->
              <div class="mt-3">
                <a href="{{ url('/dashboard') }}">Kembali ke Dashboard</a>
              </div>
            </div>
          </div>
        </div>
        <div class="simple-footer mt-5">
          Copyright &copy; Sadasa Academy {{ date('Y') }}
        </div>
      </div>
@endsection

