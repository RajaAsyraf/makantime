@extends('layouts.app')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Suggest Restaurant</h1>
    </div>

    <div class="section-body">
        <h2 class="section-title">Prevent Redundancy</h2>
        <p class="section-lead">To avoid duplication of restaurants, make sure the restaurant you are about to suggest is not in the list yet.</p>
        <div class="card">
            <div class="card-body">
                <form action="{{ route('group.restaurant.store', ['group' => $group->id]) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Restaurant Name</label>
                        <div class="row">
                            <div class="col-8 col-md-11">
                                <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" required>
                                @if($errors->has('name'))
                                    <div class="invalid-feedback">{{ $errors->first('name') }}</div>
                                @endif
                            </div>
                            <div class="col-4 col-md-1">
                                <button type="submit" class="btn btn-primary">Add</button>
                            </div>
                        </div>
                    <div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection