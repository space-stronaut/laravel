@auth
@extends('layouts.app')

@section('content')
@auth
<div class="card p-4">
    <form action="/pegawai/update/{{ $worker->id }}" method="POST" >
        @csrf
        @method('put')
        <div class="mb-3">
          <input type="text" class="form-control" name="nama" value="{{ $worker->nama }}" placeholder="Nama Lengkap" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        @error('nama')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="mb-3">
          <input type="text" maxlength="21" name="nip" pattern="[0-9\-]+" class="form-control" placeholder="NIP" value="{{ $worker->nip }}" id="txtnumber">
        </div>
        @error('nip')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="mb-3">
            {{-- <input type="text" name="Nama" class="form-control" placeholder="Nama Lengkap" value="{{ old('Nama') }}" id="exampleInputPassword1"> --}}
            <select name="bidang" class="form-control" id="">
                <option disabled selected value>Pilih Bidang</option>
                <option value="Sekretariat" {{ $worker->bidang == 'Sekretariat' ? 'selected' : '' }}>Sekretariat</option>
                <option value="Pengelolaan Barang Milik Daerah" {{ $worker->bidang == 'Pengelolaan Barang Milik Daerah' ? 'selected' : '' }}>Pengelolaan Barang Milik Daerah</option>  
                <option value="Perbendaharaan" {{ $worker->bidang == 'Perbendaharaan' ? 'selected' : '' }}>Perbendaharaan</option>  
                <option value="Akuntansi dan pelaporan" {{ $worker->bidang == 'Akuntansi dan pelaporan' ? 'selected' : '' }}>Akuntansi dan pelaporan</option>  
                <option value="Anggaran" {{ $worker->bidang ==  "Anggaran"  ? 'selected' : '' }}>Anggaran</option>  
            </select>
          </div>
          @error('bidang')
              <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        <div class="mb-3">
          <input type="text" class="form-control" name="jabatan" placeholder="Jabatan" value="{{ $worker->jabatan }}" id="exampleCheck1">
        </div>
        @error('jabatan')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="mb-3">
            <label for="golongan"> 
                II B   
            </label>
            <input type="radio" name="golongan" value="II B" id="" placeholder="II B" {{$worker->golongan == 'II B'? 'checked' : ''}}>
            <label for="golongan"> 
                II C   
            </label>
            <input type="radio" name="golongan" value="II C" id="" placeholder="II C" {{$worker->golongan == 'II C'? 'checked' : ''}}>
            <label for="golongan">
                III A    
            </label>
            <input type="radio" name="golongan" value="III A" id="" placeholder="III A" {{$worker->golongan == 'III A'? 'checked' : ''}}>
            <label for="golongan">
                III B    
            </label>
            <input type="radio" name="golongan" value="III B" id="" placeholder="III B" {{$worker->golongan == 'III B'? 'checked' : ''}}>
            <label for="golongan">
                III C    
            </label>
            <input type="radio" name="golongan" value="III C" id="" placeholder="III C" {{$worker->golongan == 'III C'? 'checked' : ''}}>
            <label for="golongan">
                III D    
            </label>
            <input type="radio" name="golongan" value="III D" id="" placeholder="III D" {{$worker->golongan == 'III D'? 'checked' : ''}}>
            <label for="golongan">
                IV A    
            </label>
            <input type="radio" name="golongan" value="IV A" id="" placeholder="IV A" {{$worker->golongan == 'IV A'? 'checked' : ''}}>
            <label for="golongan">
                IV B    
            </label>
            <input type="radio" name="golongan" value="IV B" id="" placeholder="IV B" {{$worker->golongan == 'IV B'? 'checked' : ''}}>
            <label for="golongan">
                IV C
            </label>
            <input type="radio" name="golongan" value="IV C" id="" placeholder="IV C" {{$worker->golongan == 'IV C'? 'checked' : ''}}>
        </div>

        </div>
        @error('golongan')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ url('/pegawai') }}" class="btn btn-danger">Batal</a>
    </form>
</div>
@endauth
@endauth
@guest
    <?php 
        return abort(404);
    ?>
@endguest
@endsection