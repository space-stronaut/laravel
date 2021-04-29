
@extends('home')

@section('content')


  <!-- Button trigger modal -->
<button type="button" class="btn btn-primary my-5" data-toggle="modal" data-target="#exampleModal">
  <i class="fas fa-plus"></i> Tambah Data
</button>
<button type="button" class="btn btn-success my-5" data-toggle="modal" data-target="#importExcel">
  <i class="fas fa-file-excel"></i> Import Excel
</button>

<!-- Import Excel -->
<div class="modal fade" id="importExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form method="post" action="/pegawai/import_excel" class="file-validation" enctype="multipart/form-data" novalidate>
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Import Excel</h5>
        </div>
        <div class="modal-body">

          {{ csrf_field() }}

          <label>Pilih file excel</label>
          <div class="form-group">
            <input type="file" name="file" class="form-control" required>
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-success">Import</button>
        </div>
      </div>
    </form>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Pegawai</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        @include('create')
      </div>
    </div>
  </div>
</div>

<a href="/pegawai/export_excel" class="btn btn-success my-3" target="_blank"><i class="fas fa-file-excel"></i> Export Excel</a>

@if($errors->has('file'))
    <span class="invalid-feedback" role="alert">
      <strong>a</strong>
    </span>
@endif

{{-- <form class="form-inline my-3 ml-auto" method="GET" action="/pegawai/cari">
  <select name="cari" id="" class="form-control">
    <option value="" selected disabled>Pilih Golongan</option>
    <option value="II A">II A</option>
    <option value="II B">II B</option>
    <option value="II C">II C</option>
    <option value="III A">III A</option>
    <option value="III B">III B</option>
    <option value="III C">III C</option>
    <option value="III D">III D</option>
    <option value="IV A">IV A</option>
    <option value="IV B">IV B</option>
    <option value="IV C">IV C</option>
  </select>
  <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
</form> --}}


@error('nip')
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Tambah Pegawai Gagal : </strong>{{ $message }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
@enderror
@error('file')
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Import File Gagal : </strong>{{ $message }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
@enderror
<table class="table table-striped table-border table-hover tab-reload" border="2">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Nama</th>
        <th scope="col" >NIP</th>
        <th scope="col" >Bidang</th>
        <th scope="col">Jabatan</th>
        <th scope="col">Golongan</th>
        @auth
        <th scope="col">Aksi</th>
        @endauth
      </tr>
    </thead>
    <tbody>
        @foreach ($workers as $worker)
      <tr>
        <th scope="row">{{ $loop->iteration }}</th>
        <td>{{ $worker->nama }}</td>
        <td>{{ $worker->nip }}</td>
        <td><b>{{ $worker->bidang }}</b></td>
        <td>{{ $worker->jabatan }}</td>
        <td>{{ $worker->golongan }}</td>
        @auth
        <td>
          <button type="button" class="btn btn-success" data-toggle="modal" data-target="#editModal{{ $worker->id }}">
            <i class="fas fa-pencil-alt"></i>
          </button>
          
          <!-- Modal -->
          <div class="modal fade" id="editModal{{ $worker->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Edit Pegawai</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <div class="card p-4">
                    <form action="/pegawai/update/{{ $worker->id }}" method="POST" class="needs-validator" novalidate>
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for="">Nama Lengkap</label>
                          <input type="text" class="form-control" name="nama" value="{{ $worker->nama }}" placeholder="Nama Lengkap" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                        <div class="invalid-feedback">
                            Nama Wajib Diisi
                        </div>
                        </div>
                        <div class="form-group">
                            <label for="">NIP</label>
                        <input type="tel" maxlength="21"  id="txtnumbers"  name="nip" minlength="21" pattern="[0-9-]{21}" class="form-control" placeholder="NIP" value="{{ $worker->nip }}" required>
                          <div class="invalid-feedback">
                            NIP Wajib Diisi Minimal Sebanyak 21 & Berisikan Angka
                        </div>
                        </div>
                        <div class="form-group">
                            <label for="">Bidang</label>
                            {{-- <input type="text" name="Nama" class="form-control" placeholder="Nama Lengkap" value="{{ old('Nama') }}" id="exampleInputPassword1"> --}}
                            <select name="bidang" class="form-control" id="" required>
                                <option disabled selected value>Pilih Bidang</option>
                                <option value="Sekretariat" {{ $worker->bidang ==  "Sekretariat"  ? 'selected' : '' }}>Sekretariat</option>
                                <option value="Pengelolaan Barang Milik Daerah" {{ $worker->bidang ==  "Pengelolaan Barang Milik Daerah"  ? 'selected' : '' }}>Pengelolaan Barang Milik Daerah</option>  
                                <option value="Perbendaharaan" {{ $worker->bidang ==  "Perbendaharaan"  ? 'selected' : '' }}>Perbendaharaan</option>  
                                <option value="Akuntansi dan pelaporan" {{ $worker->bidang ==  "Akuntansi dan pelaporan"  ? 'selected' : '' }}>Akuntansi dan pelaporan</option>  
                                <option value="Anggaran" {{ $worker->bidang ==  "Anggaran"  ? 'selected' : '' }}>Anggaran</option>  
                            </select>
                            <div class="invalid-feedback">
                                Bidang Wajib Diisi
                            </div>
                          </div>
                        <div class="form-group">
                            <label for="">Jabatan</label>
                          <input type="text" class="form-control" name="jabatan" placeholder="Jabatan" value="{{ $worker->jabatan }}" id="exampleCheck1" required>
                          <div class="invalid-feedback">
                            Jabatan Wajib Diisi
                        </div>
                        </div>
                        <div class="form-group">
                            <label for="golongan"> 
                                Golongan   
                            </label>
                            <select name="golongan" class="form-control" id="" required>
                                <option value="" disabled selected>Pilih Golongan</option>
                                <option value="II A" {{ $worker->golongan ==  "II A"  ? 'selected' : '' }}>II A</option>
                                <option value="II B" {{ $worker->gologan ==  "II B"  ? 'selected' : '' }}>II B</option>
                                <option value="II C" {{ $worker->golongan ==  "II C"  ? 'selected' : '' }}>II C</option>
                                <option value="III A" {{ $worker->golongan ==  "III A"  ? 'selected' : '' }}>III A</option>
                                <option value="III B" {{ $worker->golongan ==  "III B"  ? 'selected' : '' }}>III B</option>
                                <option value="III C" {{ $worker->golongan ==  "III C"  ? 'selected' : '' }}>III C</option>
                                <option value="III D" {{ $worker->golongan ==  "III D"  ? 'selected' : '' }}>III D</option>
                                <option value="IV A" {{ $worker->golongan ==  "IV A"  ? 'selected' : '' }}>IV A</option>
                                <option value="IV B" {{ $worker->golongan ==  "IV B"  ? 'selected' : '' }}>IV B</option>
                                <option value="IV C" {{ $worker->golongan ==  "IV C"  ? 'selected' : '' }}>IV C</option>
                            </select>
                            <div class="invalid-feedback">
                                Golongan Wajib Diisi
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Button trigger modal -->
<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#hapusModal{{ $worker->id }}">
  <i class="fas fa-trash"></i>
</button>

<!-- Modal -->
<div class="modal fade" id="hapusModal{{ $worker->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Hapus Pegawai</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Yakin Ingin Menghapusnya?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <a href="/pegawai/hapus/{{ $worker->id }}" class="btn btn-danger">Hapus</a>
      </div>
    </div>
  </div>
</div>
      </td>
        @endauth
      </tr>
      @endforeach
    </tbody>
  </table>    

  @if (count($errors) > 0)
      <script>
        $(document).ready(function () {
          $('#importExcel').modal('show');
        });
      </script>
  @endif

      <script>

        $(document).ready(function() {
      $('table').DataTable();
          
          $('#txtnumber').keydown(function (e) {
              var key = e.charCode || e.keyCode || 0;
              $text = $(this);
              if ( key !== 8 && key !== 15 && key !== 17) {
                  if ($text.val().length === 8) {
                      $text.val($text.val() + '-');
                  }
                  if ($text.val().length === 15) {
                      $text.val($text.val() + '-');
                  }
                  if ($text.val().length === 17) {
                      $text.val($text.val() + '-');
                  }
              }
              
          });
          $('#txtnumbers').keydown(function (e) {
              var key = e.charCode || e.keyCode || 0;
              $text = $(this);
              if ( key !== 8 && key !== 15 && key !== 17) {
                  if ($text.val().length === 8) {
                      $text.val($text.val() + '-');
                  }
                  if ($text.val().length === 15) {
                      $text.val($text.val() + '-');
                  }
                  if ($text.val().length === 17) {
                      $text.val($text.val() + '-');
                  }
              }
              
          });
          
    } );

    
    (function () {
                'use strict'

                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.querySelectorAll('.needs-validator')

                // Loop over them and prevent submission
                Array.prototype.slice.call(forms)
                    .forEach(function (form) {
                    form.addEventListener('submit', function (event) {
                        if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                        }

                        form.classList.add('was-validated')
                    }, false)
                    })
                })()

                (function () {
                'use strict'

                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.querySelectorAll('.file-validation')

                // Loop over them and prevent submission
                Array.prototype.slice.call(forms)
                    .forEach(function (form) {
                    form.addEventListener('submit', function (event) {
                        if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                        }

                        form.classList.add('was-validated')
                    }, false)
                    })
                })()


      </script>
@endsection