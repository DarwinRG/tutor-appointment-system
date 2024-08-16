<!-- resources/views/welcome.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>LessonLink</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <!--Font Awesome-->

  <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.2/css/all.css" />

  <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.2/css/sharp-thin.css" />

  <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.2/css/sharp-solid.css" />

  <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.2/css/sharp-regular.css" />

  <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.2/css/sharp-light.css" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>
  <style>
    .main-section {
      height: 100vh;
      color: black;
      display: flex;
      align-items: center;
      justify-content: center;
      text-align: center;
    }

    .about-section,
    .contact-section {
      padding: 50px 0;
      margin-top: 100px ;
      margin-bottom: 100px;
    }
    
    .about-title, .team-title {
      margin-bottom: 50px;
    }

    .team-members ul {

      list-style-type: none;
    }

    .team-members img {
      max-width: 200px;
      height: auto;
      border-radius: 50%;
    }

    #contact {
      border: 2px solid #a1a1a1;
    }

    footer {
      margin-top: auto;
    }
  </style>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #d1e8ff;">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">
        <img src="{{ asset('img/logo.png') }}" alt="logo text" class=" img-fluid" style="width: 35px">
        LessonLink
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#about">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#contact">Contact</a>
          </li>
        </ul>
        <ul class="navbar-nav">
          @if (Route::has('login'))
        @auth
      <li class="nav-item">
      <a class="nav-link" href="{{ route('view_page') }}">Dashboard</a>
      </li>
    @else
    <li class="nav-item">
    <a class="nav-link" href="{{ route('login') }}">Log in</a>
    </li>
    @if (Route::has('register'))
    <li class="nav-item">
    <a class="nav-link" href="{{ route('register') }}">Register</a>
    </li>
  @endif
  @endauth
      @endif
        </ul>
      </div>
    </div>
  </nav>
  <div class="main-section">
    <div class="text-center">
      <img src="{{ asset('img/logo.png') }}" alt="logo text" class=" img-fluid" style="width: 200px">
      <h1>Welcome to Lesson Link</h1>
      <p>Supporting Students , One Link At a Time.</p>
    </div>
  </div>
  <div class="text-center container about-section" id="about">
    <h2 class="about-title">ABOUT US</h2>
    <div class="container text-center">
      <div class="row row-cols-2">
        <div class="col">
          <h4> MISSION </h4>
          <p> Our Mission at Lesson Link is to provide quality educational support for students.</p>
        </div>
        <div class="col">
          <h4> VISION </h4>
          <p> Lesson Link aims to guide students in their educational journey.</p>
        </div>
        <div class="col">
          <h4> WE OFFER </h4>
          <ul class="list-group">
            <li class="list-group-item d-flex justify-content-between align-items-center">
              Tutors specializing in various subjects
              <span class="badge bg-dark rounded-pill"> </span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
              Online booking
              <span class="badge bg-dark rounded-pill"> </span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
              Flexible scheduling with partnered tutors
              <span class="badge bg-dark rounded-pill"> </span>
            <li class="list-group-item d-flex justify-content-between align-items-center">
              Cancel appointments anytime
              <span class="badge bg-dark rounded-pill"> </span>
            </li>
          </ul>
        </div>
        <div class="col">
          <h4> TEACHING STUDENTS FROM</h4>
          <ul class="list-group">
            <li class="list-group-item d-flex justify-content-between align-items-center">
              KINDERGARTEN
              <span class="badge bg-dark rounded-pill"> </span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
              ELEMENTARY
              <span class="badge bg-dark rounded-pill"> </span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
              HIGH-SCHOOL
              <span class="badge bg-dark rounded-pill"> </span>
            <li class="list-group-item d-flex justify-content-between align-items-center">
              COLLEGE
              <span class="badge bg-dark rounded-pill"> </span>
            </li>
          </ul>

        </div>
      </div>
    </div>
  </div>
  <div class="container text-center image-center team-members">
    <h2 class="team-title">TEAM MEMBERS </h2>
    <div class="container">
      <div class="row">
        <div class="col member">
          <img src="{{ asset('img/darwin.png') }}" />
          <p class="h5">Darwin Guillermo</p>
          <p class="h6">Scrum Master</p>
          <ul class="list-unstyled">
            <li class="d-inline"><a class="fa-brands fa-facebook fa-lg" href="https://web.facebook.com/YourCosmicGuy"></a>
            </li>
            <li class="d-inline"><a class="fa-brands fa-github fa-lg" href="#"></a></li>
            <li class="d-inline"><a class="fa-duotone fa-solid fa-globe fa-lg" href="#"></a></li>
          </ul>
        </div>
        <div class="col member">
          <img src="{{ asset('img/derek.png') }}" />
          <p class="h5">Derek Madronio</p>
          <p class="h6">Scrum Team</p>
          <ul class="list-unstyled">
            <li class="d-inline"><a class="fa-brands fa-facebook fa-lg" href="https://web.facebook.com/murphhi"></a></li>
            <li class="d-inline"><a class="fa-brands fa-github fa-lg" href="#"></a></li>
            <li class="d-inline"><a class="fa-duotone fa-solid fa-globe fa-lg" href="#"></a></li>
          </ul>
        </div>
        <div class="col member">
          <img src="{{ asset('img/mark.png') }}" />
          <p class="h5">Mark Clarence Olivar</p>
          <p class="h6">Scrum Team</p>
          <ul class="list-unstyled">
            <li class="d-inline"><a class="fa-brands fa-facebook fa-lg" href="https://web.facebook.com/Marikiannn"></a></li>
            <li class="d-inline"><a class="fa-brands fa-github fa-lg" href="#"></a></li>
            <li class="d-inline"><a class="fa-duotone fa-solid fa-globe fa-lg" href="#"></a></li>
          </ul>
        </div>
        <div class="col member">
          <img src="{{ asset('img/rich.png') }}" />
          <p class="h5">Rich Harry Tisel</p>
          <p class="h6">Scrum Team</p>
          <ul class="list-unstyled">
            <li class="d-inline"><a class="fa-brands fa-facebook fa-lg"
                href="https://web.facebook.com/profile.php?id=100018398522848"></a></li>
            <li class="d-inline"><a class="fa-brands fa-github fa-lg" href="https://github.com/SolWIND3"></a></li>
            <li class="d-inline"><a class="fa-duotone fa-solid fa-globe fa-lg" href="#"></a></li>
          </ul>
        </div>
        <div class="col member">
          <img src="{{ asset('img/ken.png') }}" />
          <p class="h5">Ken Charles Segundo</p>
          <p class="h6">Scrum Team</p>
          <ul class="list-unstyled">
            <li class="d-inline"><a class="fa-brands fa-facebook fa-lg" href="https://web.facebook.com/kleinnsama"></a></li>
            <li class="d-inline"><a class="fa-brands fa-github fa-lg" href="#"></a></li>
            <li class="d-inline"><a class="fa-duotone fa-solid fa-globe fa-lg"
                href="https://www.youtube.com/watch?v=5YVotus8ryk"></a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="container contact-section" id="contact">
      <h2>Contact Us</h2>
      @if (session('success'))
      <div class="alert alert-success">
      {{ session('success') }}
      </div>
    </div>
  @endif
    <form method="POST" action="{{ route('contact.submit') }}">
      @csrf
      <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" name="name" required>
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" required>
      </div>
      <div class="mb-3">
        <label for="message" class="form-label">Message</label>
        <textarea class="form-control" id="message" name="message" rows="4" required></textarea>
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
  <footer class="bg-light text-center text-lg-start mt-5">
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.05);">
      Made with <i class="fa-solid fa-heart fa-beat" style=""></i> by DarwinRG & Team
    </div>
  </footer>
</body>

</html>