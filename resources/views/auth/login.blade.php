<x-guest-layout>
    <section class="vh-100">
        <div class="container py-5 h-100">
            <div class="row d-flex align-items-center justify-content-center h-100">
                <div class="col-md-8 col-lg-7 col-xl-6">
                    <img src="{{ asset('images/draw2.svg') }}" class="img-fluid" alt="Phone image">
                </div>
                <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
                    <h1 class="text-center">Sign In</h1>
                    @if ($errors->any())
                        <div class="alert alert-danger mt-3" role="alert">
                            {{ $errors->first() }}
                        </div>
                    @endif
                    <form action="{{ route('login') }}" method="POST" class="mt-3">
                        @csrf
                        <!-- Email input -->
                        <div data-mdb-input-init class="form-outline mb-4">
                            <label class="form-label" for="form1Example13">Email</label>
                            <input type="email" name="email" value="{{ old('email') }}" id="form1Example13"
                                class="form-control form-control-lg" required />
                        </div>

                        <!-- Password input -->
                        <div data-mdb-input-init class="form-outline mb-4">
                            <label class="form-label" for="form1Example23">Password</label>
                            <input type="password" name="password" id="form1Example23"
                                class="form-control form-control-lg" required />
                        </div>

                        <!-- Submit button -->
                        <button type="submit" name="login" data-mdb-button-init data-mdb-ripple-init
                            class="btn btn-primary btn-lg btn-block">Sign in</button>
                    </form>
                    <div>
                        <span>Don't have an account? </span>
                        <a href="index.php">Sign Up</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-guest-layout>
