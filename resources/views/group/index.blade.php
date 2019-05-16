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
                <div class="buttons text-right">
                    <a href="{{ route('group.create') }}" class="btn btn-primary">Create new group</a>
                </div>
                <div class="list-group">
                    @foreach($groupUsers as $groupUser)
                        <a href="{{ route('group.show', ['group' => $groupUser->group->id]) }}" class="list-group-item list-group-item-action flex-column align-items-start">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1">{{ $groupUser->group->name }}</h5>
                                <small class="text-muted"></small>
                            </div>
                            @if($groupUser->is_admin)
                                <span class="badge badge-pill badge-secondary float-right">Admin</span>
                            @endif
                            <p class="mb-1">{{ count($groupUser->group->groupUsers) }} active members</p>
                            <small class="text-muted">Group created {{ $groupUser->group->created_at->diffForHumans() }}</small>
                        </a>
                    @endforeach
                </div>
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