@extends('layouts.master')

@section('content')
<div class="content">
    <select name="kdoutput" id="" class="form-control">
        <option selected disabled>---Select Kode Output---</option>
        @foreach ($tblkdoutput as $item)
            <option value="{{$item->kdoutput}}">{{$item->nmoutput}}</option>
        @endforeach
    </select>
    <select name="kdoutput" id="" class="form-control">
        <option selected disabled>---Select Kode Output---</option>
        @foreach ($tblabjiat as $item)
            <option value="{{$item->id}}">{{$item->nmabjiat}}</option>
        @endforeach
    </select>
    <select name="kdoutput" id="" class="form-control">
        <option selected disabled>---Select Kode Output---</option>
        @foreach ($tblabat as $item)
            <option value="{{$item->id}}">{{$item->nmabat}}</option>
        @endforeach
    </select>
    <select name="kdoutput" id="" class="form-control">
        <option selected disabled>---Select Kode Output---</option>
        @foreach ($tblrehabbangun as $item)
            <option value="{{$item->id}}">{{$item->nmrehabbangun}}</option>
        @endforeach
    </select>
</div>

@endsection
