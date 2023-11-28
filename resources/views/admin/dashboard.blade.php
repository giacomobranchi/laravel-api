@extends('layouts.admin.app')

@section('content')
    <div class="container">
        <h2 class="fs-4 text-secondary my-4">
            {{ __('Dashboard') }}
        </h2>
        <div class="row justify-content-center">
            <div class="col">
                <div class="card">
                    <div class="card-header">{{ __('User Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('You are logged in!') }}
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center my-3">
            <div class="col">
                <div class="card">
                    <div class="card-header"><i class="fa-solid fa-users"></i></i> {{ __('Users') }}</div>

                    <div class="card-body">
                        <p>Total Users: <strong>{{ $total_users }}</strong></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center my-3">
            <div class="col">
                <div class="card">
                    <div class="card-header"><i class="fa-solid fa-diagram-project"></i> {{ __('Projects') }}</div>

                    <div class="card-body">
                        <p>Total Projects Registered: <strong>{{ $total_projects }}</strong>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center my-3">
            <div class="col">
                <div class="card">
                    <div class="card-header"><i class="fa-solid fa-tags"></i> {{ __('Project Types') }}</div>

                    <div class="card-body">
                        <p>Number of types registered: <strong>{{ $total_types }}</strong>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
