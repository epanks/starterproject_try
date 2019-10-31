@extends('layouts.master')

@section('content')
<h1>Edit data paket</h1>
@if(session('sukses'))
    <div class="alert alert-success" role="alert">
        {{session('sukses')}}
    </div>
@endif
<div class="row mt-5">
    <div class="col-lg-12">
        <form action="/masalah/{{$masalah_paket->id}}/update"  method="POST">
            {{csrf_field()}}
            
            <div class="form-group">
                <label for="masalah">Note</label>
                <textarea name="masalah" id="masalah" class="form-control @error('masalah') is-invalid @enderror" rows="5">{{$masalah_paket->masalah}}
                </textarea>
                {!! $errors->first('masalah', '<span class="invalid-feedback">:message</span>') !!}
            </div>
            <div class="form-group">
                <label for="tindaklanjut">Tindak Lanjut</label>
                <textarea name="tindaklanjut" id="tindaklanjut" class="form-control @error('tindaklanjut') is-invalid @enderror" rows="5">{{$masalah_paket->tindaklanjut}}</textarea>
                {!! $errors->first('tindaklanjut', '<span class="invalid-feedback">:message</span>') !!}
            </div>
            <div class="form-group">
                <label for="keterangan">Keterangan</label>
                <textarea name="keterangan" id="keterangan" class="form-control @error('keterangan') is-invalid @enderror" rows="5">{{$masalah_paket->keterangan}}</textarea>
                {!! $errors->first('keterangan', '<span class="invalid-feedback">:message</span>') !!}
            </div>
            <div class="form-group">
                <label for="lampiran">Lampiran</label>
                <input name="lampiran" type="text" class="form-control" id="lampiran" value="{{$masalah_paket->lampiran}}">
            </div>
            
            <div class="modal-footer">                
                <button type="submit" class="btn btn-warning">Update</button>
            </div>
        </form> 
    </div>  
</div>

@endsection