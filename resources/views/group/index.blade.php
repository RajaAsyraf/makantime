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
                <table class="table table-responsive table-striped w-100 d-block d-md-table">
                    <thead>
                        <tr>
                            <th scope="col">Group</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($groupUsers as $groupUser)
                        <tr>
                            <td>
                                <a href="{{ route('group.show', ['group' => $groupUser->group->id]) }}">{{ $groupUser->group->name }}</a>
                                @if($groupUser->is_admin)
                                    <span class="badge badge-pill badge-secondary float-right">Admin</span>
                                @endif
                                <br>
                                @if($numberOfMembers = count($groupUser->group->groupUsers) > 1)
                                    {{ count($groupUser->group->groupUsers) }} members 
                                @else
                                    1 member
                                @endif
                                <div class="bullet"></div> Created {{ $groupUser->group->created_at->diffForHumans() }}
                            </td>
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