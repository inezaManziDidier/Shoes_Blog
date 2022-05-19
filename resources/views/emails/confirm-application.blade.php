<!DOCTYPE html>
<html>

<head>
  <title>Job portal app</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
    integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>

<body>
  <h1>{{ $details['title'] }}</h1>
  <p>{{ $details['body'] }}</p>
  <p><b>Interview date: {{ $details['interview_date'] }}</b><b>(3 days after job application deadline)</b></p>
  <p>Thank you</p>
  <button
    style="background: lightseagreen;font-size:20px;border:1px solid grey;height: 30px; width: fit-content;text-align: center;">
    <a href="{{ route('homepage') }}" style="text-decoration: none;color:white;">Go back to app</a>
  </button>
  <br><br><br>
</body>

</html>
