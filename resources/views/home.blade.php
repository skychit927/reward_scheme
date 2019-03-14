@extends('layouts.app')

@section('content')

    <div class="card">
        <div class="card-header">
            <div class="card-title">Dashboard</div>
        </div>
        <div class="card-body">
            Welcome! {{  $user->name  }}
        </div>
    </div>

@endsection
