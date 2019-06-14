@extends('layouts.app')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Weh {{ Auth::user()->nickname }}, makan mana?</h1>
    </div>

    <div class="section-body">
        <h2 class="section-title">Jangan cakap kita orang tak ajak!</h2>
        <p class="section-lead">Kalau nak join makan, tekan la 'Jom' button tu.</p>
        @foreach ($invitations as $invitation)
            @if ($invitation->pivot->is_going)
                <div class="card card-success">
            @elseif (!$invitation->pivot->is_going && $invitation->pivot->response_at)
                <div class="card card-danger">
            @else
                <div class="card">
            @endif
                <div class="card-header">
                    @if ($invitation->pivot->is_going)
                        <span class="badge badge-success float-right">Ikut</span>
                    @elseif (!$invitation->pivot->is_going && $invitation->pivot->response_at)
                        <span class="badge badge-danger float-right">Tak Ikut</span>
                    @endif
                    &nbsp;<h4>{{ $invitation->group->name }}</h4>
                </div>
                <div class="card-body">
                    <h3>{{ $invitation->restaurant->name }}</h3>
                    <span class="badge badge-secondary">{{ $invitation->appointment_at->locale('ms_MY')->isoFormat('hh:mm A | dddd, DD MMM') }}</span>
                    <hr></hr>
                    <p>
                        <h6>Siapa ikut?</h6>
                        @if (count($usersGoing = $invitation->usersGoing()->get()) > 0)
                            @foreach ($usersGoing as $userGoing)
                                <span class="badge badge-light">{{ $userGoing->name }}</span>
                            @endforeach
                        @else
                            Tak ada orang join lagi ni bro. Come on!   
                        @endif
                    </p>
                    @if (count($usersNotGoing = $invitation->usersNotGoing()->get()) > 0)
                        <p>
                            <h6>Tak nak ikut!</h6>
                            @foreach ($usersNotGoing as $userNotGoing)
                                <span class="badge badge-light">{{ $userNotGoing->name }}</span>
                            @endforeach
                        </p>
                    @endif
                    @if (count($usersNotResponse = $invitation->usersNotResponse()->get()) > 0)
                        <p>
                            <h6>Dah ajak</h6>
                            @foreach ($usersNotResponse as $userNotResponse)
                                <span class="badge badge-light">{{ $userNotResponse->name }}</span>
                            @endforeach
                        </p>
                    @endif
                    <!-- <h6>Kereta kosong</h6>
                    <div class="buttons">
                        <button type="button" class="btn btn-primary btn-icon icon-left">
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
                    </div> -->
                </div>
                @if (!$invitation->pivot->response_at)
                    <div class="card-footer bg-whitesmoke">
                        <form action="{{ route('invitation.storeResponse', $invitation->id) }}" method="POST">
                            @csrf
                            <input type="submit" class="btn btn-success" name="invitation_answer" value="Jom">
                            <input type="submit" class="btn btn-danger" name="invitation_answer" value="Tak Nak!">
                        </form>
                    </div>
                @endif
            </div>
        @endforeach
    </div>
</section>
@endsection