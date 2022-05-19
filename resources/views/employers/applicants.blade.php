@include('partials.header')
<div style="width:96%;margin:auto;background: #fef;" class="p-4 mt-4">
  <div style="width:100%;margin:auto;">
    <h4 class="text-center">{{$employer->company}} - applicants for job <span class="badge badge-pill badge-info">{{count($applicants)}}</span></h4>
    <p class="lead text-primary text-center"><small>{{$job->title}}</small></p>
    <hr>
    
        @if (!empty($applicants))
          <div class="row">
            	<table class="table table-bordered table-hover text-center small">
                  <thead>
                    <th class="text-center">Firstname</th>
                    <th class="text-center">Lastname</th>
                    <th class="text-center">Gender</th>
                    <th class="text-center">Nationality</th>
                    <th class="text-center">Degree</th>
                    <th class="text-center">Skills</th>
                    <th>CV</th>
                    <th>Other files</th>
                  </thead>
                  <tbody>
                    @foreach ($applicants as $applicant)
                    <tr>
                      <td class="text-center">{{$applicant->firstname}}</td>
                      <td class="text-center">{{$applicant->lastname}}</td>
                      <td class="text-center">{{$applicant->gender}}</td>
                      <td class="text-center">{{$applicant->nationality}}</td>
                      <td class="text-center">{{$applicant->degree}}</td>
                      <td class="text-center">
                        <ul>
                          @foreach ($applicant->skills as $skill)
                            <li style="display:inline;" class="text-primary">{{$skill}}.</li>
                          @endforeach
                        </ul>
                      </td>
                      <td><a href="{{asset('/files/' . $applicant->cv)}}" class="text-primary"><u>{{$applicant->cv}}</u></a></td>
                      <td>
                      	<ul>
                          @foreach ($applicant->other_files as $file)
                            <li style="display:inline;" class="text-primary">
                            	<a href="{{asset('/files/' . $file)}}" class="text-primary"><u>{{$file}}</u></a>
                            </li>
                          @endforeach
                        </ul>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                  <tfoot>
                    <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                  </tfoot>
                </table>
          </div>
          <hr>
        @else
          <p class="jumbotron text-center">
            No applicants found for this job.
          </p>
        @endif
      </div>
    </div>
@include('partials.footer')
