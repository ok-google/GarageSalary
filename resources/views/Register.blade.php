<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Register - Garage Salary</title>

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

        {{-- Form Login --}}
        <div class="card card-login mx-auto mt-5" style="max-width:50rem">
            <div class="card-header">Register</div>
            <div class="card-body">
                <form action="{{url('/Register')}}" method="POST">
                    <div class="row">

                        {{-- User form --}}
                        <div class="col">
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
                                    <input type="password" id="inputPassword" name="inputPassword" onkeyup="checkRegister()" class="form-control" placeholder="Password"
                                        required="required">
                                    <label for="inputPassword">Password</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-label-group">
                                    <input type="password" id="inputConfirmPassword" name="inputConfirmPassword" onkeyup="checkRegister()" class="form-control" placeholder="Confirm Password"
                                        required="required">
                                    <label for="inputConfirmPassword">Confirm Password</label>
                                </div>
                            </div>
                        </div>

                        {{-- Pegawai Form --}}
                        <div class="col">
                            <div class="form-group">
                                <div class="form-label-group">
                                    <input type="text" id="inputNamaPegawai" name="inputNamaPegawai" class="form-control" placeholder="Nama"
                                        required="required" autofocus="autofocus">
                                    <label for="inputNamaPegawai">Nama</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-label-group">
                                    <input type="email" id="inputEmail" name="inputEmail" class="form-control" placeholder="inputEmail">
                                    <label for="inputEmail">Email</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-label-group">
                                    <input type="text" id="inputNoTelp" name="inputNoTelp" class="form-control" placeholder="inputNoTelp">
                                    <label for="inputNoTelp">No Telp</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" id="submit" name="submit" class="btn btn-primary btn-block">
                        <i id="icon" class="fas fa-user-plus"></i>
                        <span id="btnText">Register</span>
                    </button>
                </form>
                <div class="text-center mt-3 small">
                    Sudah punya akun? Login <a href="{{url('/Login')}}">disini</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    {{-- Rule Register --}}
    <script src="{{asset('js/ctm-ruleRegister.js')}}"></script>

</body>

</html>
