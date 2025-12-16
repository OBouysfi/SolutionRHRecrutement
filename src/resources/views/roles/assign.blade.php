@extends('layouts.master')

@section('content')
    <div class="container-fluid mt-5 px-5 py-5">
        <h1>Gestion des Rôles</h1>
        <div class="alert alert-info">
            @if (session('success'))
                {{ session('success') }}
            @endif
        </div>
        <form action="{{ route('assignRole') }}" method="POST">
            @csrf

            <label for="user_id">Utilisateur</label>
            <select name="user_id" style="width: 100%">
                @foreach ($users as $user)
                    <option value="{{ __($user->id) }}">{{ __($user->name) }}</option>
                @endforeach
            </select>

            <div class="form-group">
                <label for="name">Nom du Rôle</label>
                <select name="role_id">
                    @foreach ($roles as $role)
                        <option value="{{ __($role->name) }}">{{ __($role->name) }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-theme">Assigner</button>
        </form>
    </div>
@endsection
