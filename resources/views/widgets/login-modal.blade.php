<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Login</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="mb-3">
                  <input type="text" class="form-control" placeholder="Username" name="login">
                </div>
                <div class="mb-3">
                  <input type="password" class="form-control" placeholder="Password" name="password">
                </div>
                <div class="d-grid col-6 mx-auto">
                    <input type="submit" name="submit" class="btn btn-primary" value="Login"/>
                 </div>
             </form>
        </div>
      </div>
    </div>
  </div>