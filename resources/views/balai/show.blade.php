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
            <h1 class="profile-username text-center">{{{$balai->nmbalai}}}</h1>
        </div>
            <div class="row mt-5">                
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-building"></i></span>                
                        <div class="info-box-content">
                            <span class="info-box-text">Satker</a></span>
                            <span class="info-box-number">
                                        {{$satker->satker->count()}}
                                        <small>satker</small>
                            </span>
                        </div>
                    </div>
                </div>
                
                {{-- <div class="clearfix hidden-md-up"></div> --}}
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Jumlah Paket</a></span>
                            <span class="info-box-number">{{$balai->paket->count()}}<small>paket</small></span>
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
                            <h4><sup style="font-size: 20px">Rp</sup>{{number_format($balai->paket->sum('pagurmp'))}}</h4>                        
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
                            <h4><sup style="font-size: 20px">Rp</sup>{{number_format($balai->paket->sum('keuangan'))}}</h4>                        
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
    {{-- <div class="row mt-2">
        <div class="col-md-6">
            <h3>Pilih Kode Output</h3>
        <form action="{{route('balai.showoutput')}}" method="post"></form>
            {{csrf_field()}}
            <div class="col-3">
                <div class="checkbox">
                    <label for="">
                        <input type="checkbox" name="kdoutput[]" id="" value="001"> Perencanaan
                    </label>
                </div>
                <div class="checkbox">
                    <label for="">
                        <input type="checkbox" name="kdoutput[]" id="" value="002"> Air Tanah
                    </label>
                </div>
            </div>
            <div class="col-3">
                <div class="checkbox">
                    <label for="">
                        <input type="checkbox" name="kdoutput[]" id="" value="003"> Air Baku
                    </label>
                </div>
                <div class="checkbox">
                    <label for="">
                        <input type="checkbox" name="kdoutput[]" id="" value="951"> AP
                    </label>
                </div>
            </div>
            <button class="btn btn-info" type="submit"> OK</button>
        </div>    
    </div> --}}


    <div class="row mt-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Daftar Paket</h3>
                    <div class="form-group">
                            <select name="nmabat" id="nmabat" class="form-control input-lg dynamic" data-dependent="nmrehabbangun">
                             <option value="">Select Kode Output</option>
                             @foreach($tblkdoutput2 as $kdoutput)
                             <option value="{{ $kdoutput->nmabat}}">{{ $kdoutput->nmabat }}</option>
                             @endforeach
                            </select>
                           </div>
                           <br />
                           <div class="form-group">
                            <select name="nmrehabbangun" id="nmrehabbangun" class="form-control input-lg dynamic" data-dependent="nmoutput">
                             <option value="">Select Rehab/Pembangunan</option>
                            </select>
                           </div>
                           <br />
                           <div class="form-group">
                            <select name="nmoutput" id="nmoutput" class="form-control input-lg">
                             <option value="">Select Output</option>
                            </select>
                           </div>
                    <div class="card-tools">                            
                            <a href="/wilayah/{{ $wilayah->id }}" class="btn btn-primary" >Back</a>
                            <a href="/balai/{{ $balai->id }}/cetak_pdf" class="btn btn-primary" target="_blank">CETAK PDF</a>
                        <a href="/create_paket/{{ $balai->id }}" class="btn btn-success">
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
                                <th>Nama Paket</th>
                                <th>Pagu</th>
                                <th>Keuangan</th>
                                <th>Progres Keuangan</th>
                                <th>Rencana Fisik</th>
                                <th>Modify</th>
                                
                            </tr>
    
                        @foreach ($satker->paket as $no => $balai)      
                            <tr>
                                <td>{{++$no}}</td>
                                <td><a href="/paket/{{$balai->id}}">{{$balai->nmpaket}}</td>
                                <td class="text-right">{{number_format($balai->pagurmp)}}</td>
                                <td class="text-right">{{number_format($balai->keuangan)}}</td>
                                <td class="text-right">{{number_format((($balai->keuangan/$balai->pagurmp)*100),2)}}</td>
                                <td class="text-right">{{number_format(($balai->progres_fisik),2)}}</td>
                                <td>
                                    <a href="/paket/{{$balai->id}}/edit">
                                        <i class="fa fa-edit blue"></i>
                                    </a>
                                    {{-- /
                                    <a href="/paket/{{$balai->id}}/delete">
                                        <i class="fa fa-trash red" onclick="return confirm('Yakin data mau dihapus')"></i>
                                    </a> --}}
                                </td>
                            </tr>
                            
                        @endforeach
                        </tbody>
                    </table>
                    {{-- {{$satker->links()}} --}}
                </div>        
            </div>       
        </div>    
    </div>    
</div>

@endsection

@section('script')
<script>
    $(document).ready(function(){
    
     $('.dynamic').change(function(){
      if($(this).val() != '')
      {
       var select = $(this).attr("id");
       var value = $(this).val();
       var dependent = $(this).data('dependent');
       var _token = $('input[name="_token"]').val();
       $.ajax({
        url:"{{ route('balaicontroller.kdoutput') }}",
        method:"POST",
        data:{select:select, value:value, _token:_token, dependent:dependent},
        success:function(result)
        {
         $('#'+dependent).html(result);
        }
    
       })
      }
     });
    
     $('#abat').change(function(){
      $('#nmrehabbangun').val('');
      $('#nmoutput').val('');
     });
    
     $('#nmrehabbangun').change(function(){
      $('#nmoutput').val('');
     });
     
    
    });
    </script>
@endsection