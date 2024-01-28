<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="{{ asset('') }}assets/" data-template="vertical-menu-template-free" >
    <head>
        <title>Naive Bayes - Login</title>
        @include('theme.style')
        <style>
            body{
                background: linear-gradient(rgba(62, 64, 219, 0.85), rgba(41, 26, 180, 0.85));
                width: 100%;
            }
            .cover-panel{
                height: 100vh;
                width: 100%;
            }
        </style>
    </head>
    <body>

        <div class="d-flex align-items-center justify-content-center cover-panel">
            <div class="col-lg-8 col-md-10 col-11">
                <div class="d-flex align-items-center bg-primary rounded overflow-hidden">
                    <div class="col-md-6 bg-white d-md-block d-none">
                        <div>
                            <img src="{{ asset('') }}assets/images/background.jfif" alt="login-picture" width="100%">
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <form action="" method="post" class="text-white m-3">
                            @csrf
                            <h2 class="text-white">Login</h2>
                            <hr>
                            <div class="form-group mb-2">
                                <label for="email"><strong>Email</strong></label>
                                <input name="email" type="text" class="form-control @error('email') is-invalid @enderror" placeholder="youremail@gmail.com" value="{{ old('email') }}">
                                @error('email') <small class="text-white"><em>{{ $message }}</em></small> @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="password"><strong>Password</strong></label>
                                <input name="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="your password here">
                                @error('password') <small class="text-white"><em>{{ $message }}</em></small> @enderror
                            </div>
                            <div class="form-group mb-2">
                                <button class="btn btn-dark">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @include('theme.script')
        @if(Session::has('errorLogin'))
            <script>
                iziToast.error({
                    title: 'Login gagal',
                    message: '{{ Session::get('errorLogin') }}',
                    position: 'topCenter',
                    overlay: true,
                })
            </script>
        @endif
        @if(Session::has('successLogin'))
            <script>
                iziToast.success({
                    title: '{{ Session::get('successLogin') }}',
                    position: 'topCenter',
                    overlay: true,
                })
            </script>
        @endif
    </body>
</html>