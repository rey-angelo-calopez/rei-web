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
  width: 400px;
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
  width: 100%;
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
            
            <div class="formBx">
                <form id="signinForm" action="" method="POST" onsubmit="return false;">
                    <h2>Administrator</h2>
                    <input type="text" id="signinUsername" name="signinUsername" placeholder="Username" required />
                    <input type="password" id="signinPassword" name="signinPassword" placeholder="Password" required />
                    <input type="submit" value="Login" onclick="signIn()"  style="float:right;" />
                    
                </form>
            </div>
        </div>

        
    </div>
</section>
</body>


<script type="text/javascript">

  const toggleForm = () => {
    const container = document.querySelector('.container');
    container.classList.toggle('active');
  };

  function signIn() {
    const username = document.getElementById('signinUsername').value;
    const password = document.getElementById('signinPassword').value;

    const xhr = new XMLHttpRequest();
    xhr.open('POST', 'admin_login.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    
    const data = 'username=' + encodeURIComponent(username) + '&password=' + encodeURIComponent(password);
    
    xhr.onload = function() {
      if (xhr.status === 200) {
        if (xhr.responseText === 'success') {
          alert('Login successful!');
          window.location.href = 'admindashboard/';
        } else {
          alert('Invalid credentials. Please try again.');
        }
      } else {
        alert('Error with the request. Please try again later.');
      }
    };

    xhr.send(data);
  }

</script>

</html>