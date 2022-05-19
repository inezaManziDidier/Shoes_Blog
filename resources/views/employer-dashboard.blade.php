@include('partials.header')
@section('extra-js')
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
@endsection
<div style="width:70%;margin:auto;background: #fef;" class="p-4 mt-4">
  <div style="width:85%;margin:auto;">
    <h4 class="text-center">Employer dashboard</h4>
    <hr>
    @if (session()->has('message'))
      <div class="alert alert-success text-center">
        {{ session('message') }}
      </div>
    @endif
    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist">
      <li class="nav-item">
        <a class="nav-link active text-dark" data-toggle="tab" href="#home">Companies <span class="badge badge-pill badge-info">{{count(auth()->guard('employer')->user()->employers)}}</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-dark" data-toggle="tab" href="#menu1">Add company</a>
      </li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
      <div id="home" class="container tab-pane active"><br>
        <h3>Registered companies</h3>
        @forelse ($companies as $company)
          <div class="row">
            <div class="col-md-4">
              <a href="{{route('employer.jobs',$company->id)}}">
              <img src="{{ asset('img/' . $company->logo) }}" alt="company logo" style="width: 90%; height: 90%;"></a>
            </div>
            <div class="col-md-8">
              <b>Location:</b> {{ $company->location }} <br>
              <b>Name:</b> {{ $company->company }} <br>
              <b><a href="{{route('employer.jobs',$company->id)}}" class="text-primary"><u>Posted jobs</u></a> <span class="badge badge-pill badge-info">{{count($company->jobs)}}</span></b><br><br>
              <b>Description</b>
              <p>{{ $company->description }}</p>
            </div>
          </div>
          <hr>
        @empty
          <p class="jumbotron text-center">
            No registered companies.
          </p>
        @endforelse
      </div>
      <div id="menu1" class="container tab-pane fade"><br>
        <h3 class="text-center">Register a new company</h3>
        <hr>
        <form action="{{ route('employer.create-company') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <input type="text" class="form-control" id="companyName" name="companyName"
              placeholder="Company name" required>
          </div>
          <div class="form-group">
            <input type="text" class="form-control" id="location" name="location"
              placeholder="Location" required>
          </div>
          <div class="form-group">
            <input type="email" class="form-control" id="email" name="email"
              placeholder="Email" required>
          </div>
          <div class="form-group">
            <textarea class="form-control" name="description" cols="10" rows="5" placeholder=" description" required></textarea>
          </div>
          <div class="form-group">
            <small style="margin-left: 4px;"><b>Logo<b></small><br>
            @error('logo')
              <small class="text-danger">{{ $message }}</small>
            @enderror
            <input type="file" class="form-control" id="logo" name="logo" required>
          </div>
          <div class="form-group">
            <button type="submit" id="payBtn" class="btn btn-sm">Add company</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@include('partials.footer')
