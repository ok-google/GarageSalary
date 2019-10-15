@extends('Layout.app')
@section('title-content', 'Change Password')
@section('content')
    <div class="card card-ChangePassword mx-auto mt-5">
        <div class="card-body">
            <form action="{{url('/ChangePassword')}}" method="POST">
                <input type="hidden" name="_method" value="PUT">
                {{ csrf_field() }}
                <div class="form-group">
                    <div class="form-label-group">
                        <input type="password" id="inputOldPassword" name="inputOldPassword" onkeyup="checkRegister()" class="form-control" placeholder="Old Password"
                            required="required" autofocus="autofocus">
                        <label for="inputOldPassword">Old Password</label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-label-group">
                        <input type="password" id="inputNewPassword" name="inputNewPassword" onkeyup="checkRegister()" class="form-control" placeholder="New Password"
                            required="required">
                        <label for="inputNewPassword">New Password</label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-label-group">
                        <input type="password" id="inputConfirmNewPassword" name="inputConfirmNewPassword" onkeyup="checkRegister()" class="form-control" placeholder="New Password"
                            required="required">
                        <label for="inputConfirmNewPassword">Confirm New Password</label>
                    </div>
                </div>
                
                <button type="submit" id="submit" name="submit" class="btn btn-primary btn-block">
                    <i id="icon" class="fas fa-user-plus"></i>
                    <span id="btnText">Save</span>
                </button>
                <!-- <button type="submit" class="btn btn-primary btn-block">Save</button> -->
                <a href="{{url('/')}}" class="btn btn-danger btn-block">Cancel</a>
            </form>
        </div>
    </div>
    
@endsection

@section('js')
    {{-- Rule Register --}}
    <script src="{{asset('js/ctm-rulePassword.js')}}"></script>
@endsection