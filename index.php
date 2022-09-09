<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="styles.css" />
    <style>
      @import url("https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap");
    </style>

    <title>Register</title>
  </head>
  <body>
    <?php include 'validate.php'; ?>
    
   

    <div class="wrapper">
      <h1 class="title">Welcome to my page</h1>

      <div class="decision">
        <button class="register" onclick="handleRegistration()">
          Sign up
        </button>
        <button class="login" onclick="handleLogin()">Login</button>
      </div>

      <div class="container-fluid">
        <!-- registration form -->
        <form action="validate.php"  method="post" class="row g-3 needs-validation regForm hidden" novalidate>
          <!-- Username input -->
          <div class="col-md-6">
            <label for="inputUsername" class="form-label">Username</label>
            <input
              type="username"
              name="inputUsername"
              value = "<?php echo htmlspecialchars($inputUsername, ENT_QUOTES); ?>"
              class="form-control"
              id="inputUsername"
              required
            />
            <div class="valid-feedback">
            
              Looks good!
            </div>
          </div>

          <!-- Password input -->
          <div class="col-md-6">
            <label for="inputPassword" class="form-label">Password</label>
            <input
              type="password"
              name="inputPassword"
              class="form-control"
              id="inputPassword"
              required
            />
            <div class="valid-feedback">
              Looks good!
            </div>
          </div>

          <!-- Language input -->
          <div class="col-md-6">
            <label for="inputLanguage" class="form-label">Language</label>
            <select id="inputLanguage" name="inputLanguage" class="form-select" required>
              <option selected disbaled value="">Choose...</option>
              <option value="english"  <?php if ($inputLanguage === "english") echo ' selected';?>>English</option>
              <option value="yoruba" <?php if ($inputLanguage  === "yoruba") echo ' selected';?>>Yoruba</option>
              <option value="igbo" <?php if ($inputLanguage === "igbo") echo ' selected';?>>Igbo</option>
              <option value="hausa" <?php if ($inputLanguage === "hausa") echo ' selected';?>>Hausa</option>
            </select>
            <div class="invalid-feedback">
              Please select a valid language.
            </div>
          </div>

          <!-- Color input -->
          <div class="col-md-6">
            <label for="inputColor" class="form-label">Color</label>
            <select id="inputColor" name="inputColor" class="form-select" required>
              <option selected disbaled value="">Choose...</option>
              <option value="green" <?php if ($inputColor === 'green') echo ' selected';?>>Green</option>
              <option value="red" <?php if ($inputColor === 'red') echo ' selected';?>>Red</option>
              <option value="black" <?php if ($inputColor === 'black') echo ' selected';?>>Black</option>
            </select>
            <div class="invalid-feedback">
              Please select a valid color.
            </div>
          </div>

          <!-- comment text area -->
          <div class="mb-3">
            <label for="commentTextarea" class="form-label">Comments</label>
            <textarea
              class="form-control"
              name = "commentTextarea"
              id="commentTextarea"
              rows="4"
              required
            ><?php echo htmlspecialchars($commentTextarea, ENT_QUOTES); ?></textarea>
          </div>

          <!-- accept terms and conditions -->
          <div class="col-12">
            <div class="form-check">
              <input
                class="form-check-input"
                type="checkbox"
                name="termsAndCondition"
                id="termsAndCondition"
                value="yes" 
                <?php if ($termsAndCondition === 'yes') echo ' checked';?>
                required
              />
              <label class="form-check-label" for="termsAndCondition">
                Agree to terms and conditions
              </label>
              <div class="invalid-feedback">
                You must agree before submitting.
              </div>
            </div>
          </div>
          <div class="col-12">
            <button  type="submit" name="submit"  value="submit" class="btn btn-primary">Register</button>
           </div>
         
        </form>
       

        <div class="gap"></div>
        <!-- login form -->
        <form action="login.php" method="post" class="row g-3 needs-validation logForm hidden" novalidate>
          <!-- Username input -->
          <div class="col-md-6">
            <label for="inputUsername" class="form-label">Username</label>
            <input
              type="username"
              class="form-control"
              name="inputUsername"
              id="inputUsername"
              required
            />
            <div class="valid-feedback">
              Looks good!
            </div>
          </div>

          <!-- Password input -->
          <div class="col-md-6">
            <label for="inputPassword" class="form-label">Password</label>
            <input
              type="password"
              class="form-control"
              name="inputPassword"
              id="inputUsername"
              required
            />
            <div class="valid-feedback">
              Looks good!
            </div>
          </div>

          <div class="col-12">
            <button type="submit" name="login" class="btn btn-primary">Login</button>
          </div>
        </form>
        <div class="gap"></div>
      </div>
     
    </div>
    <div class="decision">
    <?php if(isset($_GET['msg'])) {$message = "User exist"; echo $message; };?> 
</div>
<div class="decision">
    <?php if(isset($_GET['suc_msg'])) {$message = "Sign Up Successful"; echo $message;};?> 
</div>
<div class="decision">
    <?php if(isset($_GET['fail_msg'])) {$message = 'Registration failed!'. $sql_staffs . '<br />'. $db->error; echo $message; };?> 
</div>
<div class="decision">
    <?php if(isset($_GET['login_fail_msg'])) {$message = 'login failed!'. $query_info . '<br />'. $db->error; echo $message; };?> 
</div>
  <script src="reg.js"></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
