<div>
<?php 
include('includes/db.php');
 $total=0;
    
    global $con;
    $ip=getIp();
    $sel_price="select * from cart where ip_add='$ip'";
    $run_price=mysqli_query($con,$sel_price);
    while($p_price=mysqli_fetch_array($run_price)){
        $pro_id=$p_price['p_id'];
        //relation b/w two table
        $pro_price="select * from products where product_id='$pro_id'";
        
        $run_pro_price=mysqli_query($con,$pro_price);
        
        while($pp_price=mysqli_fetch_array($run_pro_price)){
            
            $product_price=array($pp_price['product_price']);

            $product_name=$pp_price['product_title'];
            
            $values=array_sum($product_price);
            
            $total +=$values;
        }
    }
 ?>


<h2 align="center">Pay now with paypal:</h2>
<div id="paypal-button"></div>
 <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
 	<input type="hidden" name="business" value="test_ranjan@shop.com">
 	<input type="hidden" name="cmd" value="_xclick">
 	<input type="hidden" name="item_name" value="<?php echo $product_name;?>">
 	<input type="hidden" name="amount" value="<?php echo $total;?>">
 	<input type="hidden" name="currency_code" value="INR">
<input type="hidden" name="return" value="paypal_success.php">
<input type="hidden" name="cancel_return" value="paypal_cancel.php">
 	<input type="image" name="submit" border="0" src="paypal_button.png" alt="PayPal - The safer, easier way to pay online" width="150px" height="50px">
 	<img src="https://www.paypalobjects.com/en_US/src/pixel.gif" alt="" border="0" width="1" height="1">
 	

 </form>     
</div>





<!-- <script src="https://www.paypalobjects.com/api/checkout.js"></script>
<script>
paypal.Button.render({
  env: 'sandbox',
  client: {
    sandbox: 'demo_sandbox_client_id'
  },
  payment: function (data, actions) {
    return actions.payment.create({
      transactions: [{
        amount: {
          total: '0.01',
          currency: 'USD'
        }
      }]
    });
  },
  onAuthorize: function (data, actions) {
    return actions.payment.execute()
      .then(function () {
        window.alert('Thank you for your purchase!');
      });
  }
}, '#paypal-button');
</script> -->