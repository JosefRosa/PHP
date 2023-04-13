
<!DOCTYPE html>
<html>
<head>
	<title>Seznam piv</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<style>
		table {
			width: 100%;
			border-collapse: collapse;
		}
		th, td {
			padding: 8px;
			text-align: left;
			border-bottom: 1px solid #ddd;
		}
		tr:hover {
			background-color: #f5f5f5;
		}
		@media screen and (max-width: 600px) {
			table, thead, tbody, th, td, tr {
				display: block;
			}
			th {
				text-align: center;
			}
			td {
				text-align: center;
			}
			tr {
				margin-bottom: 20px;
				border-bottom: 1px solid #ddd;
			}
			tr:last-child {
				margin-bottom: 0;
			}
			tr:nth-child(even) {
				background-color: #f2f2f2;
			}
			tr:nth-child(odd) {
				background-color: #fff;
			}
		}
	</style>
</head>
<body>
	<h1>Seznam piv</h1>
	<table>
		<thead>
			<tr>
				<th>Značka</th>
				<th>Název</th>
				<th>Procenta alkoholu (%)</th>
			</tr>
			<?php include("index.php"); ?>
		</thead>
		<tbody>
		</tbody>
	</table>
</body>
</html>
