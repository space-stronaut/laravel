
<div class="card p-4">
    <form action="/agenda/update/{{ $agendas->id }}" method="POST">
        @csrf
        @method('put')
        <div class="form-group">
            <label>Nama Pegawai</label><br>
            <select name="workers[]" id="" style="width:100%;" multiple="multiple" class="form-control">
                @foreach ($agendas->workers as $worker)
                    <option selected value="{{ $worker->id }}" selected>{{ $worker->nama }}</option>
                @endforeach
                @foreach ($workers as $worker)
                    <option value="{{ $worker->id }}">{{ $worker->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="">Waktu</label>
            <input type="text" value="{{ $agendas->waktu }}" name="waktu" id="" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Agenda</label>
            <textarea name="agenda" id="" class="form-control" rows="10">{{ $agendas->agenda }}</textarea>
        </div>
        <div class="form-group">
            <label for="">Lokasi</label>
            <input type="text" name="lokasi" value="{{ $agendas->lokasi }}" id="" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
    <script>
        $('select').select2({
            placeholder: 'Pilih Provinsi',
            allowClear: true
        });
    </script>