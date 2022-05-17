
@extends('layouts.admin_dashboard')
@section('content')
          <!-- Content Row -->
          <div class="row">
            <div style="width:90%;margin:auto;background: #eee;" class="p-4 mt-4">
              <div style="width:100%;margin:auto;">
                <h3 class="lead text-center"><b>JOB APPLICATIONS</b></h3><hr>
                <table class="table table-bordered table-hover text-center">
                  <thead>
                  	<th class="text-center">Job</th>
                    <th class="text-center">Applicant</th>
                    <th class="text-center">Application date</th>
                    <th class="text-center">Status</th>
                  </thead>
                  <tbody>
                    @foreach ($job_applications as $job_application)
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
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                  </tfoot>
                </table>
              </div>
            </div>
          </div>
@endsection
