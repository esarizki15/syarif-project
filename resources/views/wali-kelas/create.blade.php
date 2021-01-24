@extends('layouts.admin-lte.main')
@section('title')
    
@endsection
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
<li class="breadcrumb-item"><a href="{{ route('wali-kelas.index') }}">Wali Kelas</a></li>
<li class="breadcrumb-item active">Create</li>
@endsection
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-md-10">
        <div class="card">
            <div class="card-header">Wali Kelas</div>

            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <form method="POST" action="{{ route('wali-kelas.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col col-md-6 px-3">
                            <x-input globalAttribute="nip" :defaultValue="old('nip')" customAttribute="required" isStack="{{ true }}" />
                            
                            <x-input globalAttribute="nama" :defaultValue="old('nama')" customAttribute="required" label="Nama Wali Kelas" isStack="{{ true }}" />
                            
                            <x-input globalAttribute="tempat_lahir" label="Tempat Lahir" :defaultValue="old('tempat_lahir')" customAttribute="required" isStack="{{ true }}" />
                            
                            <x-input type="date" globalAttribute="tanggal_lahir" label="Tanggal Lahir" :defaultValue="old('tanggal_lahir')" customAttribute="required" isStack="{{ true }}" />
                            
                            <x-input globalAttribute="ttd" type="file" label="Tanda Tangan" :defaultValue="old('ttd')" isStack="{{ true }}" />

                            <div class="form-group row">
                                <div class="col">
                                    <img src="#" id="blah" onerror="this.style.display='none'" alt="Your Image" style="max-width: -webkit-fill-available;
                                    max-height: 200px;">
                                </div>
                            </div>
                        </div>
                        <div class="col col-md-6 px-3">
                            <x-select globalAttribute="jenis_kelamin" :isStack="true" label="Jenis Kelamin" customAttribute="required">
                                <option value="l" @if(old('jenis_kelamin') == 'l') selected @endif>L</option>
                                <option value="p" @if(old('jenis_kelamin') == 'p') selected @endif>P</option>
                            </x-select>

                            <x-select globalAttribute="kelas_id" label="Kelas" :isStack="true" customAttribute="required">
                                @foreach ($kelas as $data)
                                    <option value="{{ $data->id }}" @if(old('kelas_id') == $data->id) selected @endif>{{ $data->name }}</option>
                                @endforeach
                            </x-select>

                            <x-input globalAttribute="email" type="email" :defaultValue="old('email')" customAttribute="required" isStack="{{ true }}" />

                            <x-input globalAttribute="hp" :defaultValue="old('hp')" customAttribute="required" label="No. Handphone" isStack="{{ true }}" />

                            <x-input globalAttribute="jenjang_pendidikan" :defaultValue="old('jenjang_pendidikan')" customAttribute="required" label="Jenjang Pendidikan" isStack="{{ true }}" />

                            <div class="row">
                                <div class="col" style="text-align: right;">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Save') }}
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
      </div>
    </div>
</div>
@endsection
@section('script')
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function(e) {
            $('#blah').attr('src', e.target.result);
            $('#blah').show();
            }
            
            reader.readAsDataURL(input.files[0]); // convert to base64 string
        }
    }

$("#ttd").change(function() {
  readURL(this);
});
</script>
@endsection