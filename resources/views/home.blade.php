@extends('layouts.master')

@section('content')
<div class="content">
    <div class="box box-primary">
        <div>
        <div class="box-body box-profile">
        <div class="row mt-3">
            <img class="profile-user-img img-responsive text-center" src="/img/logopu.jpg" alt="User profile picture">  
        </div>  
            <h1 class="profile-username text-center">Kementerian Pekerjaan Umum dan Perumahan Rakyat</h1>  
            <p class="text-muted text-center">Pusat Air Tanah dan Air Baku</p>
        </div>
            <div class="row mt-5">
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-map"></i></span>                
                        <div class="info-box-content">
                            <span class="info-box-text">
                                    Wilayah
                            </span>
                            <span class="info-box-number">                                        
                                <small>1. Wilayah Barat</a> </small><br/> 
                                <small><a href="/wilayah/2">2. Wilayah Timur</a></small>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-building"></i></span>                
                        <div class="info-box-content">
                            <span class="info-box-text">Jumlah Balai</a></span>
                            <span class="info-box-number">
                                        {{$balai->count()}}
                                        <small>balai</small>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-building"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Jumlah Satker</a></span>
                                <span class="info-box-number">{{$satker->count()}}<small>satker</small></span>
                            </div>
                        </div>
                    </div>
                {{-- <div class="clearfix hidden-md-up"></div> --}}
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Jumlah Paket</a></span>
                            <span class="info-box-number">{{$data_rekap->count()}}<small>paket</small></span>
                        </div>
                    </div>
                </div>
                {{-- <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>
        
                        <div class="info-box-content">
                            <span class="info-box-text">New Members</span>
                            <span class="info-box-number">2,000</span>
                        </div>
                    </div>
                </div> --}}
            </div>
            <div class="row">                
                <div class="col-lg-4 col-6">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h4><sup style="font-size: 20px">Rp</sup>{{number_format($data_rekap->sum('pagurmp'))}}</h4>                        
                            <p>Jumlah Pagu</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        
                    </div>
                </div>
                <div class="col-lg-4 col-6">
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h4><sup style="font-size: 20px">Rp</sup>{{number_format($data_rekap->sum('keuangan'),0)}}</h4>                        
                            <p>Progres Keuangan</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        
                    </div>
                </div>
                <div class="col-lg-2 col-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h4>{{number_format((($data_rekap->sum('keuangan')/$data_rekap->sum('pagurmp'))*100),2)}} %</h4> 
                            <p>Progres Keuangan</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>                        
                    </div>
                </div>
                <div class="col-lg-2 col-6">
                    <div class="small-box bg-primary">
                        <div class="inner">
                            <h4>{{number_format($data_rekap->avg('progres_fisik'),2)}} %</h4> 
                            <p>Progres Fisik</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
