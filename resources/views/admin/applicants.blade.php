
@extends('layouts.admin_dashboard')
@section('content')
          <!-- Content Row -->
          <div class="row">
            <div style="width:90%;margin:auto;background: #eee;" class="p-4 mt-4">
              <div style="width:100%;margin:auto;">
                <h3 class="lead text-center"><b>APPLICANTS</b></h3><hr>
                <table class="table table-bordered table-hover text-center">
                  <thead>
                    <th class="text-center">Firstname</th>
                    <th class="text-center">Lastname</th>
                    <th class="text-center">gender</th>
                    <th class="text-center">Nationality</th>
                    <th class="text-center">degree</th>
                    <th class="text-center">Skills</th>
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
                  </tfoot>
                </table>
              </div>
            </div>
          </div>
@endsection
