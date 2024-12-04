<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @include("layout.header")
    <body style="margin:100px;">
        <div style="place-items:center;">
            <br>
            <div class="col-md-6 col-md-offset-3">
                <h2 class="text-center">FORM REGISTER USER</h3>
                <hr>
                @if(session('message'))
                <div class="alert alert-success">
                    {{session('message')}}
                </div>
                @endif
                <form action="{{route('actionregister')}}" method="post">
                @csrf
                    <div class="form-group">
                        <label><i class="fa fa-user"></i> Nama</label>
                        <input type="text" name="nama" class="form-control" placeholder="Nama" required="">
                    </div>
                    <div class="form-group">
                        <label><i class="fa fa-envelope"></i> Email</label>
                        <input type="email" name="email" class="form-control" placeholder="Email" required="">
                    </div>
                    <div class="form-group">
                        <label><i class="fa fa-key"></i> Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Password" required="">
                    </div>
                    <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-user"></i> Register</button>
                    <hr>
                    <p class="text-center">Sudah punya akun silahkan <a href="#">Login Disini!</a></p>
                </form>
            </div>
        </div>
    </body>
</html>

<script>
    
</script>
