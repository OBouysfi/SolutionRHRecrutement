@extends('layouts.master')

@section('content')
    @php
        use App\Models\Permission;
    @endphp
    <div class="container mt-5">
        <h1>Créer un Nouveau Rôle</h1>

        <form action="{{ route('roles.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="name">Nom du Rôle</label>
                <input type="text" name="name" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Permissions</label>
                <div class="row">
                    @foreach (Permission::all() as $permission)
                        <div class="col-md-4">
                            <div class="form-check">
                                <input type="checkbox" name="permissions[]" value="{{ __($permission->name) }}"
                                    class="form-check-input" id="permission_{{ __($permission->id) }}">
                                <label class="form-check-label" for="permission_{{ __($permission->id) }}">
                                    {{ __($permission->name) }}
                                </label>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <button type="submit" class="btn btn-theme">Créer le Rôle</button>
        </form>
    </div>
@endsection
