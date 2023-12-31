<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <title>Document</title>
</head>
<body>
    <div class="login">
        <div class="form">
          <h2>Hello User</h2>
          <div class="form-field">
            <label for="login-mail"><i class="fa fa-user"></i></label>
            <input id="login-mail" type="text" name="mail" placeholder="E-Mail" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required>
            <svg>
              <use href="#svg-check" />
            </svg>
          </div>
          <div class="form-field">
            <label for="login-password"><i class="fa fa-lock"></i></label>
            <input id="login-password" type="password" name="password" placeholder="Password" pattern=".{6,}" required>
            <svg>
              <use href="#svg-check" />
            </svg>
          </div>
          <button type="submit" class="button">
            <div class="arrow-wrapper">
              <span class="arrow"></span>
            </div>
            <p class="button-text">SIGN IN</p>
          </button>
        </div>
        <div class="finished">
          <svg>
            <use href="#svg-check" />
          </svg>
        </div>
      </div>
      
      
      <!-- //--- ## SVG SYMBOLS ############# -->
      <svg style="display:none;">
        <symbol id="svg-check" viewBox="0 0 130.2 130.2">
          <polyline points="100.2,40.2 51.5,88.8 29.8,67.5 "/>
        </symbol>
      </svg>
</body>
</html>

