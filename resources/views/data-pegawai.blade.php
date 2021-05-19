<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.theme.default.css') }}">
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>

    <title>Agenda BKAD</title>
  </head>
  <body>
      <style>
          html{
            scroll-behavior: smooth;
          }
          *{
              font-family: 'inter';
          }
          .jumbotron{
              height: 100vh;
              background-image: url({{url('img/jumbotron.jpg')}});
          }
          .sticky{
              background-color: #ffffff;
          }
          .btn-primary{
              padding: 8px 50px;
              width: 100px;
              background-color: #34c830;
              border: none
          }
          .btn-primary:hover{
              background-color: #439740;
          }
          .btn-primary:focus{
              background-color: #439740;
          }
          .car-img{
              height: 80vh;
              background-image: linear-gradient(#eb01a5, #d13531);
              width: 100%;
          }
          .nav-logo{
              max-width: 65%;
          }
          nav{
              z-index: 5;
          }
          td{
            font-size: 15px;
          }

      </style>
    
    {{-- navbar --}}
      <div class="container" style="padding-top: 80px" id="container">
        <div class="row justify-content-center pt-5" style="padding-top: 80px" data-aos="fade-up">

            <h3 style="border-bottom: 3px solid #34c830">Data Pegawai</h3>
            

        </div>
        
        <div class="row justify-content-between mt-5 content" style="overflow-x: auto">
            
            <table class="table table-striped table-border table-hover tab-reload" border="2">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col" >NIP</th>
                    <th scope="col" >Bidang</th>
                    <th scope="col">Jabatan</th>
                    <th scope="col">Golongan</th>
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
                  </tr>
                  @endforeach
                </tbody>
              </table>    

        </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{ asset('js/owl.carousel.js') }}"></script>
    <script src="//code.jquery.com/jquery.min.js"></script>
    <script src="{{ asset('js/autoscroll.js') }}"></script>
    <script src="{{ asset('js/autoscroll.min.js') }}"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.1.0.js"></script>
    <script>
            // setInterval(function(){
            //     location.reload();
            // },120000);

              let down = true;
              var interval = setInterval(() => {
                let scrollTop = window.scrollY;

                if (down) {
                  window.scrollTo(0, scrollTop + 10)
                } else {
                  window.scrollTo(0, scrollTop - 10)
                }

                var body = document.body;
                var html = document.documentElement;
                var bodyHeight = Math.max(body.scrollHeight, body.offsetHeight, html.clientHeight,html.scrollHeight, html.offsetHeight);

                if (window.scrollY == 0) {
                  down = true;
                }
                else if(window.scrollY + window.innerHeight >= bodyHeight){
                  down = false;
                }
              }, 70);
    </script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>