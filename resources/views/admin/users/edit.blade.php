@extends('layouts.app')

@section('content')
  <div class="page-wrapper">
    @if (session('status'))
      <div class="alert alert-success" role="alert">
        {{ session('status') }}
      </div>
    @endif

    <!-- PAGE HEADER -->
    <div class="page-header d-print-none" aria-label="Page header">
      <div class="container-xl">
        <div class="row g-3 align-items-center">
          <div class="col-auto">
            <a href="#" class="btn btn-icon" data-bs-toggle="tooltip" data-bs-placement="top" title="Back">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-chevron-left">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M15 6l-6 6l6 6" />
              </svg>
            </a>
          </div>
          <div class="col">
            <h2 class="page-title">Editing user - {{ $user->name }}</h2>
          </div>
          <div class="d-print-none col-auto ms-auto">
            <div class="d-flex">
              <button type="submit" form="form-user-edit" class="btn btn-primary">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor" class="icon icon-tabler icons-tabler-filled icon-tabler-circle-check">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                  <path d="M17 3.34a10 10 0 1 1 -14.995 8.984l-.005 -.324l.005 -.324a10 10 0 0 1 14.995 -8.336zm-1.293 5.953a1 1 0 0 0 -1.32 -.083l-.094 .083l-3.293 3.292l-1.293 -1.292l-.094 -.083a1 1 0 0 0 -1.403 1.403l.083 .094l2 2l.094 .083a1 1 0 0 0 1.226 0l.094 -.083l4 -4l.083 -.094a1 1 0 0 0 -.083 -1.32z" />
                </svg>
                Save
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- END PAGE HEADER -->

    <div class="page-body">
      <div class="container-xl">
        <div class="row row-cards">
          <div class="col-12">
            <form id="form-user-edit" action="{{ route('users.update', ['user' => $user]) }}" method="post" class="card card-md">
              @csrf
              @method('put')
              <div class="card-body">
                <div class="row justify-content-center">
                  <div class="col-md-8">
                    <div class="row mb-3">
                      <label class="col-3 col-form-label required">Name</label>
                      <div class="col">
                        <input type="name" class="form-control" placeholder="Joe" disabled value="{{ $user->name }}">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label class="col-3 col-form-label required">Email</label>
                      <div class="col">
                        <input type="email" class="form-control" placeholder="joe@example.com" disabled value="{{ $user->email }}">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label class="col-3 col-form-label required">Role</label>
                      <div class="col">
                        <div class="form-selectgroup form-selectgroup-pills">
                          @foreach ($roles as $role)
                            <label class="form-selectgroup-item">
                              <input type="checkbox" name="roles[]" value="{{ $role->name }}" class="form-selectgroup-input" @checked($user->hasRole($role->name))>
                              <span class="form-selectgroup-label">{{ $role->name }}</span>
                            </label>
                          @endforeach
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
