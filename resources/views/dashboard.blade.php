@extends('layouts.app')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Weh {{ $invitation->user->name }}, makan mana?</h1>
    </div>

    <div class="section-body">
        <h2 class="section-title">Jangan cakap kita orang tak ajak!</h2>
        <p class="section-lead">Kalau nak join makan, tekan la 'Jom' button tu.</p>
        <div class="card">
            <div class="card-header">
                <h4>{{ $invitation->group->name }}</h4>
            </div>
            <div class="card-body">
                <h3>Warung Ambo</h3>
                <span class="badge badge-secondary">Esok, 12:00 tengah hari</span>
                <hr></hr>
                <h6>Kereta kosong</h6>
                <div class="buttons">
                    <button type="button" class="btn btn-primary btn-icon icon-left" disabled>
                        <i class="fas fa-car"></i> Myvi Din <span class="badge badge-transparent">0</span>
                    </button>
                    <button type="button" class="btn btn-primary btn-icon icon-left">
                        <i class="fas fa-car"></i> Myvi Khairul <span class="badge badge-transparent">2</span>
                    </button>
                    <button type="button" class="btn btn-primary btn-icon icon-left">
                        <i class="fas fa-car"></i> Persona Syahran <span class="badge badge-transparent">4</span>
                    </button>
                    <button type="button" class="btn btn-primary btn-icon icon-left">
                        <i class="fas fa-car"></i> Vios Rizaini <span class="badge badge-transparent">2</span>
                    </button>
                </div>
            </div>
            <div class="card-footer bg-whitesmoke">
                <button class="btn btn-success">Jom</button>
                <button class="btn btn-danger">Tak Nak!</button>
            </div>
        </div>
    </div>
</section>
@endsection