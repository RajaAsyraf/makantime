@extends('layouts.app')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>{{ $group->name }}</h1>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-body">
                @if($isGroupAdmin)
                <div class="buttons">
                    <a href="{{ route('group.create') }}" class="btn btn-primary float-right">Invite</a>
                </div>
                @endif
                <table class="table table-responsive w-100 d-block d-md-table">
                    <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Role</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($group->groupUsers as $groupUser)
                        <tr>
                            <td>{{ $groupUser->user->name }}</td>
                            @if($groupUser->is_admin)
                            <td><span class="badge badge-pill badge-primary">Admin</span></td>
                            @else
                            <td><span class="badge badge-pill badge-secondary">Member</span></td>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
@endsection