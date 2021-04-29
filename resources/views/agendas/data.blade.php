@extends('home')
@section('content')


  <!-- Button trigger modal -->

<button type="button" class="btn btn-primary my-5" data-toggle="modal" data-target="#exampleModal">
  + Tambah Agenda
</button>
<a href="/agenda/cetak_pdf" class="btn btn-danger my-3" target="_blank"><i class="fas fa-file-pdf"></i> Export Laporan PDF</a>

<!-- Modal -->
<div class="modal fade" id="exampleModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Agenda</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body p-4">
        @include('agendas.create')
      </div>
    </div>
  </div>
</div>


    <div class="row">
      <form class="form-inline my-3 ml-auto" method="GET" action="/agenda/cari">
        <input type="date" class="form-control" name="cari">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      
        <a href="{{ url('/agenda') }}" class="btn btn-danger mx-3">Reset</a>
      </form>
    </div>


<div style="overflow: auto;overflow-y: scroll" class="rounded table-responsive service">
  <table id="example" style="overflow: auto;height: 700px;" class="text-nowrap table table-striped table-border table-hover tab-reload" border="2">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Nama</th>
        <th scope="col" >Agenda</th>
        <th scope="col" >Lokasi</th>
        <th scope="col">Waktu</th>
        <th scope="col">Jam Berangkat</th>
        <th scope="col">Jam Kembali</th>
        <th scope="col">Aksi</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($agendas as $agenda)
      <tr>
        <td>
            <ul>
                @foreach ($agenda->workers as $worker)
                    <li>{{ $worker->nama }}</li>
                @endforeach
            </ul>
        </td>        
        <td>{{ $agenda->agenda }}</td>
        <td>{{ $agenda->lokasi }}</td>
        <td>{{ date('d M Y', strtotime($agenda->waktu)) }}</td>
        <td>{{ $agenda->mulai }}</td>
        <td>{{ $agenda->selesai }}</td>
        <td style="justify-content: space-evenly">
          <!-- Button trigger modal -->
<button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal{{ $agenda->id }}">
  <i class="fas fa-pencil-alt"></i>
</button>

<!-- Modal -->
<div class="modal fade" id="modal{{ $agenda->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Agenda</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="card p-4">
          <form action="/agenda/update/{{ $agenda->id }}" class="needs-validator" method="POST" novalidate>
              @csrf
              @method('put')
              <div class="form-group">
                  <label>Nama Pegawai</label><br>
                  <select name="workers[]" id="" style="width:100%;" multiple="multiple" class="form-control" required>
                      @foreach ($agenda->workers as $worker)
                          <option selected value="{{ $worker->id }}" selected>{{ $worker->nama }}</option>
                      @endforeach
                      @foreach ($workers as $worker)
                          <option value="{{ $worker->id }}">{{ $worker->nama }}</option>
                      @endforeach
                  </select>
              </div>
              <div class="form-group form-floating">
                <label for="">Waktu</label>
                <input type="date" autocomplete="off" name="waktu" id="date" value="{{ $agenda->waktu }}" class="form-control" required>
                <div class="invalid-feedback">
                    Waktu Wajib Diisi
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="">Jam Berangkat</label>
                    <input type="text" class="form-control timepick" name="mulai" value="{{ $agenda->mulai }}" id="" required>
                    <div class="invalid-feedback">
                        Jam Berangkat Wajib Diisi
                    </div>
                </div>
                <div class="col">
                    <label for="">Jam Kembali</label>
                    <input type="text" class="form-control timepick" name="selesai" id="" value="{{ $agenda->selesai }}" required>
                    <div class="invalid-feedback">
                        Jam Kembali Wajib Diisi
                    </div>
                </div>
            </div>
              <div class="form-group">
                  <label for="">Agenda</label>
                  <textarea name="agenda" id="" class="form-control" rows="10" required>{{ $agenda->agenda }}</textarea>
                  <div class="invalid-feedback">
                    Agenda Wajib Diisi
                  </div>
                </div>
              <div class="form-group">
                  <label for="">Lokasi</label>
                  <input type="text" name="lokasi" value="{{ $agenda->lokasi }}" id="" class="form-control" required>
                  <div class="invalid-feedback">
                    Lokasi Wajib Diisi
                  </div>
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
          </form>
      </div>
      </div>
    </div>
  </div>
</div>
          {{-- <a href="/agenda/hapus/{{ $agenda->id }}" class="btn btn-danger" title="Hapus" >Hapus</a> --}}
          <!-- Button trigger modal -->
          <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModalCenter{{ $agenda->id }}">
            <i class="fas fa-trash"></i>
          </button>

          <!-- Modal -->
          <div class="modal fade" id="exampleModalCenter{{ $agenda->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLongTitle">Hapus Agenda</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  Yakin Ingin Menghapusnya?
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <a href="/agenda/hapus/{{ $agenda->id }}" class="btn btn-danger">Hapus</a>
                </div>
              </div>
            </div>
          </div>
      </td>
      </tr>
      @endforeach
    </tbody>
  </table> 
</div>

  <script>
    $('form').DataTable();
</script>

  <script>

    $(document).ready(function() {
      $('table').DataTable();
  } );

  $(document).ready(function(){
        $('.timepick').timepicker({
    timeFormat: 'HH:mm',
    interval: 60,
    minTime: '12:00am',
    maxTime: '11:59pm',
    startTime: '10:00',
    dynamic: false,
    dropdown: true,
    scrollbar: true,
    zindex: 99999
});
    })
$('select').select2({
            placeholder: 'Pilih Nama',
            allowClear: true,
            theme: 'classic'
        });

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
  </script>
@endsection