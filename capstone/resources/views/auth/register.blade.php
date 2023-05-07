<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD"
      crossorigin="anonymous"
    />
    <script
      src="https://kit.fontawesome.com/3706d29d17.js"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="{{asset('frontend/assets/css/auth.css')}}" />
  </head>
  <body>
    <section class="container">
      <div class="row content d-flex justify-content-center">
        <div class="col-xl-5 col-12 mt-5">
          <div class="box shadow bg-white py-2 px-4">
            <h3 class="text-center fs-2">Unwind</h3>
            <h4 class="mb-5 text-center fs-5"><small>Register</small></h4>
            <form method="POST" action="{{ route('register') }}" class="mb-3 d-flex flex-wrap">
              @csrf
              <div class="form-floating pe-1 mb-3 col-12 col-lg-6">
                <input
                  type="text"
                  class="form-control rounded-0"
                  id="first_name"
                  name="first_name"
                  placeholder="Enter your name here"
                />
                <label for="first_name"
                  ><small class="text-muted">First name</small></label
                >
              </div>
              <div class="form-floating ps-1 mb-3 col-12 col-lg-6">
                <input
                  type="text"
                  class="form-control rounded-0"
                  id="last_name"
                  name="last_name"
                  placeholder="Enter your name here"
                />
                <label for="last_name"
                  ><small class="text-muted">Last name</small></label
                >
              </div>
              <div class="form-floating pe-1 mb-3 col-12 col-lg-6">
                <input
                  type="text"
                  class="form-control rounded-0"
                  id="username"
                  name="username"
                  placeholder="Enter your name here"
                />
                <label for="username"
                  ><small class="text-muted">Username</small></label
                >
              </div>
              <div class="form-floating ps-1 mb-3 col-12 col-lg-6">
                <input
                  type="number"
                  class="form-control rounded-0"
                  id="phone"
                  name="phone"
                  placeholder="Enter your name here"
                />
                <label for="phone"
                  ><small class="text-muted">Phone Number</small></label
                >
              </div>
              <div class="form-floating col-12 mb-3">
                <input
                  type="text"
                  class="form-control rounded-0"
                  id="email"
                  name="email"
                  placeholder="email"
                />
                <label for="email"
                  ><small class="text-muted">Email</small></label
                >
              </div>
              <div class="form-floating mb-3 pe-1 mb-3 col-12 col-lg-6">
                <input
                  type="password"
                  class="form-control rounded-0"
                  id="password"
                  name="password"
                  placeholder="password"
                />
                <label for="password"
                  ><small class="text-muted">Password</small></label
                >
              </div>
              <div class="form-floating mb-3 ps-1 mb-3 col-12 col-lg-6">
                <input
                  type="password"
                  class="form-control rounded-0"
                  id="password_confirmation"
                  name="password_confirmation" 
                  placeholder="confirmPassword"
                />
                <label for="password_confirmation"
                  ><small class="text-muted">Confirm Password</small>
                </label>
              </div>
              <div class="col-12">

              <div class="d-grid gap-2 mb-3">
                <button
                  type="submit"
                  class="btn btn-dark btn-lg border-0 rounded-0 fs-5"
                >
                  Register
                </button>
              </div>
              <div class="d-flex flex-row justify-content-between">
                <div class="fogot-password-link mb-3">
                  <a
                    href="{{route('login')}}"
                    title="Forgot Password"
                    class="text-link text-decoration-none ms-0"
                    ><small>Back to Login</small></a
                  >
                </div>
                <div class="fogot-password-link mb-3">
                  <a
                    href="{{ route('password.request') }}"
                    title="Forgot Password"
                    class="text-link text-decoration-none ms-0"
                    ><small>Forgot Password?</small></a
                  >
                </div>
              </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
