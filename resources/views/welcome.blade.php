<!-- resources/views/welcome.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Welcome</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
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
    }
  </style>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Tutor Appointment System</a>
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
            <a class="nav-link" href="#">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Contact</a>
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
    <div>
      <h1>Welcome to Tutor Appointment System</h1>
      <p>Your one-stop solution for booking appointments with tutors.</p>
    </div>
  </div>
  <div class="container about-section">
    <h2>About Our System</h2>
    <p>
      The Tutor Appointment System is designed to simplify the process of booking appointments with tutors.
      Our system offers a user-friendly interface, allowing students to easily find and book sessions with their
      preferred tutors.
    </p>
    <p>
      Key Features:
    <ul>
      <li>Easy appointment booking</li>
      <li>Real-time availability of tutors</li>
      <li>Automated reminders and notifications</li>
    </ul>
    </p>
    <p>
      Whether you need help with a specific subject or want to improve your overall academic performance, our system
      connects you with experienced tutors who can help you achieve your goals.
    </p>
  </div>
  <div class="container contact-section">
    <h2>Contact Us</h2>
    @if (session('success'))
      <div class="alert alert-success">
        {{ session('success') }}
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
      Made with <span style="color: red;">&hearts;</span> by DarwinRG & Team
    </div>
  </footer>
</body>
</html>