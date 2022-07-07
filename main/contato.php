<?php
include_once "./includes/view/_dados.php";
include_once "./includes/view/_head.php";
include_once "./includes/view/_header.php";


function sanitizeInputs() {
    // Enquanto não puder usar o exit, vamos de gambiarra;
    // TODO: FIX
    $expectedEntries = [ "name", "lastname", "phone", "email", "message" ];
    $entriesList = [];

    foreach ($expectedEntries as $key => $value) {
        if (isset($_POST[$value])) {
            array_push($entriesList, $_POST[$value]);
        } else {
            print("$value is mandatory <br>");
        }
    }

    $isAllEntriesPassed = count($expectedEntries) == count($entriesList);

    return [ $isAllEntriesPassed, $entriesList ];
}

list($entriesValidated, $entriesData) = sanitizeInputs();
if ($entriesValidated === 1) {
    list($name, $lastname, $phone, $email, $message) = $entriesData;
    print($name."<br>");
    print($lastname."<br>");
    print($phone."<br>");
    print($email."<br>");
    print($message."<br>");
}

?>

<div class="container m-5">
	<div class="row">
      <div class="col-md-6 col-md-offset-3">
        <div class="well well-sm">
          <form class="form-horizontal" action="./contato.php" method="post">
          <fieldset>
            <legend class="text-left">Entre em contato</legend>
    
            <div class="form-group">
              <label class="col-md-3 control-label" for="name">Nome</label>
              <div class="col-md-9">
                <input id="name" name="name" type="text" placeholder="Seu nome" class="form-control">
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-3 control-label" for="name">Sobrenome</label>
              <div class="col-md-9">
                <input id="lastname" name="lastname" type="text" placeholder="Seu sobrenome" class="form-control">
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-3 control-label" for="name">Telefone</label>
              <div class="col-md-9">
                <input id="phone" name="phone" type="text" placeholder="Seu telefone" class="form-control">
              </div>
            </div>
    
            <div class="form-group">
              <label class="col-md-3 control-label" for="email">Seu email</label>
              <div class="col-md-9">
                <input id="email" name="email" type="text" placeholder="Seu email" class="form-control">
              </div>
            </div>
    
            <div class="form-group">
              <label class="col-md-3 control-label" for="message">Mensagem</label>
              <div class="col-md-9">
                <textarea class="form-control" id="message" name="message" placeholder="Por favor digite sua mensagem aqui..." rows="5"></textarea>
              </div>
            </div>
    
            <div class="form-group">
              <div class="col-md-2 text-right">
                <button type="submit" class="btn btn-primary btn-lg">Submit</button>
              </div>
            </div>
          </fieldset>
          </form>
        </div>
      </div>
	</div>
</div>

<?php
// include do footer
include_once './includes/view/_footer.php';
?>