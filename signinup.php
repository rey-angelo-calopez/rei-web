<!DOCTYPE html>
<html>
<head>
  <head>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Console Shop</title>
    <link rel="icon" href="./assets/img/logo.png" type="image/png">


    <style>
      *{ scroll-behavior: smooth;}
    </style>
  </head>

  <style type="text/css">
    @import url('https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap');

* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins', sans-serif;
}

section {
  position: relative;
  min-height: 100vh;
  background-color: #19181A;
  display: flex;
  justify-content: center;
  align-items: center;
  padding: 20px;
}

section .container {
  position: relative;
  width: 800px;
  height: 500px;
  background: #fff;
  box-shadow: 0 15px 50px rgba(0, 0, 0, 0.1);
  overflow: hidden;
}

section .container .user {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  display: flex;
}

section .container .user .imgBx {
  position: relative;
  width: 50%;
  height: 100%;
  background: #ff0;
  transition: 0.5s;
}

section .container .user .imgBx img {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  object-fit: cover;
}

section .container .user .formBx {
  position: relative;
  width: 50%;
  height: 100%;
  background: #fff;
  display: flex;
  justify-content: center;
  align-items: center;
  padding: 40px;
  transition: 0.5s;
}

section .container .user .formBx form h2 {
  font-size: 18px;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: 2px;
  text-align: center;
  width: 100%;
  margin-bottom: 10px;
  color: #555;
}

section .container .user .formBx form input {
  position: relative;
  width: 100%;
  padding: 10px;
  background: #f5f5f5;
  color: #333;
  border: none;
  outline: none;
  box-shadow: none;
  margin: 8px 0;
  font-size: 14px;
  letter-spacing: 1px;
  font-weight: 300;
}

section .container .user .formBx form input[type='submit'] {
  max-width: 100px;
  background: #FF4500;
  color: #fff;
  cursor: pointer;
  font-size: 14px;
  font-weight: 500;
  letter-spacing: 1px;
  transition: 0.5s;
}

section .container .user .formBx form .signup {
  position: relative;
  margin-top: 20px;
  font-size: 12px;
  letter-spacing: 1px;
  color: #555;
  text-transform: uppercase;
  font-weight: 300;
}

section .container .user .formBx form .signup a {
  font-weight: 600;
  text-decoration: none;
  color: #FF4500;
}

section .container .signupBx {
  pointer-events: none;
}

section .container.active .signupBx {
  pointer-events: initial;
}

section .container .signupBx .formBx {
  left: 100%;
}

section .container.active .signupBx .formBx {
  left: 0;
}

section .container .signupBx .imgBx {
  left: -100%;
}

section .container.active .signupBx .imgBx {
  left: 0%;
}

section .container .signinBx .formBx {
  left: 0%;
}

section .container.active .signinBx .formBx {
  left: 100%;
}

section .container .signinBx .imgBx {
  left: 0%;
}

section .container.active .signinBx .imgBx {
  left: -100%;
}

@media (max-width: 991px) {
  section .container {
    max-width: 400px;
  }

  section .container .imgBx {
    display: none;
  }

  section .container .user .formBx {
    width: 100%;
  }
}

  </style>
</head>
<body>

  <section>
    <div class="container">
        <div class="user signinBx">
            <div class="imgBx">
                <img id="gameImage" src="" alt="Game Image" width="500">
            </div>
            <div class="formBx">
                <form id="signinForm" action="" method="POST" onsubmit="return false;">
                    <h2>Sign In</h2>
                    <input type="text" id="signinUsername" name="signinUsername" placeholder="Username" required />
                    <input type="password" id="signinPassword" name="signinPassword" placeholder="Password" required />
                    <input type="submit" value="Login" onclick="signIn()" />
                    <p class="signup">
                        Don't have an account? 
                        <a href="#" onclick="toggleForm();">Sign Up.</a>
                    </p>
                </form>
            </div>
        </div>

        <div class="user signupBx">
            <div class="formBx">
                <form id="signupForm" action="" method="POST" onsubmit="return false;">
                    <h2>Create an account</h2>
                    <input type="text" id="signupFullname" name="signupFullname" placeholder="Full name" required />
                    <input type="text" id="signupUsername" name="signupUsername" placeholder="Username" required />
                    <input type="email" id="signupEmail" name="signupEmail" placeholder="Email Address" required />
                    <input type="password" id="signupPassword" name="signupPassword" placeholder="Create Password" required />
                    <input type="submit" value="Sign Up" onclick="signUp()" />
                    <p class="signup">
                        Already have an account? 
                        <a href="#" onclick="toggleForm();">Sign in.</a>
                    </p>
                </form>
            </div>
            <div class="imgBx">
                <img id="gameImage2" src="" alt="Game Image" width="500">
            </div>
        </div>
    </div>
</section>
</body>

<script type="text/javascript">
function toggleForm() {
  var container = document.querySelector('.container');
  container.classList.toggle('active');
}

function signUp() {
  var username = document.getElementById('signupUsername').value.trim();
  var email = document.getElementById('signupEmail').value.trim();
  var password = document.getElementById('signupPassword').value.trim();
  var fullname = document.getElementById('signupFullname').value.trim();

  if (!username || !email || !password || !fullname) {
    alert('Please fill in all fields.');
    return;
  }

  if (!validateEmail(email)) {
    alert('Please enter a valid email address.');
    return;
  }

  var data = { username: username, email: email, password: password, fullname: fullname };

  var xhr = new XMLHttpRequest();
  xhr.open('POST', 'signup.php', true);
  xhr.setRequestHeader('Content-Type', 'application/json');

  xhr.onreadystatechange = function() {
    if (xhr.readyState === 4) {
      if (xhr.status === 200) {
        var response = JSON.parse(xhr.responseText);
        if (response.status === 'username_exists') {
          alert('Username or email already exists. Please choose another one.');
        } else if (response.status === 'success') {
          alert('Account created successfully! Please sign in.');
          toggleForm();
        } else {
          alert('Error creating account. Please try again.');
        }
      } else {
        alert('An error occurred while processing your request. Please try again later.');
      }
    }
  };

  xhr.send(JSON.stringify(data));
}

function validateEmail(email) {
  var regex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
  return regex.test(email);
}


function signIn() {
  var username = document.getElementById('signinUsername').value.trim();
  var password = document.getElementById('signinPassword').value.trim();

  console.log('Username:', username);
  console.log('Password:', password);

  if (!username || !password) {
    alert('Please enter both username and password.');
    return;
  }

  var data = { username: username, password: password };

  var xhr = new XMLHttpRequest();
  xhr.open('POST', 'signin.php', true);
  xhr.setRequestHeader('Content-Type', 'application/json');

  xhr.onreadystatechange = function() {
    if (xhr.readyState === 4) {
      if (xhr.status === 200) {
        var response = JSON.parse(xhr.responseText);
        if (response.status === 'success') {
          alert('Login successful!');
          window.location.href = 'userdashboard/';
        } else {
          alert(response.message || 'Invalid credentials. Please try again.');
        }
      } else {
        alert('An error occurred while processing your request. Please try again later.');
      }
    }
  };

  xhr.send(JSON.stringify(data));
}



var images = [
  "assets/img/game1.png", "assets/img/game4.jpg", "assets/img/game3.jpg", 
  "assets/img/game11.jpg", "assets/img/game5.jpg", "assets/img/game6.jpg", 
  "assets/img/game7.jpg", "assets/img/game8.jpg", "assets/img/game9.jpg", 
  "assets/img/game15.jpg"
];

var currentIndex = 0;

function changeImage() {
  var imgElement = document.getElementById("gameImage");
  imgElement.src = images[currentIndex];

  var imgElement2 = document.getElementById("gameImage2");
  imgElement2.src = images[currentIndex];

  currentIndex = (currentIndex + 1) % images.length;
}

setInterval(changeImage, 3000);
changeImage();

</script>

</html>