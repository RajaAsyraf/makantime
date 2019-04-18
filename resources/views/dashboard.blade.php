@extends('layouts.app')

@section('additionalLibrary')
<link rel="stylesheet" href="{{ asset('theme/modules/bootstrap-social/bootstrap-social.css') }}">
<link rel="stylesheet" href="{{ asset('theme/modules/owlcarousel2/dist/assets/owl.carousel.min.css') }}">
<link rel="stylesheet" href="{{ asset('theme/modules/owlcarousel2/dist/assets/owl.theme.default.min.css') }}">
@endsection

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Makan mana?</h1>
    </div>

    <div class="section-body">
        <h2 class="section-title">Jangan cakap kita orang tak ajak!</h2>
        <p class="section-lead">Kalau nak join makan, tekan la 'Jom' button tu.</p>
        <div class="card">
            <div class="card-header">
                <h4>BBNU</h4>
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
        <div class="card card-danger">
            <div class="card-header">
            <h4>Siapa Join?</h4>
            <div class="card-header-action">
                <a href="#" class="btn btn-danger btn-icon icon-right">Meh Tengok <i class="fas fa-chevron-right"></i></a>
            </div>
            </div>
            <div class="card-body">
            <div class="owl-carousel owl-theme" id="users-carousel">
                <div>
                <div class="user-item">
                    <img alt="image" src="{{ asset('theme/img/avatar/avatar-1.png') }}" class="img-fluid">
                    <div class="user-details">
                        <div class="user-name">Hafizzodin</div>
                        <div class="text-job text-muted">Seat belakang kiri</div>
                    </div>  
                </div>
                </div>
                <div>
                <div class="user-item">
                    <img alt="image" src="{{ asset('theme/img/avatar/avatar-2.png') }}" class="img-fluid">
                    <div class="user-details">
                    <div class="user-name">Aizuddin</div>
                    <div class="text-job text-muted">Seat depan kanan</div>
                    </div>  
                </div>
                </div>
                <div>
                <div class="user-item">
                    <img alt="image" src="{{ asset('theme/img/avatar/avatar-3.png') }}" class="img-fluid">
                    <div class="user-details">
                    <div class="user-name">Khairul</div>
                    <div class="text-job text-muted">Seat depan kiri</div>
                    </div>  
                </div>
                </div>
                <div>
                <div class="user-item">
                    <img alt="image" src="{{ asset('theme/img/avatar/avatar-4.png') }}" class="img-fluid">
                    <div class="user-details">
                    <div class="user-name">Asyraf</div>
                    <div class="text-job text-muted">Seat belakang kanan</div>
                    </div>  
                </div>
                </div>
                <div>
                <div class="user-item">
                    <img alt="image" src="{{ asset('theme/img/avatar/avatar-5.png') }}" class="img-fluid">
                    <div class="user-details">
                    <div class="user-name">Zul Azfar</div>
                    <div class="text-job text-muted">Seat belakang tengah</div>
                    </div>  
                </div>
                </div>
            </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('additionalScripts')
<!-- JS Libraies -->
<script src="{{ asset('theme/modules/owlcarousel2/dist/owl.carousel.min.js') }}"></script>
<!-- Page Specific JS File -->
<script src="{{ asset('theme/js/page/components-user.js') }}"></script>
@endsection
