<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>applications report pdf</title>
  <style>
    .container {
      width: 1000px;
      margin: auto;
    }

    .content {
      width: 1000px;
      margin: auto;
    }

    table,
    tr,
    th,
    td {
      border: 1px solid black;
      border-collapse: collapse;
      padding: 10px;
    }

    .text-center {
       /*text-align: center; */
    }
    .text-primary{
      color: blue;
    }
    .text-success{
      color: green;
    }
    .text-danger{
      color: red;
    }

  </style>
</head>

<body>
  <div class="container">
    <div>
      <img src="{{ public_path('img/logo/logo.png') }}" alt="job portal logo">
    </div>
    <hr>
    <div class="content">
      <h3 class="text-center"><u>Applications made in {{ $month }} {{$year}}</u></h3>
      <table>
        <thead>
            <th class="text-center">Job</th>
            <th class="text-center">Applicant</th>
            <th class="text-center">Application date</th>
            <th class="text-center">Status</th>
        </thead>
        <tbody>
          @foreach ($applications as $job_application)
            <tr>
              <td class="text-center text-primary">{{$job_application->job->title}}</td>
              <td class="text-center">{{$job_application->applicant->firstname}} {{$job_application->applicant->lastname}}</td>
              <td class="text-center">{{$job_application->application_date}}</td>
              <td class="text-center text-primary">@if($job_application->successfull)
              <span class="text-success">success</span> @else
              <span class="text-danger">failed</span>
               @endif</td>
            </tr>
          @endforeach
        </tbody>
        <tfoot>
          <tr>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
          </tr>
        </tfoot>
      </table>
    </div>
  </div>
</body>

</html>
