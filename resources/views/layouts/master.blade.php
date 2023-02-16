<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap 5 Sidebar UI with Navbar Example</title>
    @include('partials.styles')
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    @include('partials.header')
</nav>
<div class="container-fluid">
    <div class="row flex-nowrap">
        @include('partials.sidebar')
        <div class="col ps-md-2 pt-2">
            <a href="#" data-bs-target="#sidebar" data-bs-toggle="collapse"
               class="border rounded-3 p-1 text-decoration-none"><i class="bi bi-list"></i></a>
            <hr>
            <div class="row">
                <div class="col-md-4">
                    <div class="card shadow">
                        <div class="card-body text-start">
                            <h5 class="card-title">All Users</h5>
                            <p class="card-text"><i class="bi bi-people mr-3"></i>600</p>
                            <a href="#" class="btn btn-primary">See Table</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card shadow">
                        <div class="card-body text-start">
                            <h5 class="card-title">All Blogs</h5>
                            <p class="card-text"><i class="bi bi-people mr-3"></i>70</p>
                            <a href="#" class="btn btn-primary">See Table</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card shadow">
                        <div class="card-body text-start">
                            <h5 class="card-title">Inbox message</h5>
                            <p class="card-text"><i class="bi bi-people mr-3"></i>100+</p>
                            <a href="#" class="btn btn-primary">See Table</a>
                        </div>
                    </div>
                </div>
            </div>

            @include('partials.flash-messages')
            @yield('content')
        </div>
    </div>
</div>

@include('partials.footer')
@include('partials.scripts')
</body>
</html>
