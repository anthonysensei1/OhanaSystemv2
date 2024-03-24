<nav class="main-header navbar navbar-expand navbar-white navbar-light">
<!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <div class="nav-item dropdown btn-group profile-image ml-2">
            <a data-toggle="dropdown" href="#">
                <img src="{{ asset('/images/ohana.png') }}" class="rounded-circle" style="width: 40px; height: 40px;">
            </a>
            <div class="dropdown-menu dropdown-menu-right">
            @auth
                <form action="{{ route('user_logout') }}" class="dropdown-item">
                    @csrf
                    <button class="btn btn-light btn_out" type="submit" href="#"><i class="fas fa-sign-out-alt"></i> Logout</button>
                </form>
            @endauth
            </div>
        </div>
    </ul>
</nav>

<style scoped>
    .log_out:hover{
        background-color: #fff;
        color: #fff;
    }

    .btn_out:hover{
        background-color: #a50f15;
        color: #fff;
    }

    .btn_out{
        width: 100%;
    }
</style>