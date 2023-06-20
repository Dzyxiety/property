<?php
session_start();
if(!isset($_SESSION['sess'])){
  header("location: signup.php");
  }

  if(isset($_POST["submit"])){
  $server = mysqli_connect("localhost", "root", "", "db_project");

$pembeli = $_POST['pembeli'];
$nominal= $_POST['nominal'];
$norek= $_POST['norek'];
$properti = $_POST['property'];

$query = "INSERT INTO bukti  VALUES ('$pembeli', '$nominal', '$norek', '$properti' )" ;
$masuk = mysqli_query($server, $query) ; 
  
if($masuk){
  echo " <script> 
  alert('pembayaran berhasil')
  document.location.href = 'testi.php?norek=$norek' ;
  </script>" ;
}

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
</head>
<center>
<style>

    .modal {
  width: fit-content;
  height: fit-content;
  background: #FFFFFF;
  box-shadow: 0px 187px 75px rgba(0, 0, 0, 0.01), 0px 105px 63px rgba(0, 0, 0, 0.05), 0px 47px 47px rgba(0, 0, 0, 0.09), 0px 12px 26px rgba(0, 0, 0, 0.1), 0px 0px 0px rgba(0, 0, 0, 0.1);
  border-radius: 26px;
  max-width: 450px;
  margin-top: 100px;
}

.form {
  display: flex;
  flex-direction: column;
  gap: 20px;
  padding: 20px;
}

/* .payment--options {
  width: calc(100% - 40px);
  display: grid;
  grid-template-columns: 33% 34% 33%;
  gap: 20px;
  padding: 10px;
}

.payment--options button {
  height: 55px;
  background: #F2F2F2;
  border-radius: 11px;
  padding: 0;
  border: 0;
  outline: none;
}

.payment--options button svg {
  height: 18px;
}

.payment--options button:last-child svg {
  height: 22px;
} */

.separator {
  width: calc(100% - 20px);
  display: grid;
  grid-template-columns: 1fr 2fr 1fr;
  gap: 10px;
  color: #8B8E98;
  margin: 0 10px;
}

.separator > p {
  word-break: keep-all;
  display: block;
  text-align: center;
  font-weight: 600;
  font-size: 11px;
  margin: auto;
}

.separator .line {
  display: inline-block;
  width: 100%;
  height: 1px;
  border: 0;
  background-color: #e8e8e8;
  margin: auto;
}

.credit-card-info--form {
  display: flex;
  flex-direction: column;
  gap: 15px;
}

.input_container {
  width: 100%;
  height: fit-content;
  display: flex;
  flex-direction: column;
  gap: 5px;
}

.split {
  display: grid;
  grid-template-columns: 4fr 2fr;
  gap: 15px;
}

.split input {
  width: 100%;
}

.input_label {
  font-size: 10px;
  color: #8B8E98;
  font-weight: 600;
}

.input_field {
  width: auto;
  height: 40px;
  padding: 0 0 0 16px;
  border-radius: 9px;
  outline: none;
  background-color: #F2F2F2;
  border: 1px solid #e5e5e500;
  transition: all 0.3s cubic-bezier(0.15, 0.83, 0.66, 1);
}

.input_field:focus {
  border: 1px solid transparent;
  box-shadow: 0px 0px 0px 2px #242424;
  background-color: transparent;
}

.purchase--btn {
  height: 55px;
  background: #F2F2F2;
  border-radius: 11px;
  border: 0;
  outline: none;
  color: #ffffff;
  font-size: 13px;
  font-weight: 700;
  background: linear-gradient(180deg, #363636 0%, #1B1B1B 50%, #000000 100%);
  box-shadow: 0px 0px 0px 0px #FFFFFF, 0px 0px 0px 0px #000000;
  transition: all 0.3s cubic-bezier(0.15, 0.83, 0.66, 1);
}

.purchase--btn:hover {
  box-shadow: 0px 0px 0px 2px #FFFFFF, 0px 0px 0px 4px #0000003a;
}

/* Reset input number styles */
.input_field::-webkit-outer-spin-button,
.input_field::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}


</style>
<body>
<div class="modal">
<form class="form" action="#" method="post">
  <div class="payment--options">
  <h3 >payment</h3>


  </div>
  <div class="credit-card-info--form">
    
    <div class="input_container">
      <label for="password_field" class="input_label">Buyer Name</label>
      <input id="password_field" class="input_field" type="text" name="pembeli" title="Inpit title" placeholder="Enter your full name">
    </div>
    <div class="input_container">
      <label for="password_field" class="input_label">Nominal</label>
      <input id="password_field" class="input_field" type="number" name="nominal" title="Inpit title" placeholder="0000 0000 0000 0000">
    </div>
    <div class="input_container">
      <label for="password_field" class="input_label"> No Rek/ Property</label>
      <div class="split">
      <input id="password_field" class="input_field" type="number" name="norek" title="Expiry Date" placeholder="01/23">
      <input id="password_field" class="input_field" type="text" name="property" title="CVV" placeholder="CVV">
    </div>
    </div>
  </div>
    <button class="purchase--btn" name="submit" type="submit">Checkout</button>
</form>
</div>
    
</body>
</html>