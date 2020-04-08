@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard for {{ Tenancy::getTenant()->name }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in! <br />
                    <br />
                    Available test objects:
                    <ul>
                    @foreach (\App\Test::get() as $test)
                        <li>{{ $test->name }}</li>
                    @endforeach
                    </ul>
                    <br />
                    You have access to the following tenants:
                    <ul>
                        @foreach (Tenancy::getAllowedTenants() as $tenant)
                            <li><a href="/switch/{{ $tenant->id }}">{{ $tenant->name }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
