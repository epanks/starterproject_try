@extends('layouts.master')

@section('content')
@if(session('sukses'))
    <div class="alert alert-success" role="alert">
        {{session('sukses')}}
    </div>
@endif
<div class="row mt-5">
    <div class="col-md-6">
        <div class="card-header">
            <h3 class="card-title">Daftar Balai</h3>
        </div>
        <form action="/create_paket/{{ $dtsatker1->id }}"  method="POST">
            {{csrf_field()}}
            <div class="form-group{{$errors->has('kdsatker') ? 'has-error' : ''}}">
                <label for="kdsatker">Select Satker</label>
                <select name="kdsatker" id="kdsatker" class="form-control">
                    <option value="#">---Pilih Satker---</option>
                    @foreach ($dtsatker as $output)
                        <option value="{{$output->kdsatker}}">{{$output->nmsatker}}</option>                            
                    @endforeach
                </select>                
            </div>
            <div class="form-group">
                <label for="nmpaket">Nama Paket</label>
                <input name="nmpaket" type="text" class="form-control" id="nmpaket" placeholder="Nama Paket">
            </div>
            <div class="form-group">
                <label for="pagurmp">Pagu</label>
                <input name="pagurmp" type="number" class="form-control" id="pagurmp" placeholder="Pagu">
            </div>   
            <div class="form-group">
                <label for="trgoutput">Output</label>
                <input name="trgoutput" type="number" class="form-control" id="trgoutput" placeholder="Output">
            </div> 
            <div class="form-group">
                <label for="satoutput">Satuan Output</label>
                <select name="satoutput" id="satoutput" class="form-control">
                        <option value="#">---Pilih Satuan Output---</option>
                    @foreach ($dtsatoutput as $output)
                        <option value="{{$output->satoutput}}">{{$output->nmsatoutput}}</option>                            
                    @endforeach
                </select> 
            </div> 
            <div class="form-group">
                <label for="trgoutcome">Outcome</label>
                <input name="trgoutcome" type="number" class="form-control" id="trgoutcome" placeholder="Outcome">
            </div> 
            <div class="form-group">
                <label for="satoutcome">Satuan Outcome</label>
                <select name="satoutcome" id="satoutcome" class="form-control">                        
                    <option value="lt/dt">Liter/detik</option>
                    <option value="ha">Hektar</option>
                    <option value="apalagi">Apalagi ya</option>
                </select> 
            </div>
            <div class="form-group">
                <label for="kdoutput">Satuan Output</label>
                <select name="kdoutput" id="kdoutput" class="form-control">
                        <option value="#">---Pilih Kode Output---</option>
                    @foreach ($dtkdoutput as $output)
                        <option value="{{$output->kdoutput}}">{{$output->nmoutput}}</option>                            
                    @endforeach
                </select> 
            </div>
            <div class="form-group">
                <label for="TahunFisik">Tahun</label>
                <input name="TahunFisik" type="number" class="form-control" id="TahunFisik" placeholder="Tahun Anggaran">
            </div>
            {{-- <div class="form-group{{$errors->has('keuangan') ? 'has-error' : ''}}">
                <label for="keuangan">Penyerapan Keuangan</label>
                <input name="keuangan" type="number" class="form-control" id="keuangan" placeholder="Penyerapan Keuangan">
                @if($errors->has('keuangan'))
                    <span class="help-block">{{$errors->first('keuangan')}}</span>
                @endif
            </div>                      --}}
            <div class="form-group{{$errors->has('progres_keu') ? 'has-error' : ''}}">
                <label for="keuangan">Penyerapan Keuangan</label>
                <input name="keuangan" type="number" class="form-control" id="keuangan" placeholder="Progres Keuangan">
                @if($errors->has('keuangan'))
                    <span class="help-block">{{$errors->first('keuangan')}}</span>
                @endif
            </div>
            <div class="form-group{{$errors->has('progres_fisik') ? 'has-error' : ''}}">
                <label for="progres_fisik">Progres Fisik</label>
                <input name="progres_fisik" type="number" step="0.01" class="form-control" id="progres_fisik" placeholder="Progres Fisik">
                @if($errors->has('progres_fisik'))
                    <span class="help-block">{{$errors->first('progres_fisik')}}</span>
                @endif
            </div>    
            <div class="modal-footer">
                <button type="submit" class="btn btn-danger" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Create</button>
            </div>
        </form>
    </div>    
</div>

@endsection