            <form action="/agenda" method="POST" name="form" class="needs-validator" onsubmit="return validate()" novalidate>
                @csrf
                <div class="form-group">
                    <label>Nama Pegawai</label><br>
                    <select name="workers[]" id="" style="width:100%;" multiple="multiple" class="form-control form-floating" required>
                        @foreach ($workers as $worker)
                            <option value="{{ $worker->id }}" >{{ $worker->nama }}</option>
                        @endforeach
                    </select>
                    <div class="invalid-feedback">
                        Harap Pilih Pegawai
                    </div>
                </div>
                @error('workers')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group form-floating">
                    <label for="">Waktu</label>
                    <input type="date" id="datepicker" autocomplete="off" name="waktu" value="{{ old('waktu') }}" id="dateki" class="form-control" required>
                    <div class="invalid-feedback">
                        Waktu Wajib Diisi
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="">Jam Berangkat</label>
                        <input type="text" autocomplete="off" class="form-control timepicker" name="mulai" value="{{ old('mulai') }}" id="" required>
                        <div class="invalid-feedback">
                            Jam Berangkat Wajib Diisi
                        </div>
                    </div>
                    <div class="col">
                        <label for="">Jam Kembali</label>
                        <input type="text" autocomplete="off" class="form-control timepicker" name="selesai" value="{{ old('selesai') }}" id="" required>
                        <div class="invalid-feedback">
                            Jam Kembali Wajib Diisi
                        </div>
                    </div>
                </div>
                @error('waktu')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group form-floating">
                    <label for="">Agenda</label>
                    <textarea name="agenda" id="" class="form-control" rows="5" required>{{ old('agenda') }}</textarea>
                    <div class="invalid-feedback">
                        Agenda Wajib Diisi
                    </div>
                </div>
                @error('agenda')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label for="">Lokasi</label>
                    <input type="text" name="lokasi" value="{{ old('lokasi') }}" id="" class="form-control" required>
                    <div class="invalid-feedback">
                        Lokasi Wajib Diisi
                    </div>
                </div>
                @error('lokasi')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>

        <script>
        $('select').select2({
            placeholder: 'Pilih Nama',
            allowClear: true
        });


                $(document).ready(function(){
                    $('.timepicker').timepicker({
                timeFormat: 'HH:mm',
                interval: 60,
                minTime: '12:00am',
                maxTime: '11:59pm',
                startTime: '10:00',
                dynamic: false,
                dropdown: true,
                scrollbar: true,
                defaultTime: 'now',
                zindex: 99999
            });
                });
        </script>