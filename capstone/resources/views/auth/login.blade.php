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
        <div class="col-md-5 col-sm-12 mt-5">
          <div class="box shadow bg-white py-2 px-4">
            <h3 class="mb-4 text-center fs-2">Unwind</h3>
            <form method="POST" action="{{ route('login') }}" class="mb-3">
                @csrf
              <div class="form-floating mb-3">
                <input
                  type="email"
                  class="form-control rounded-0"
                  name="email"
                  id="email"
                  placeholder="name@example.com"
                />
                <label for="email">Email</label>
                <x-input-error :messages="$errors->get('email')" class="mt-2 text-danger" />
              </div>
              <div class="form-floating mb-3">
                <input
                  type="password"
                  class="form-control rounded-0"
                  id="password"
                  name="password"
                  placeholder="password"
                />
                <label for="password">Password</label>
                <x-input-error :messages="$errors->get('password')" class="mt-2 text-danger" />
              </div>
              <div class="form-check mb-3">
                <input
                  class="form-check-input"
                  type="checkbox"
                  id="remember_me"
                  name="remember"
                />
                <label for="remember_me">Remember me</label>
              </div>
              <div class="d-grid gap-2 mb-3">
                <button
                  type="submit"
                  class="btn btn-dark btn-lg border-0 rounded-0"
                >
                  Login
                </button>
              </div>
              <div class="d-flex flex-row justify-content-between">
                <div class="fogot-password-link mb-3">
                  <a
                    href="{{ route('password.request') }}"
                    title="Forgot Password"
                    class="text-link text-decoration-none ms-0"
                    ><small>Forgot Password?</small></a
                  >
                </div>
                <div class="sign-up-account mb-3">
                  <a
                    href="{{route('register')}}"
                    title="Forgot Password"
                    class="text-link text-decoration-none"
                    ><small>Create an account</small></a
                  >
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
