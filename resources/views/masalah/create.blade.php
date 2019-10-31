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
        <form action="/create/{{ $dtmasalah->id }}"  method="POST">
            {{csrf_field()}}
            
            <div class="form-group">
                <label for="masalah">Note</label>
                <textarea name="masalah" id="masalah" class="form-control @error('masalah') is-invalid @enderror" rows="5">
                </textarea>
                {!! $errors->first('masalah', '<span class="invalid-feedback">:message</span>') !!}
            </div>
            <div class="form-group">
                <label for="tindaklanjut">Tindak Lanjut</label>
                <textarea name="tindaklanjut" id="tindaklanjut" class="form-control @error('tindaklanjut') is-invalid @enderror" rows="5"></textarea>
                {!! $errors->first('tindaklanjut', '<span class="invalid-feedback">:message</span>') !!}
            </div>
            <div class="form-group">
                <label for="keterangan">Keterangan</label>
                <textarea name="keterangan" id="keterangan" class="form-control @error('keterangan') is-invalid @enderror" rows="5"></textarea>
                {!! $errors->first('keterangan', '<span class="invalid-feedback">:message</span>') !!}
            </div>
            <div class="form-group">
                <label for="lampiran">Lampiran</label>
                <input name="lampiran" type="text" class="form-control" id="lampiran" placeholder="Lampiran">
            </div>
            
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Create</button>
            </div>
        </form>
    </div>    
</div>

@endsection