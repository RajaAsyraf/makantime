@extends('layouts.app')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Weh {{ $invitations[0]->user->name }}, makan mana?</h1>
    </div>

    <div class="section-body">
        <h2 class="section-title">Jangan cakap kita orang tak ajak!</h2>
        <p class="section-lead">Kalau nak join makan, tekan la 'Jom' button tu.</p>
        @foreach ($invitations as $invitation)
            <div class="card">
                <div class="card-header">
                    <h4>{{ $invitation->group->name }}</h4>
                </div>
                <div class="card-body">
                    <h3>{{ $invitation->restaurant->name }}</h3>
                    <span class="badge badge-secondary">Esok, 12:00 tengah hari</span>
                    @if($invitation->is_going)
                        <span class="badge badge-success float-right">Ikut</span>
                    @elseif(!$invitation->is_going && $invitation->response_at)
                        <span class="badge badge-danger float-right">Tak Ikut</span>
                    @endif
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
                @if(!$invitation->response_at)
                    <div class="card-footer bg-whitesmoke">
                        <form action="{{ route('dashboard.invitation.response', $invitation->id) }}" method="POST">
                            @csrf
                            <input type="hidden" name="token" value="{{ $invitation->token }}">
                            <input type="submit" class="btn btn-success" name="invitation_response" value="Jom">
                            <input type="submit" class="btn btn-danger" name="invitation_response" value="Tak Nak!">
                        </form>
                    </div>
                @endif
            </div>
        @endforeach
    </div>
</section>
@endsection