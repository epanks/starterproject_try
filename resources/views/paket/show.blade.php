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
            <h1 class="profile-username text-center">{{{$paket->nmpaket}}}</h1>
        </div>
            <div class="row mt-5">                
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-dollar-sign"></i></span>                
                        <div class="info-box-content">
                            <span class="info-box-text"><a href="/balai">Pagu</a></span>
                            <span class="info-box-number">
                                <small>Rp.</small>
                                        {{number_format($paket->pagurmp)}}
                            </span>
                        </div>
                    </div>
                </div>                
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-success elevation-1"><i class="fas fa-gas-pump"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text"><a href="/paket">Output</a></span>
                            <span class="info-box-number">{{$paket->trgoutput}}
                                    <small>{{$output->nmsatoutput}}</small>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-tint"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text"><a href="/paket">Outcome</a></span>
                            <span class="info-box-number">{{$paket->trgoutcome}}
                                    <small> {{$paket->satoutcome}}</small>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                    <div class="small-box bg-light">Penyerapan</div>
            </div>
            <div class="row">                
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <p>Keuangan</p>
                            <h3><small>Rp.</small> {{number_format(($paket->keuangan),2)}}</h3>                   
                        </div>
                        <div class="icon">
                            <i class="fas fa-dollar-sign"></i>
                        </div>                        
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <p>Progres Keuangan</p>
                            <h3>{{number_format((($paket->keuangan/$paket->pagurmp)*100),2)}}<sup style="font-size: 20px">%</sup>    </h3>                   
                        </div>
                        <div class="icon">
                            <i class="fas fa-chart-bar"></i>
                        </div>                        
                    </div>
                </div>                
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-primary">
                        <div class="inner">
                            <p>Progres Fisik</p>
                            <h3>{{number_format(($paket->progres_fisik),2)}}<sup style="font-size: 20px">%</sup></h3>                   
                        </div>
                        <div class="icon">
                            <i class="fas fa-chart-line"></i>
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
                    <h3 class="card-title">Note</h3>
                    <div class="card-tools">
                        <a href="/create/{{ $paket->id }}" class="btn btn-success">
                            Add New
                            <i class="fas fa-user-plus fa-fw"></i>
                        </a>
                    </div>
                </div>        
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                <th>No</th>
                                <th>Note</th>
                                <th>Tindak Lanjut</th>
                                <th>Keterangan</th>
                                <th>Modify</th>
                                
                            </tr>
    
                        @foreach ($paket->masalah as $no => $paket)                      
                            <tr>
                                <td>{{++$no}}</td>
                                <td>{{$paket->masalah}}</td>
                                <td>{{$paket->tindaklanjut}}</td>
                                <td>{{$paket->keterangan}}</td>
                                <td>
                                    <a href="/masalah/{{$paket->id}}/edit">
                                        <i class="fa fa-edit blue"></i>
                                    </a>
                                    /
                                    <a href="/masalah/{{$paket->id}}/delete">
                                        <i class="fa fa-trash red" onclick="return confirm('Yakin data mau dihapus')"></i>
                                    </a>
                                </td>
                                
                            </tr>
                            
                        @endforeach
                        </tbody>
                    </table> 
                    {{-- {{$paket->links()}} --}}
                </div>        
            </div>       
        </div>    
    </div>
</div>

@endsection
