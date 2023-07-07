<!doctype html>
<html lang="en">
  <head>
    <title>Registration</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <style>
        footer {
    position: absolute;
    bottom: 0;
    width: 100%;
  }
    </style>
  </head>

  <body>
    <body style="background-image: url('https://images.unsplash.com/photo-1614064641938-3bbee52942c7?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80');">
        <header>
          <nav class="navbar navbar-expand-lg" style="background-color:#BDFCC9;">
            <a class="navbar-brand" href="" style="color: black;">Auth</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="Collapse navbar-nav ml-auto">
              <ul class="navbar-nav">
                <li class="nav-item">
                  <a class="nav-link text-info" href="" style="color: black;">Create Account</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="" style="color: black;">Login</a>
                </li>
              </ul>
            </div>
          </nav>
        </header>

        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body text-center">
                            <h3 class="card-title">Auth Register</h3>
                            <hr>
                            <div class="mb-3">
                              <img src="data:image/png;base64,{{ $QR_Image }}" alt="QR Code" class="img-fluid">
                          </div>
                          <p>Scan the QR code using the Google Authenticator app to register.</p>
                          <p>Alternatively, You can use: <strong>{{ $secret }}</strong></p>
                        </div>
                        <div class = "mb-2"style="display:grid; place-items:center;">
                          <a href="{{ route('otp') }}" class="btn btn-primary btm-sm">Enter OTP</a>
                      </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Footer of the page  --}}
        <footer class="py-4 bg-light mt-auto">
            <div class="container-fluid px-4">
                <div class="d-flex align-items-center justify-content-center small">
                    <div class="text-muted">Copyright &copy; project of Rohit Chaudhury on internship</div>
                </div>
            </div>
        </footer>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
