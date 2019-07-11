<!DOCTYPE html>
<html lang="en-US">
<head>
<meta charset="utf-8">
</head>
<body>
<h2>Theinzawmaung</h2>
<p>
You have a new ticket. The ticket id is {!! $ticket !!}!
</p>
<p>You can access this ticket using this link<a href="http://laravel.test/tickets/{{ $ticket }}">{{ $ticket }}</a></p>
</body>
</html>
