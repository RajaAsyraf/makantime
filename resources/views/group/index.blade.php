@extends('layouts.app')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Geng Makan</h1>
    </div>

    <div class="section-body">
        @if (count($groupMemberInvitations) > 0)
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-1">Group Invitation</h4>
                </div>
                <div class="card-body">
                    <div class="list-group">
                        @foreach ($groupMemberInvitations as $groupMemberInvitation)
                            <a href="{{ route('group.show', ['group' => $groupMemberInvitation->group->id]) }}" class="list-group-item list-group-item-action flex-column align-items-start">
                                <div class="d-flex w-100 justify-content-between">
                                    <h5 class="mb-1">{{ $groupMemberInvitation->group->name }}</h5>
                                    <small class="text-muted"></small>
                                </div>
                                <!-- <span class="badge badge-pill badge-secondary float-right">Admin</span> -->
                                <p class="mb-1">{{ count($groupMemberInvitation->group->users) }} active members</p>
                                <small class="text-muted">Group created {{ $groupMemberInvitation->group->created_at->diffForHumans() }}</small>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif
        <div class="card">
            @if (count($groups) > 0)
                <div class="card-body">
                    <div class="list-group">
                        @foreach ($groups as $group)
                            <a href="{{ route('group.show', ['group' => $group->id]) }}" class="list-group-item list-group-item-action flex-column align-items-start">
                                <div class="d-flex w-100 justify-content-between">
                                    <h5 class="mb-1">{{ $group->name }}</h5>
                                    <small class="text-muted"></small>
                                </div>
                                @if ($group->pivot->is_admin)
                                    <span class="badge badge-pill badge-secondary float-right">Admin</span>
                                @endif
                                <p class="mb-1">{{ count($group->users) }} active members</p>
                                <small class="text-muted">Group created {{ $group->created_at->diffForHumans() }}</small>
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