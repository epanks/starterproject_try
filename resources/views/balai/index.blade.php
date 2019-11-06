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
            <h1 class="profile-username text-center">{{{$wilayah->nmwilayah}}}</h1>
        </div>
            <div class="row mt-5">                
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-building"></i></span>                
                        <div class="info-box-content">
                            <span class="info-box-text"><a href="/balai">Balai</a></span>
                            <span class="info-box-number">
                                        {{$wilayah->balai->count()}}
                                        <small>balai</small>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-building"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text"><a href="/satker">Jumlah Satker</a></span>
                                <span class="info-box-number">{{$wilayah->satker->count()}}<small>satker</small></span>
                            </div>
                        </div>
                    </div>
                {{-- <div class="clearfix hidden-md-up"></div> --}}
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text"><a href="/paket">Jumlah Paket</a></span>
                            <span class="info-box-number">{{$data_rekap->count()}}<small>paket</small></span>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="row">                
                <div class="col-lg-4 col-6">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h4><sup style="font-size: 20px">Rp</sup>{{number_format($data_rekap->sum('pagurmp'))}}</h4>                        
                            <p>Jumlah Pagu</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-dollar-sign"></i>
                        </div>
                        
                    </div>
                </div>
                <div class="col-lg-4 col-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h4><sup style="font-size: 20px">Rp</sup>{{number_format($data_rekap->sum('keuangan'),2)}}</h4>                        
                            <p>Keuangan</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-dollar-sign"></i>
                        </div>
                        
                    </div>
                </div>
                <div class="col-lg-2 col-6">
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h4>{{number_format(($data_rekap->sum('keuangan')/$data_rekap->sum('pagurmp')*100),2)}}</h4>                        
                            <p>Progres Keuangan</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-chart-line"></i>
                        </div>
                        
                    </div>
                </div>
                <div class="col-lg-2 col-6">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h4>{{number_format($data_rekap->avg('progres_fisik'),2)}}</h4>                        
                            <p>Progres Fisik</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-chart-bar"></i>
                        </div>
                        
                    </div>
                </div>


            </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Daftar Balai</h3>
                </div>        
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover table-bordered">
                        <tbody>
                            <tr>
                                <th>No</th>
                                <th class="text-center">Nama Balai</th>
                                <th class="text-center">Pagu</th>
                                <th class="text-center">Keuangan</th>
                                <th class="text-center">Progres Keuangan</th>
                                <th class="text-center">Progres Fisik</th>
                            </tr>
    
                        @foreach ($wilayah->balai as $no => $balai)                      
                            <tr>
                                <td>{{++$no}}</td>
                                <td><a href="/balai/{{$balai->id}}">{{$balai->nmbalai}}</td>
                                
                                <td class="text-right">{{number_format($balai->paket->sum('pagurmp'))}}</td>
                                <td class="text-right">{{number_format($balai->paket->sum('keuangan'))}}</td>
                                <td class="text-right">{{number_format(($balai->paket->sum('keuangan')/$balai->paket->sum('pagurmp')*100),2)}}</td>
                                <td class="text-right">{{number_format($balai->paket->avg('progres_fisik'),2)}}</td>
                            </tr>
                            
                        @endforeach
                        </tbody>
                    </table>
                    {{-- {{$wilayahall->links()}} --}}
                </div>        
            </div>       
        </div>    
    </div>
</div>

@endsection
