<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Login - Garage Salary</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="{{ asset('css/sb-admin.css') }}" rel="stylesheet">
</head>

<body class="bg-dark">
    <div class="container">

        {{-- Untuk pesan error atau pesan pemberitahuan --}}
        @if ($msgType != '')
            <div class="alert alert-{{$msgType}} alert-dismissible fade show mt-4 text-center" role="alert">
                <strong>{{ucwords($msgType)}}</strong> {{$msgStr}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        @if(Request::segment(2) == 'NotLogin')
            <div class="alert alert-warning alert-dismissible fade show mt-4 text-center" role="alert">
                <strong>Peringatan</strong> Silahkan Login Terlebih dahulu
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        {{-- Form Login --}}
        <div class="card card-login mx-auto mt-5">
            <div class="card-header">Login</div>
            <div class="card-body">
                <form action="{{url('/Login')}}" method="POST">
                    <input type="hidden" name="_method" value="PUT">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <div class="form-label-group">
                            <input type="text" id="inputUsername" name="inputUsername" class="form-control" placeholder="User Name"
                                required="required" autofocus="autofocus">
                            <label for="inputUsername">User Name</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-label-group">
                            <input type="password" id="inputPassword" name="inputPassword" class="form-control" placeholder="Password"
                                required="required">
                            <label for="inputPassword">Password</label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Login</button>
                </form>
                <div class="text-center">
                    <a class="d-block small mt-3" href="{{url('/Register')}}">Buat akun disini</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>

</body>

</html>
