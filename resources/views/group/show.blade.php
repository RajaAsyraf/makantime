@extends('layouts.app')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>{{ $group->name }}</h1>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>Group Members</h4>
            </div>
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
                            <span class="badge badge-pill badge-light float-right">It's you</span>
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
                            <span class="badge badge-pill badge-primary float-right"><span class="fa fa-plus"></span>&nbsp;Invite people</span>
                            <small class="text-muted">This group has {{ count($group->groupUsers) }} active members.</small>
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <h4>Suggested Restaurants</h4>
        </div>
        @if(count($restaurants = $group->restaurants) > 0)
        <div class="card-body">
            <div class="list-group">
                @foreach($restaurants as $restaurant)
                <span class="list-group-item list-group-item-action flex-column align-items-start">
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1">{{ $restaurant->name }}</h5>
                        <small class="text-muted"></small>
                    </div>
                    <small class="text-muted">Added to this group {{ $restaurant->created_at->diffForHumans() }} by {{ $restaurant->creator->name }}</small>
                </span>
                @endforeach
                <a href="{{ route('group.restaurant.create', ['group' => $group->id]) }}" class="list-group-item list-group-item-action flex-column align-items-start">
                    <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1">Suggest other restaurant</h5>
                    <small class="text-muted"></small>
                    </div>
                    <span class="badge badge-pill badge-primary float-right"><span class="fa fa-plus"></span>&nbsp;Add Restaurant</span>
                    <small class="text-muted">This group has {{ count($restaurants) }} suggested restaurants.</small>
                </a>
        </div>
    </div>
    @else
    <div class="card-body">
        <div class="buttons text-center">
            <p>You don't have any suggested restaurant. Suggets a restaurant now!</p>
            <a href="{{ route('group.restaurant.create', ['group' => $group->id]) }}" class="btn btn-primary">Add Restaurant</a>
        </div>
    </div>
    @endif
</section>
@endsection