@extends('layouts.app')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>{{ $group->name }}</h1>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-body">
                <div class="list-group">
                    @foreach($group->groupUsers as $groupUser)
                    <span class="list-group-item list-group-item-action flex-column align-items-start">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">{{ $groupUser->user->name }}</h5>
                            <small class="text-muted"></small>
                        </div>
                        @if($groupUser->is_admin)
                            <span class="badge badge-pill badge-secondary float-right">Admin</span>
                        @elseif($groupUser->user->id == Auth::user()->id)
                            <span class="badge badge-pill badge-success float-right">It's you</span>
                        @endif
                        <p class="mb-1">{{ $groupUser->user->email }}</p>
                        <small class="text-muted">Joined this group {{ $groupUser->updated_at->diffForHumans() }}</small>
                    </span>
                    @endforeach
                    @if($isGroupAdmin)
                        <a href="{{ route('group.invite', ['group' => $group->id]) }}" class="list-group-item list-group-item-action flex-column align-items-start">
                            <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">Invite People</h5>
                            <small class="text-muted"></small>
                            </div>
                            <span class="badge badge-pill badge-success float-right"><span class="fa fa-plus"></span>&nbsp;Invite people</span>
                            <p class="mb-1">This group has {{ count($group->groupUsers) }} active members.</p>
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@endsection