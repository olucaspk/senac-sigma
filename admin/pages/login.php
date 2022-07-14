<?php

session_start();

require_once "../../main/classes/Database.php";
$databaseClass = new Database();

include_once "../includes/view/_Head.php";

if (isset($_POST["username"]) && isset($_POST["password"])) {
  $username = $_POST["username"];
  $password = $_POST["password"];

  if (!empty($username) and !empty($password)) {
    handleLogin($username, $password);
  }

}

function handleLogin($username, $password) {
  // TODO: XSS, SQL Injection protect

  

  $username = filter_var($username, FILTER_SANITIZE_STRING);
  $password = filter_var($password, FILTER_SANITIZE_STRING);

  $userQuery = $GLOBALS["databaseClass"]->Query("SELECT * FROM users WHERE `username` = '{$username}'", []);
  if (!empty($userQuery)) {
    if (password_verify($password, $userQuery[0]["password"]) && $userQuery[0]["is_admin"]) {
      $_SESSION["LOGIN"] = [
        "userId" => $userQuery[0]["id"],
        "username" => $username
      ];

      header("location: ../index.php");
    }
  }
}

?>

<?php if (!isset($_SESSION["LOGIN"]) || empty($_SESSION["LOGIN"])) {?>
<section class="vh-100" style="background-color: #fafafa">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-xl-10">
        <div class="card" style="border-radius: 1rem">
          <div class="row g-0">
            <div class="col-md-6 col-lg-7 d-flex align-items-center">
              <div class="card-body p-4 p-lg-5 text-black">
                <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px">
                  Faça Log-In para acessar o painel
                </h5>

                <form action="login.php" method="post">
                  <div class="form-outline mb-4">
                    <label class="form-label" for="username">Usuário</label>
                    <input
                      type="text"
                      id="username"
                      name="username"
                      class="form-control form-control-lg"
                    />
                  </div>

                  <div class="form-outline mb-4">
                    <label class="form-label" for="password">Senha</label>
                    <input
                      type="password"
                      id="password"
                      name="password"
                      class="form-control form-control-lg"
                    />
                  </div>

                  <div class="pt-1 mb-4">
                    <input
                      class="login-button btn btn-lg btn-block"
                      type="submit"
                      value="Login"
                    />
                  </div>
                </form>

                <a class="small text-muted" href="#!">Forgot password?</a>
                <p class="mb-1 pb-lg-2" style="color: #393f81">
                  Don't have an account?
                  <a href="#!" style="color: #393f81">Register here</a>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php } ?> 