<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Popcorn eShop</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href='//fonts.googleapis.com/css?family=Raleway:400,300,600' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="/css/normalize.css">
	<link rel="stylesheet" href="/css/skeleton.css">
	<link rel="stylesheet" href="/css/custom.css">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<link rel="icon" type="image/png" href="/images/favicon.png">
</head>
<body>
<div class="section hero order-form">
    <div class="container">
      	<div class="row">
			<h3>Užsakymo forma</h3>
			<form id="order-data">				
				<table>
					<tr>
						<td><span class="validation-field" id="quantity_validation"></span>Kiekis: </td><td><input type="text" name="quantity" /></td>
						<td><span class="validation-field" id="customer_validation"></span>Užsakovas: </td><td><input type="text" name="customer" /></td>
					</tr>
					<tr>
						<td><span class="validation-field" id="city_validation"></span>Miestas: </td><td><input type="text" name="city" /></td>
						<td><span class="validation-field" id="address_validation"></span>Adresas: </td><td><input type="text" name="address" /></td>
					</tr>
					<tr>
						<td><span class="validation-field" id="email_validation"></span>El. paštas: </td><td><input type="text" name="email" /></td>
						<td><span class="validation-field" id="tel_nr_validation"></span>Tel. nr: </td><td><input type="text" name="tel_nr" /></td>
					</tr>
				</table>
			</form>
			<a class="button input" id="submit-form" href="#">Užsakyti</a>
			<a class="button input" id="cancel-form" href="#">Atšaukti</a>
      	</div>
    </div>
</div>
<div class="section hero order-successful">
	<div class="container">
		<div class="row">
			<div class="one-half column">
				<h4 class="hero-heading">Jūsų užsakymas sėkmingai užregistruotas. Su Jumis artimiausiu metu susisieks pardavimų vadovas.</h4>
				<a class="button button-primary" id="accepted-order" href="#">Gerai</a>
			</div>
			<div class="one-half column phones">
				<img class="phone" src="images/popcorns-2.png">
			</div>
		</div>
	</div>
</div>

	<div class="section hero">
		<div class="container">
		<div class="row">
			<div class="one-half column">
			<h4 class="hero-heading">Sustok sekundėle! Patirk džiaugsmo skonį.</h4>
			<a class="button button-primary" id="new-order" href="#">Užsakyti</a>
			</div>
			<div class="one-half column phones">
			<img class="phone" src="images/popcorns-1.png">
			</div>
		</div>
		</div>
	</div>

	<div class="section values">
		<div class="container">
		<div class="row">
			<div class="one-third column value">
			<h2 class="value-multiplier">77%</h2>
			<h5 class="value-heading">Pasitikėjimas</h5>
			<p class="value-description">Dalies klientų pasitikėjimas savimi išaugo neapsakomai.</p>
			</div>
			<div class="one-third column value">
			<h2 class="value-multiplier">90%</h2>
			<h5 class="value-heading">Grįžtantys klientai</h5>
			<p class="value-description">Dauguma žmonių sugrįžta paragauti mūsų popkornų vėl</p>
			</div>
			<div class="one-third column value">
			<h2 class="value-multiplier">60%</h2>
			<h5 class="value-heading">Liūdesys</h5>
			<p class="value-description">Dalis asmenų liūdi tik dėl to, jog dar neragavo šio nuostabaus užkandžio.</p>
			</div>
		</div>
		</div>
	</div>

	<div class="section get-help">
		<div class="container">
		<h3 class="section-heading">Užsakymų peržiūros puslapis</h3>
		<p class="section-description">Peržiūrėkite visus užsakymus jau dabar! Be jokių prisijungimų! Visi įrašai lentelėje! Ir visa tai - nemokama!</p>
		<a class="button button-primary" href="/admin/orders">Užsakymai</a>
		</div>
	</div>

</body>
<script>
$("#new-order").click(function(e) {
	$(".order-form").css("display", "block");
	$(".order-successful").css("display", "none");
});
$("#cancel-form").click(function(e) {
	$(".order-form").css("display", "none");
});
$("#accepted-order").click(function(e) {
	$(".order-successful").css("display", "none");
});
$("#submit-form").click(function(e) {
	//apibreziami visi formos laukai
	var fields = ['quantity', 'customer', 'city', 'address', 'email', 'tel_nr']
	
	//istrinamos praeitos validacijos klaidos
	$.each(fields, function(index, value) {
			console.log(value)
			$("#"+value+"_validation").html("");
		});

	$.ajax({
		type: "POST",
		url: "/eshop/new_order",
		data: $("#order-data").serialize(),
		success: function(data){
			if (data.validation) {
				$(".order-successful").css("display", "block");
				$(".order-form").css("display", "none");
			}
			else{
				$.each(data.errors, function(index, value) {
					console.log(value)
					$("#"+value+"_validation").html("Klaida");
				});
			}
		}
	});
});
</script>
</html>
