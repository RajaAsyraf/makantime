@extends('layouts.app')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Geng Makan</h1>
    </div>

    <div class="section-body">
        <div class="card">
            @if(count($groupUsers) > 0)
            <div class="card-body">
                <div class="buttons">
                    <a href="{{ route('group.create') }}" class="btn btn-primary float-right">New Group</a>
                </div>
                <table class="table table-responsive table-hover w-100 d-block d-md-table">
                    <thead>
                        <tr>
                            <th scope="col">Group</th>
                            <th scope="col">Role</th>
                            <th scope="col">Member</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($groupUsers as $groupUser)
                        <tr>
                            <td><a href="{{ route('group.view', ['group' => $groupUser->group->id]) }}">{{ $groupUser->group->name }}</a></td>
                            @if($groupUser->is_admin)
                            <td><span class="badge badge-pill badge-primary">Admin</span></td>
                            @else
                            <td><span class="badge badge-pill badge-secondary">Member</span></td>
                            @endif
                            <td>{{ count($groupUser->group->groupUsers) }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @else
            <div class="card-body">
                <div class="buttons text-center">
                    <p>You don't belongs to any groups yet. Create a new group now and start inviting your friends!</p>
                    <a href="{{ route('group.create') }}" class="btn btn-primary">New Group</a>
                </div>
            </div>
            @endif
        </div>
    </div>
</section>                    
@endsection