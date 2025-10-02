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
        <div class="row g-2 align-items-center">
          <div class="col">
            <h2 class="page-title">Users</h2>
            <div class="text-secondary">All users in this application.</div>
          </div>
        </div>
      </div>
    </div>
    <!-- END PAGE HEADER -->

    <div class="page-body">
      <div class="container-xl">
        <div class="row row-cards">
          @if ($users->count())
            <div class="col-12">
              <!-- TABLE -->
              <div class="card overflow-hidden">
                <div class="table-responsive">
                  <table class="table-vcenter card-table table-striped table">
                    <thead>
                      <tr>
                        <th class="w-1">ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                      </tr>
                    </thead>
                    <tbody>
                      @forelse ($users as $user)
                        <tr>
                          <td>{{ $user->id }}</td>
                          <td>
                            <div class="d-flex align-items-center">
                              <span class="avatar avatar-xs me-2" style="background-image: url({{ $user->avatar() }})"></span>
                              <span><a href="{{ route('users.edit', ['user' => $user]) }}">{{ $user->name }}</a></span>
                            </div>
                          </td>
                          <td class="text-secondary"><a href="mailto:joe@domain.com" class="text-reset">{{ $user->email }}</a></td>
                          <td class="text-secondary">
                            @foreach ($user->roles as $role)
                              <span class="status status-green">{{ $role->name }}</span>
                            @endforeach
                          </td>
                        </tr>
                      @empty
                      @endforelse
                    </tbody>
                  </table>
                </div>
              </div>
              <!-- END TABLE -->
            </div>
          @else
            <div class="col-12">
              <div class="empty border-dashed">
                <div class="empty-icon">
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <circle cx="12" cy="12" r="9"></circle>
                    <line x1="9" y1="10" x2="9.01" y2="10"></line>
                    <line x1="15" y1="10" x2="15.01" y2="10"></line>
                    <path d="M9.5 15.25a3.5 3.5 0 0 1 5 0"></path>
                  </svg>
                </div>
                <p class="empty-title">No user found.</p>
                <p class="empty-subtitle text-secondary">
                  Try adjusting your search or filter to find what you're looking for.
                </p>
              </div>
            </div>
          @endif


        </div>

        <!-- PAGINATION -->
        <!-- END PAGINATION -->

      </div>
    </div>
  </div>
@endsection
