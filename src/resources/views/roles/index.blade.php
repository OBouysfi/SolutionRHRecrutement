@extends('layouts.master')

@section('content')
    <div class="container mt-5">
        <h1>Gestion des Rôles</h1>
        <a href="{{ route('roles.create') }}" class="btn btn-theme">Créer un Rôle</a>

        <table class="table">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Permissions</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($roles as $role)
                    <tr>
                        <td>{{ __($role->name) }}</td>
                        <td>
                            @foreach ($role->permissions as $permission)
                                <span class="badge bg-secondary">{{ __($permission->name) }}</span>
                            @endforeach
                        </td>
                        <td>
                            <a href="{{ route('roles.edit', $role->id) }}" class="btn   btn-warning">Modifier</a>
                            <form action="{{ route('roles.destroy', $role->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn   btn-danger">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
