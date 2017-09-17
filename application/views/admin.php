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

<div class="section hero">
	<div class="container">
		<div class="row">
            <h3>Užsakymai</h3>
			<table>
                <tr>
                    <th>ID</th>
                    <th>Būsena</th>
                    <th>Kiekis</th>
                    <th>&euro;/vnt.</th>
                    <th>Suma, &euro;</th>
                    <th>Užsakovas</th>
                    <th>Miestas</th>
                    <th>Adresas</th>
                    <th>El. paštas</th>
                    <th>Tel. nr.</th>
                    <th>Užsakymo data</th>
                    <th></th>
                    <th></th>
                </tr>

                <?php
                foreach ($results->result() as $row)
                {
                    If ($row->status == "new") { $status = "Naujas"; }
                    If ($row->status == "sent") { $status = "Išsiųstas"; }
                    if (!isset($status)) { $status = $row->status; }
                    echo "
                    <tr>
                        <td>".$row->id."</td>
                        <td>".$status."</td>
                        <td>".$row->quantity."</td>
                        <td>".$row->unit_price."</td>
                        <td>".$row->total_price."</td>
                        <td>".$row->customer."</td>
                        <td>".$row->city."</td>
                        <td>".$row->address."</td>
                        <td>".$row->email."</td>
                        <td>".$row->tel_nr."</td>
                        <td>".$row->date."</td>
                        <td><a href='/admin/send/".$row->id."'>Išsiųsti</a></td>
                        <td><a href='/admin/delete/".$row->id."'>Ištrinti</a></td>
                    </tr>
                    ";
                }
                ?>

            </table>
            <?php echo $links; ?>
			</div>
		</div>
	</div>
</div>

</body>
</html>