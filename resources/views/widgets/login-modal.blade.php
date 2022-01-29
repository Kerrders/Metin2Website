<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Login</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            @if (\Session::has('loginError'))
                @php
                    $loginErrors = \Session::get('loginError')
                @endphp
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    @if (is_array($loginErrors))
                        @foreach ($loginErrors as $error)
                            {{ $error }} <br>
                        @endforeach
                    @else
                        {{ $loginErrors }}
                    @endif
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="mb-3">
                  <input type="text" class="form-control" placeholder="Username" name="login">
                </div>
                <div class="mb-3">
                  <input type="password" class="form-control" placeholder="Password" name="password">
                </div>
                <div class="mb-3">
                    {!! ReCaptcha::htmlFormSnippet([
                        "theme" => "dark",
                    ]) !!}
                </div>
                <div class="d-grid col-6 mx-auto">
                    <input type="submit" name="submit" class="btn btn-primary" value="Login"/>
                 </div>
             </form>
        </div>
      </div>
    </div>
  </div>
@section('javascript')
    @if (\Session::has('loginError'))
        <script>
            let loginModal = new bootstrap.Modal(document.getElementById('loginModal'));
            loginModal.show();
        </script>
    @endif
@endsection
