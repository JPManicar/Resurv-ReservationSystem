<?php
require "header.php";
require "includes/dbh.inc.php";
require "includes/reservation.inc.php";
?>

<br><br>   
<div class="container">
<h3 class="text-center"><br>ORDERS<br></h3>     




<?php
//Check if user is logged in
    if(isset($_SESSION['user_id'])){
        echo '<p class="text-white bg-dark text-center">'. $_SESSION['username'] .', Here you can order foods that you want along with your reservation!</p><br>';

		
 }
    else {
		//if user is not logged in
        echo '	<p class="text-center text-danger"><br>You are currently not logged in!<br></p>
       <p class="text-center">For you to order for your reservation you have to create an account!<br><br><p>';   
    }   	
?>
<?php
	//Table of the Order Set Choices
 	echo '
		<table class="table table-striped table-bordered">
			<thead>
				<th>Order Set</th>
				<th>Included Foods</th>
				<th>Price</th>
			</thead>
			<tbody>
				<tr>
				<td>1</td>
				<td> Cheesesticks, Rotisserie Chicken, Mousse Cake </td>
				<td>P 1299</td>
				</tr>

				<tr>
				<td>2</td>
				<td> Breadsticks, Smoked Tender Steak, Hot Fudge Sundae </td>
				<td>P 1399</td>
				</tr>

				<tr>
				<td>3</td>
				<td> Calamarie, Creamy Carbonara, Strawberry Shortcake </td>
				<td>P 799</td>
				</tr>
				</tbody>
			</table>
			<!-- Form for selecting the order -->
			<form method="POST" action="includes/add_order.inc.php">
			<div class="row">
				<div class="col-md-3">
					<select name="order_set" class="form-control" required = "required">
					<option value = 1 >1</option>
					<option value = 2>2</option>
					<option value = 3>3</option>
					</select>
				</div>
			<div class="col-md-2" style="margin-left:-20px;">
				<button type="submit"  name = "add-order" class="btn btn-primary">Select Order Set </button>
			</div>
			</form>
		</div>
	</form>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$("#checkAll").click(function(){
	    	$("input:checkbox").not(this).prop("checked", this.checked);
		});
	});
</script>
<br><br>';

?>
<?php
require "footer.php";
?>