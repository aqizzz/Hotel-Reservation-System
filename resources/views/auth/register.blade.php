@extends('layouts.main')
@section('title', 'Registration')
@section('content')
<div class="container">
  <div class="d-flex justify-content-center align-items-center" style="height: 60vh;">
    <div class="col-md-6">
      <center><h1>Registration</h1></center>
      <form class=" needs-validation" id="register-form" action="{{route('register.submit')}}"  method="POST">
      @csrf
        <div class="row mb-3 invalid-feedback">
            <span id="erroMessage"></span>
        </div><br><br>
        <div class="row mb-3">
          <div class=" form-outline" data-mdb-input-init>
            <!-- <span class="input-group-text" id="inputGroupPrepend">@</span> -->
            <input type="text" class="form-control" id="validationCustomUsername" name="name" required />
            <label for="validationCustomUsername" class="form-label">Username</label>
          </div>
        </div>
        <div class="row mb-3">
          <div class="form-outline" data-mdb-input-init>
            <input type="email" class="form-control" id="validationEmail" name="email" required />
            <label for="validationEmail" class="form-label">Email</label>
          </div>
        </div>

        <div class="row mb-3">
          <div class="form-outline" data-mdb-input-init>
            <input type="password" class="form-control" id="validationPassword" name="password" required />
            <label for="validationPassword" class="form-label">Password</label>
          </div>
        </div>

        <div class="row mb-3">
            <div class="form-outline" data-mdb-input-init>
              <input type="password" class="form-control" id="validationConfirmPw" name="password_confirmation" required />
              <label for="validationConfirmPw" class="form-label">Confirm Password</label>
            </div>
        </div>

        <div class="row mb-3">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required />
              <label class="form-check-label" for="invalidCheck">Agree to terms and conditions</label>
              <div class="invalid-feedback">You must agree before submitting.</div>
            </div>
        </div>
        <div class="d-flex justify-content-center align-items-center">
              <button class="btn btn-info" form="register-form" type="submit" data-mdb-ripple-init id="submitButton" disabled="true">Submit</button>
        </div>
      </form>
      <script>
        const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
        const usernameRegex = /^[a-z0-9_-]{5,15}$/;

        document.getElementById('invalidCheck').addEventListener('change', function() {
          var submitButton = document.getElementById('submitButton');
          submitButton.disabled = !this.checked;
        });

        document.getElementById("register-form").addEventListener("submit", function(event) {
          event.preventDefault();

          let username = document.getElementById("validationCustomUsername").value;
          let email = document.getElementById("validationEmail").value;
          let password = document.getElementById("validationPassword").value;
          let confirmPassword = document.getElementById("validationConfirmPw").value;
          let msgBoxReg = document.getElementById("erroMessage");
          msgBoxReg.innerText = "";
          let errorMessage = document.querySelector('.invalid-feedback');
          try {
            // if (username === ) throw "Username exists";
            // if (email ===  ) throw "Email address exists";
            if (password === username ) throw "Password can not be same as username";
            if (!usernameRegex.test(username) ) throw "Username must be between 5 and 15 characters long, containing only lowercase letters, numbers, underscores, and dashes";
            if (!passwordRegex.test(password) ) throw "Password must be minimum 8 characters, at least one uppercase letter, one lowercase letter, one number and one special character";
            if (confirmPassword !== password ) throw "Passwords must be same";
            errorMessage.style.display = 'none';
            this.submit();
          } catch (error) {
            msgBoxReg.innerText = error;
            errorMessage.style.display = 'block';
            return;
          }
        });
      </script>
    </div>
  </div>
</div>
@endsection