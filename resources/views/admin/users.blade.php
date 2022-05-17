
@extends('layouts.admin_dashboard')
@section('content')
          <!-- Content Row -->
          <div class="row">
            <div style="width:90%;margin:auto;background: #eee;" class="p-4 mt-4">
              <div style="width:100%;margin:auto;">
                <h3 class="lead text-center"><b>USERS</b></h3><hr>
                <table class="table table-bordered table-hover text-center">
                  <thead>
                  	<th class="text-center">User name</th>
                    <th class="text-center">Email</th>
                  </thead>
                  <tbody>
                    @foreach ($users as $user)
                    @if($user->is_admin)
                    @continue
                    @endif
                    <tr>
                      <td class="text-center text-primary">{{$user->name}}</td>
                      <td class="text-center">{{$user->email}}</td>
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
