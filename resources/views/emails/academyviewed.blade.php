<!DOCTYPE html>
<html>
<head>
    <title>New Academy Viewed</title>
</head>
<body>

 Academy <strong>{{ $academy->academy_name }}</strong>
 was viewed at <strong>{{ \Carbon\Carbon::now() }}</strong>
 by Ip Address <strong>{{ $ip }}</strong>
</body>
</html>
