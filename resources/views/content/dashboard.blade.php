@extends('layouts.main')
@section('dashboard', 'active')
@section('content')
    <div class="container-fluid">
                    <div class="row">
                        @foreach ($count as $data)
                        <div class="col-xl-3 col-lg-3 col-sm-6 col-md-6">
                            <div class="info-box">
                                <span class="info-box-icon {{ $data['background'] }} elevation-1"><i class="{{ $data['icon'] }}"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">{{ $data['title'] }}</span>
                                    <span class="info-box-number">{{ $data['count'] }}</span>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    WELCOME
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
@endsection