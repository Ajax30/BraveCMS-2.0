<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>A message from {{ $site_name }}</title>
</head>
<body>
	<table cellpadding="0" cellspacing="0" style="border: 0; font-family: Arial, sans-serif; width: 700px; margin: 0 auto">
		<tr>
			<td>
				<h2>New message from {{ $site_name }}</h2>
			</td>
		</tr>
		<tr>
			<td>
				<strong>Sender name:</strong> {{ $name }}<br>
    		<strong>Sender email:</strong> {{ $email }}
			</td>
		</tr>
		<tr>
			<td>{{ $message }}</td>
		</tr>
	</table>	
</body>
</html>