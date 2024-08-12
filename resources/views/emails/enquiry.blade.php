<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Message Received</title>
</head>
<body>
    <h1>Name is : {{ $data['name'] }}</h1>
    <h2>Email is : {{ $data['email'] }}</h2>
    <h3>Phone is : {{ $data['phone'] }}</h3>
    <h4>Property name : {{ $data['property_name'] }}</h4>
    <p>Message content is : {{ $data['message'] }}</p>
</body>
</html>
