@extends('layouts.app')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Weh {{ $user->name }}, makan mana?</h1>
    </div>

    <div class="section-body">
        <h2 class="section-title">Jangan cakap kita orang tak ajak!</h2>
        <p class="section-lead">Kalau nak join makan, tekan la 'Jom' button tu.</p>
        @foreach ($invitationResponses as $invitationResponse)
            @if($invitationResponse->is_going)
                <div class="card card-success">
            @elseif(!$invitationResponse->is_going && $invitationResponse->response_at)
                <div class="card card-danger">
            @else
                <div class="card">
            @endif
                <div class="card-header">
                    @if($invitationResponse->is_going)
                        <span class="badge badge-success float-right">Ikut</span>
                    @elseif(!$invitationResponse->is_going && $invitationResponse->response_at)
                        <span class="badge badge-danger float-right">Tak Ikut</span>
                    @endif
                    &nbsp;<h4>{{ $invitationResponse->invitation->group->name }}</h4>
                </div>
                <div class="card-body">
                    <h3>{{ $invitationResponse->invitation->restaurant->name }}</h3>
                    <span class="badge badge-secondary">{{ $invitationResponse->invitation->appointment_at->locale('ms_MY')->isoFormat('hh:mm A | dddd, DD MMM') }}</span>
                    <hr></hr>
                    <p>
                        <h6>Siapa ikut?</h6>
                        @if(count($usersGoing = $invitationResponse->invitation->usersInvited->where('is_going', true)) > 0)
                            @foreach($usersGoing as $userGoing)
                                <span class="badge badge-light">{{ $userGoing->user->name }}</span>
                            @endforeach
                        @else
                            Tak ada orang join lagi ni bro. Come on!   
                        @endif
                    </p>
                    @if(count($usersNotGoing = $invitationResponse->invitation->usersInvited->where('is_going', false)->where('response_at', '!=',NULL)) > 0)
                        <p>
                            <h6>Tak nak ikut!</h6>
                            @foreach($usersNotGoing as $userNotGoing)
                                <span class="badge badge-light">{{ $userNotGoing->user->name }}</span>
                            @endforeach
                        </p>
                    @endif
                    @if(count($usersNotResponse = $invitationResponse->invitation->usersInvited->where('response_at', NULL)) > 0)
                        <p>
                            <h6>Dah ajak</h6>
                            @foreach($usersNotResponse as $userNotResponse)
                                <span class="badge badge-light">{{ $userNotResponse->user->name }}</span>
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
                @if(!$invitationResponse->response_at)
                    <div class="card-footer bg-whitesmoke">
                        <form action="{{ route('dashboard.invitation.response', $invitationResponse->invitation->id) }}" method="POST">
                            @csrf
                            <input type="hidden" name="user_id" value="{{ $user->id }}">
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