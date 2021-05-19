@extends('home')

@section('content')
<link rel="stylesheet" href="{{ asset('css/newstyle.css') }}">
<style>
     .preloader {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 9999;
        background-color: #fff;
    }
    .loading {
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translate(-50%,-50%);
        font: 14px arial;
    }
    
</style>
<div class="preloader">
    <div class="loading">
    <div class="spinner-grow text-success" style="width: 4rem; height:4rem;" role="status">
        <span class="sr-only">Loading...</span>
    </div>
    <div class="row mt-3">
      <strong>Harap Tunggu!</strong>
    </div>
    </div>
</div>


<div class="card p-4 h-50">
    <div class="table-responsive service">
      <table class="table table-fixed table-hover mb-0 css-serial" border="2">
        <thead class="thead-dark table-fixed">
          <tr>
            <th scope="col" class="atasbro">No</th>
            <th scope="col" class="atasbro">Nama</th>
            <th scope="col" class="atasbro">Tanggal Verifikasi</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($admins as $admin)
          <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $admin->name }}</td>
            <td>{{ $admin->email_verified_at }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
</div>

<script>
  $(document).ready(function() {
    $('.edit-btn').click(function () { 
      
      $('.edit-nama').val($(this).attr('data-name'));
      $('.edit-email').val($(this).attr('data-email'));
      $('.edit-pw').val($(this).attr('data-pw'));

    });
  });
</script>
@endsection