
        <div class="card p-4">
            <form action="{{ url('/pegawai') }}" method="POST" class="needs-validator" novalidate>
                @csrf
                <div class="form-group">
                    <label for="">Nama Lengkap</label>
                  <input type="text" class="form-control" name="nama" value="{{ old('nama') }}" placeholder="Nama Lengkap" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                <div class="invalid-feedback">
                    Nama Wajib Diisi
                </div>
                </div>
                <div class="form-group">
                    <label for="">NIP</label>
                <input type="tel" maxlength="21"  id="txtnumber" name="nip" pattern="[0-9-]{21}" class="form-control" placeholder="NIP" value="{{ old('nip') }}" required>
                  <div class="invalid-feedback">
                    NIP Wajib Diisi Minimal Sebanyak 21 & Berisikan Angka
                </div>
                </div>
                <div class="form-group">
                    <label for="">Bidang</label>
                    {{-- <input type="text" name="Nama" class="form-control" placeholder="Nama Lengkap" value="{{ old('Nama') }}" id="exampleInputPassword1"> --}}
                    <select name="bidang" class="form-control" id="" required>
                        <option disabled selected value>Pilih Bidang</option>
                        <option value="Sekretariat" {{ old('bidang') ==  "Sekretariat"  ? 'selected' : '' }}>Sekretariat</option>
                        <option value="Pengelolaan Barang Milik Daerah" {{ old('bidang') ==  "Pengelolaan Barang Milik Daerah"  ? 'selected' : '' }}>Pengelolaan Barang Milik Daerah</option>  
                        <option value="Perbendaharaan" {{ old('bidang') ==  "Perbendaharaan"  ? 'selected' : '' }}>Perbendaharaan</option>  
                        <option value="Akuntansi dan pelaporan" {{ old('bidang') ==  "Akuntansi dan pelaporan"  ? 'selected' : '' }}>Akuntansi dan pelaporan</option>  
                        <option value="Anggaran" {{ old('bidang') ==  "Anggaran"  ? 'selected' : '' }}>Anggaran</option>  
                    </select>
                    <div class="invalid-feedback">
                        Bidang Wajib Diisi
                    </div>
                  </div>
                <div class="form-group">
                    <label for="">Jabatan</label>
                  <input type="text" class="form-control" name="jabatan" placeholder="Jabatan" value="{{ old('jabatan') }}" id="exampleCheck1" required>
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
                    <div class="invalid-feedback">
                        Golongan Wajib Diisi
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{ url('/pegawai') }}" class="btn btn-danger">Batal</a>
            </form>
        </div>

        <script>
            $(function () {
          
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
          })
        </script>