{{-- This is the custom signup page --}}

<!doctype html>
<html lang="en">
  <head>
    <title>Auth</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
      @import url('https://fonts.googleapis.com/css2?family=Chivo+Mono:wght@500&display=swap');

    form {
    background-color: white;
    width: fit-content;
    height: fit-content;
    margin-left: 25%;
    padding: 2rem;
    border-radius: 6px;
  }

  .btn{
    display: grid;
    place-items: center;
  }
  .heading {
    margin-left: 33%;
    font-family: 'Chivo Mono', monospace;
    margin-top: 1%;
    color: azure;
    text-shadow: 0px 2px 2px #000000;
  }

  .animate__animated {
    animation-duration: 1s;
    animation-fill-mode: both;
  }


  .animate__fadeInUp {
    animation-name: fadeInUp;
  }

  @keyframes fadeInUp {
    from {
      opacity: 0;
      transform: translate3d(0, 100%, 0);
    }

    to {
      opacity: 1;
      transform: none;
    }
  }

  @keyframes fadeIn {
    0% {
      opacity: 0;
      transform: translateY(50px);
    }

    100% {
      opacity: 1;
      transform: translateY(0);
    }
  }

  footer {
    width: 100%;
  }
  .popup {
    animation-name: fadeIn;
    animation-duration: 1s;
    animation-delay: 0s;
    width: 24%;
    float: right;
    margin-top: 2.8%;
  }
  .password-input-container {
  position: relative;
}

.toggle-icon {
  position: absolute;
  top: 50%;
  right: 10px;
  transform: translateY(-50%);
  cursor: pointer;
}

    </style>
  </head>


  <body style="background-image: url('https://images.unsplash.com/photo-1614064641938-3bbee52942c7?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80')">
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
              <a class="nav-link" href="{{route('login')}}" style="color: black;">Login</a>
            </li>
          </ul>
        </div>
      </nav>
    </header>
    {{--Success pop-up--}}
 @if(Session::has('success'))
 <div class = "popup">
 <div class="alert alert-success">
     {{ Session::get('success') }}
     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
 </div>
 </div>
@endif
   
    <div class="heading animate__animated animate__fadeInUp">
      <h2 class="display-6">Signup to the Website!</h2>
    </div>

    <div class="form animate__animated animate__fadeInUp">
      <form class = "mb-4" action="{{ route('register') }}" method="post">
        @csrf
        <div class="form-group">
          <label for="email">Email address</label>
          <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="eg: valid_email@gmail.com" name="email">
          <span class="text-danger">
            @error('email')
            {{$message}}
            @enderror
        </span>
        </div>
        <div class="form-group">
          <label for="userName">Choose an User Name</label>
          <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Probably your name" name="username">
          <span class="text-danger">
            @error('username')
            {{$message}}
            @enderror
        </span>
        </div>

        <div class="form-group">
          <label for="password">Create Password</label>
          <div class="password-input-container">
            <input type="password" class="form-control" name="password">
            <span class="toggle-icon"><i class="fa fa-eye"></i></span>
          </div>
          <small id="password" class="form-text text-muted">Minimum 8 characters long, Will have at least one small letter, One capital letter and One special character</small>
          <span class="text-danger">
            @error('password')
            {{$message}}
            @enderror
          </span>
          
        </div>
        
        <div class="form-group">
          <label for="confirm_password">Re-type Password</label>
          <input type="password" class="form-control" name="password_confirmation">
          <span class="text-danger">
            @error('password_confirmation')
            {{$message}}
            @enderror
        </span>
        </div>
        <div class="mb-3 form-check">
          <input type="checkbox" class="form-check-input" id="exampleCheck1" name = "accept">
          <small class="form-text text-muted" for="exampleCheck1">Accept the Terms and Conditions</small>
        </div>
        <span class="text-danger">
          @error('accept')
          {{$message}}
          @enderror
      </span>
        <div class="btn">
          <button type="submit" class="btn btn-success">Create!</button>
        </div>
      </form>
    </div>

  {{-- Footer of the page  --}}
  <footer class="py-4 bg-light mt-auto">
    <div class="container-fluid px-4">
        <div class="d-flex align-items-center justify-content-center small">
            <div class="text-muted">Copyright &copy; project of Rohit Chaudhury on internship</div>
        </div>
    </footer>
</div>
  
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
  $(document).ready(function() {
  $('.toggle-icon').click(function() {
    const passwordInput = $(this).prev('input[type="password"]');
    passwordInput.attr('type', passwordInput.attr('type') === 'password' ? 'text' : 'password');
    $(this).find('i').toggleClass('fa-eye fa-eye-slash');
  });
});

  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>