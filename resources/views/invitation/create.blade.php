@extends('layouts.app')


@section('content')
<section class="section">
    <div class="section-header">
        <h1>Ajak kawan-kawan makan sekali baru afdhal.</h1>
    </div>

    <div class="section-body">
        <h2 class="section-title">Ajak makan untuk seminggu terus.</h2>
        <p class="section-lead">Jimat masa, masa itu TIME. TIME itu masa.</p>
            <div class="card">
                <create-invitation :submit-route="'{{ route('invitation.store') }}'" :groups="{{ $groups }}"></create-invitation>
            </div>
    </div>
</section>
@endsection