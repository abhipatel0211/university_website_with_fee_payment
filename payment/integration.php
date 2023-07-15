<!-- FIRST ADD YOUR API KEY AND THAN  -->

<?php
// echo "inside the index php";
if(isset($_POST['submit']))
{
    // echo "inside the index php";
    $server = "localhost";
    $username = "root";
    $password = "";
    $con = mysqli_connect($server , $username , $password);
    if(!$con){
        die("connection to this database failed due to " . mysqli_connect_error());
    }
     //echo "success connecting to the db";
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobno = $_POST['mobno'];
    $address = $_POST['address'];
    $pincode = $_POST['pincode'];
    $amount = $_POST['amount'];
    $sql = "INSERT INTO `payment`.`payment` (`name`, `email`, `mobno`,`address`, `pincode`, `amount`) VALUES ('$name', '$email', '$mobno', '$address', '$pincode', '$amount');";
    // echo $sql;
    if($con->query($sql) == true){
        //echo "succesfully executed";
    }
    else
    {
        echo "ERROR : $sql <br> $con->error";
    }
    $con->close();
}
?>

<?php 
    $apikey = API_KEY;
?>

<form action="" method="POST">
<script
    src="https://checkout.razorpay.com/v1/checkout.js"
    data-key="<?php echo $apikey ?>" // Enter the Test API Key ID generated from Dashboard → Settings → API Keys
    data-amount="<?php echo $_POST['amount'] * 100?>" // Amount is in currency subunits. Hence, 29935 refers to 29935 paise or ₹299.35.
    data-currency="INR"// You can accept international payments by changing the currency code. Contact our Support Team to enable International for your account
    data-buttontext="Pay with Razorpay"
    data-name="Acme Corp"
    data-description="A Wild Sheep Chase is the third novel by Japanese author Haruki Murakami"
    data-image="https://example.com/your_logo.jpg"
    data-prefill.name="<?php echo $_POST['name']?>"
    data-prefill.email="<?php echo $_POST['email']?>"
    data-prefill.Contact="<?php echo $_POST['mobno']?>"
    data-theme.color="#F37254"
></script>
<input type="hidden" custom="Hidden Element" name="hidden">
</form>