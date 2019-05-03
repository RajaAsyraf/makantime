@extends('layouts.app')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Buat Geng Baru</h1>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('group.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Group Name</label>
                        <div class="row">
                            <div class="col-8 col-md-11">
                                <input type="text" class="form-control" name="name" required>
                            </div>
                            <div class="col-4 col-md-1">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    <div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection