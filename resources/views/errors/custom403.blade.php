<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8" />
    <title>دسترسی ممنوع</title>
    <style>
        body {
            font-family: Tahoma, sans-serif;
            text-align: center;
            padding: 50px;
            background-color: #f8f9fa;
        }
        h1 {
            font-size: 48px;
            color: #dc3545;
        }
        p {
            font-size: 20px;
            margin: 20px 0;
        }
        a.button {
            display: inline-block;
            background-color: #007bff;
            color: white;
            padding: 12px 25px;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }
        a.button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h1>دسترسی ممنوع</h1>
    <p>شما اجازه دسترسی به این بخش را ندارید.</p>
    <a href="{{ url('/') }}" class="button">بازگشت به صفحه اصلی</a>
</body>
</html>
