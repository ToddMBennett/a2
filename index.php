<?php require('calc.php'); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>A2 - Bill Splitter</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <script type="text/javascript" src="main.js"></script>
    <link rel="stylesheet" href="main.css"/>

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="container-fluid">
      <h1>Bill Splitter</h1>
      <form>
        <!-- <h3>Would you like to split or randomize someone to foot the bill?</h3>
        <input type="radio" id="split" name="splitOrFoot" /> Split the bill<br>
        <input type="radio" id="foot" name="splitOrFoot" /> Randomize a 'Footer'
      </form> -->

      <div id='billSplitter'>
        <form method='GET' action='index.php'>

          <!-- text input for number of paying customers -->
          <div class="formInput">
            <label for='howMany'>Split how many ways? </label>
            <input type='text' name='howMany' value='<?php if(isset($_GET['howMany'])) echo sanitize($_GET['howMany'])?>' required>
          </div>

          <!-- text input for total bill -->
          <div class="formInput">
            <label for='howMuch'>How much was the tab? $</label>
            <input type='text' name='howMuch' value='<?php if(isset($_GET['howMuch'])) echo sanitize($_GET['howMuch'])?>' required>
          </div>

          <!-- dropdown asking user for level of service -->
          <div class="formInput">
          <label for='service'>How was the service? </label>
        		<select name='service' id='service'>
              <option value='choose'>Choose one...</option>
              <option value='great' <?php if($service === 'great') echo 'SELECTED'?>>Great</option>
              <option value='good' <?php if($service === 'good') echo 'SELECTED'?>>Good</option>
              <option value='OK' <?php if($service === 'OK') echo 'SELECTED'?>>OK</option>
              <option value='not good' <?php if($service === 'not good') echo 'SELECTED'?>>Not good</option>
              <option value='horrible' <?php if($service === 'horrible') echo 'SELECTED'?>>Horrible</option>
            </select><br />
          </div>

          <!-- alert box if user doesn't select service -->
          <?php if($_GET): ?>
            <div class="alert <?=$alertType?>" role="alert">
              <?=$results?>
            </div>
          <?php endif; ?>

          <!-- radio button for rounding up or not -->
          <div class="formInput">
          <label>Would you like to round up? </label>
          <input type='radio' name='roundUp' value='yes' <?php if($roundUp === 'yes') echo 'CHECKED'?>> Yes
          <input type='radio' name='roundUp' value='no' <?php if($roundUp === 'no') echo 'CHECKED'?>> No<br />
          </div>

          <!-- checking for errors in text fields, ONLY numeric inputs -->
          <?php if(isset($errors)): ?>
            <div class='alert alert-danger'>
              <ul>
                <?php foreach($errors as $error): ?>
                  <li><?=$error?></li>
                <?php endforeach; ?>
              </ul>
            </div>
          <?php endif; ?>

          <input type='submit' class='btn btn-primary btn-lg' id="submit">

        </form>
    </div>
  </body>
</html>
