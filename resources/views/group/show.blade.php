@extends('layouts.app')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>{{ $group->name }}</h1>
    </div>
    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <div class="d-flex w-100 justify-content-between">
                    <h4 class="mb-1">Group Members&nbsp;<span class="badge badge-light">{{ count($users = $group->users) }}</span></h4>
                </div>
                @if ($isGroupAdmin)
                    <a href="{{ route('group.invite', ['group' => $group->id]) }}" class="btn btn-primary float-right"><span class="fa fa-plus"></span>&nbsp;Invite</a>
                @endif
            </div>
            <div class="card-body">
                <div class="list-group">
                    @foreach ($users as $user)
                        <span class="list-group-item list-group-item-action flex-column align-items-start">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1">{{ $user->name }}</h5>
                                <small class="text-muted"></small>
                            </div>
                            @if ($user->pivot->is_admin)
                                <span class="badge badge-pill badge-secondary float-right">Admin</span>
                            @elseif ($user->id == Auth::id() && Auth::user()->can('leave', $group))
                                <form action="{{ route('group.leave', ['group' => $group->id]) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-outline-danger float-right" name="leave" value="true">Leave</button>
                                </form>
                            @endif
                            <p class="mb-1">{{ $user->email }}</p>
                            <small class="text-muted">
                                @if ($user->id == Auth::id())
                                    <span class="badge badge-pill badge-light">It's you</span><div class="bullet"></div>
                                @endif
                                Joined this group {{ $user->pivot->updated_at->diffForHumans() }}
                            </small>
                        </span>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <div class="d-flex w-100 justify-content-between">
                <h4 class="mb-1">Suggested Restaurants&nbsp;<span class="badge badge-light">{{ count($restaurants = $group->restaurants) }}</span></h4>
            </div>
            <a href="{{ route('group.restaurant.create', ['group' => $group->id]) }}" class="btn btn-primary float-right"><span class="fa fa-plus"></span>&nbsp;Add Restaurant</a>
        </div>
        @if (count($restaurants) > 0)
            <div class="card-body">
                <div class="list-group">
                    @foreach ($restaurants as $restaurant)
                        <span class="list-group-item list-group-item-action flex-column align-items-start">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1">{{ $restaurant->name }}</h5>
                                <small class="text-muted"></small>
                                @if (Auth::user()->can('removeFromGroup', $restaurant) || $isGroupAdmin)
                                    <form action="{{ route('group.restaurant.remove', ['group' => $group->id, 'restaurant' => $restaurant->id]) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-outline-danger float-right" name="remove" value="true">Remove</button>
                                    </form>
                                @endif
                            </div>
                            <small class="text-muted">Added to this group {{ $restaurant->created_at->diffForHumans() }} by {{ $restaurant->creator->name }}</small>
                        </span>
                    @endforeach
                </div>
            </div>
        @else
            <div class="card-body">
                <div class="buttons text-center">
                    <p>This group doesn't have any suggested restaurant. Suggets a restaurant now!</p>
                    <a href="{{ route('group.restaurant.create', ['group' => $group->id]) }}" class="btn btn-primary">Add Restaurant</a>
                </div>
            </div>
        @endif
    </div>
</section>
@endsection