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
            <h1 class="profile-username text-center"></h1>
        
    <div class="row mt-3">
        <div class="col-md-12">
            <div class="card">                
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                <th>No</th>
                                <th>Kode Output</th>
                                <th>Nama Output</th>
                                <th>Output</th>
                                <th>Rehab/Pembangunan</th>
                                
                            </tr>
    
                        @foreach ($data_kdoutput as $no => $paket)                      
                            <tr>
                                <td>{{$paket->id}}</td>
                                <td>{{$paket->kdoutput}}</td>
                                <td>{{$paket->nmoutput}}</td>
                                <td>{{$paket->nmabat}}</td>
                                <td>{{$paket->nmrehabbangun}}</td>
                                
                            </tr>
                            
                        @endforeach
                        </tbody>
                    </table> 
                    {{-- {{$data_paket->links()}} --}}
                </div>        
            </div>       
        </div>    
    </div>
</div>

@endsection
