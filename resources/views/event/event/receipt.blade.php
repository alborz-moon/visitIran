<!DOCTYPE html>
<html lang="fa">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <style>
        p {
            font-family: 'iran';
        }

        /* sans-serif */
    </style>

</head>

<body>
    <p>{{ $data['title'] }}</p>
    <p>{{ $data['created_at'] }}</p>
    <p style="color: red">{{ $data['phone'] }}</p>
    <p>{{ $data['nid'] }}</p>
    <p>{{ $data['paid'] }}</p>
    <p>{{ $data['name'] }}</p>
</body>
