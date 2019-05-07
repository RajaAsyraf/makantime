@extends('layouts.app')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>{{ $group->name }}</h1>
    </div>

    <div class="section-body">
        <h2 class="section-title">Add members</h2>
        <p class="section-lead">Email will be sent to recipient to response (Accept / Reject) the invitation to join this group.</p>
        <div class="card">
            <div class="card-body">
                <form action="{{ route('group.invite.store', ['group' => $group->id]) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Email</label>
                        <div class="row">
                            <div class="col-8 col-md-11">
                                <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" required>
                                @if($errors->has('email'))
                                    <div class="invalid-feedback">{{ $errors->first('email') }}</div>
                                @endif
                            </div>
                            <div class="col-4 col-md-1">
                                <button type="submit" class="btn btn-primary">Invite</button>
                            </div>
                        </div>
                    <div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection