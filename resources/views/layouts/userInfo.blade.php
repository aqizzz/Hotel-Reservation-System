<div class="container">
  <form class="row g-3 needs-validation" id="register-form" action=>
    <div class="row mb-3">
      <div class="col-md-8 invalid-feedback">
      <span id="erroMessage"></span>
      </div>
    </div>
    <div class="row mb-3">
      <div class="col-md-8">
        <div class=" form-outline" data-mdb-input-init>
          <!-- <span class="input-group-text" id="inputGroupPrepend">@</span> -->
          <input type="text" class="form-control" id="validationCustomUsername" required />
          <label for="validationCustomUsername" class="form-label">Username</label>
          <div class="invalid-feedback" id="Er">Please choose a username.</div>
        </div>
      </div>
    </div>
    <div class="row mb-3">
      <div class="col-md-8">
        <div class="form-outline" data-mdb-input-init>
          <input type="email" class="form-control" id="validationEmail" required />
          <label for="validationEmail" class="form-label">Email</label>
          <div class="invalid-feedback">Please provide a valid email.</div>
        </div>
      </div>
    </div>
    <div class="row mb-3">
      <div class="col-md-8">
        <div class="form-outline" data-mdb-input-init>
          <input type="password" class="form-control" id="validationPassword" required />
          <label for="validationPassword" class="form-label">Password</label>
          <div class="invalid-feedback">Password must be minimum 8 characters, at least one uppercase letter, one lowercase letter, one number and one special character.</div>
        </div>
      </div>
    </div>

    <div class="row mb-3">
      <div class="col-md-8">
        <div class="form-outline" data-mdb-input-init>
          <input type="password" class="form-control" id="validationConfirmPw" required />
          <label for="validationConfirmPw" class="form-label">Confirm Password</label>
          <div class="invalid-feedback">Passwords must be same.</div>
        </div>
      </div>
    </div>

    <div class="row mb-3">
      <div class="col-12">
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required />
          <label class="form-check-label" for="invalidCheck">Agree to terms and conditions</label>
          <div class="invalid-feedback">You must agree before submitting.</div>
        </div>
      </div>
    </div>
    <div class="col-md-3">
    </div>
    <div class="col-md-2">
          <input class="btn btn-primary" form="register-form" type="submit" data-mdb-ripple-init id="submitButton" value="Submit" disabled="true">
    </div>
    <div class="col-md-3">
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
      
      let errorMessage = document.querySelector('.invalid-feedback');
      msgBoxReg.innerHTML = "";
      try {
        // if (username === "isabella123" || username === "john123" || username === "mary123") throw "Username exists";
        // if (email === "me@email.com" || email === "johnsmith@gmail.com" || email === "mary@brown.com" ) throw "Email address exists";
        if (password === username ) throw "Password can not be same as username";
        if (!usernameRegex.test(username) ) throw "Username must be between 5 and 15 characters long, containing only lowercase letters, numbers, underscores, and dashes";
        if (!passwordRegex.test(password) ) throw "Password must be minimum 8 characters, at least one uppercase letter, one lowercase letter, one number and one special character";
        if (confirmPassword !== password ) throw "Passwords must be same";
        errorMessage.style.display = 'none';
      } catch (error) {
        
        msgBoxReg.innerHTML = error;
        errorMessage.style.display = 'block';
      }
    });
  </script>
</div>