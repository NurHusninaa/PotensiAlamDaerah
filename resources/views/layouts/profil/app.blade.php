<!DOCTYPE html>
<html lang="en">
<head>
	@include('layouts.profil.header')
</head>
<body data-spy="scroll" data-target=".navbar" data-offset="40" id="home">
    @yield('headerContent')
    <nav class="navbar sticky-top navbar-expand-lg navbar-light" style="background-color: #BCBC38" data-spy="affix" data-offset-top="510">
        <div class="container">
            <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse mt-sm-20 navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a href="{{ route('beranda.index')  }}" class="nav-link text-white">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('profil.index') }}" class="nav-link text-white">Profil Kami</a>
                    </li>
                </ul>
                @yield('imageNav')
            </div>
        </div>
    </nav>
    @yield('contentBody')

    <footer class="footer py-3">
        <div class="container d-flex justify-content-center">
            <p class="small mb-0 text-light">
                &copy; <script>document.write(new Date().getFullYear())</script> Created With <i class="ti-heart text-danger"></i> By <a href="http://devcrud.com" target="_blank"><span class="text-danger" title="Bootstrap 4 Themes and Dashboards">DevCRUD</span></a> 
            </p>
        </div>
    </footer>
    @include('layouts.profil.javascript')
</body>
</html>
