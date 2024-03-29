<x-app title="login" >
    <section class="mt-5">
        <div class="container ">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
              <div class="card shadow-2-strong" style="border-radius: 1rem;">
                <div class="card-body p-5 text-center">
                    @if ($errors->any())
                    <x-alert type='danger'>
                        @foreach ($errors->all() as $error)
                        <strong style="color: red">{{ $error }}</strong>
                        @endforeach
                    </x-alert>
                    @endif
                    <form method="POST" action="{{ route('login.store') }}">
                        @csrf
                  <h3 class="mb-5">Sign in</h3>

                  <div class="form-outline mb-4">
                    <label class="form-label fs-5" for="typeEmailX-2">Email :</label>
                    <input type="email" id="typeEmailX-2" class="form-control form-control-lg" placeholder="votre Email" name="email" value="{{ old('email') }}"/>
                  </div>

                  <div class="form-outline mb-4">
                    <label class="form-label fs-5" for="typePasswordX-2">Password :</label>
                    <input type="password" id="typePasswordX-2" class="form-control form-control-lg" placeholder="Votre mot de pass" name="password"/>
                  </div>

                  <!-- Checkbox -->
                  <div class="form-check d-flex justify-content-start mb-2">
                    <input class="form-check-input" type="checkbox" value="" id="form1Example3" />
                    <label class="form-check-label" for="form1Example3"> Remember password </label>
                  </div>
                  <div class="d-flex justify-content-start mt-4">
                        <a href="{{ route('profile.create') }}">inscrivez-vous maintenant</a>
                        <button class="btn btn-primary btn-lg btn-block ms-5 w-75" type="submit">Login</button>
                  </div>

                    </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
</x-app>
