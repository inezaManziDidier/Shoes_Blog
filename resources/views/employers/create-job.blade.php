@include('partials.header')
<div style="width:70%;margin:auto;background: #eee;" class="p-4 mt-4">
  <div style="width:85%;margin:auto;">
    @if (isset($companies) && count($companies) > 0)
      <h3 class="text-center">create a job</h3>
      <hr>
      @if (session()->has('message'))
        <div class="alert alert-success text-center">
          {{ session('message') }}
        </div>
      @endif
      <form action="{{ route('employer.store-job') }}" method="POST">
        @csrf
        <div class="row">
          <div class="form-group col-md-6">
            <small style="margin-left: 4px;"><b>Select company</b></small><br>
            <select class="form-control" id="company" name="company">
              @foreach ($companies as $company)
                <option>{{ $company->company }}</option>
              @endforeach
            </select>
          </div><br><br>
          <div class="form-group col-md-6">
            <small style="margin-left: 4px;"><b>Select category</b></small><br>
            <select class="form-control" id="category" name="category">
              @foreach ($categories as $category)
                <option>{{ $category->name }}</option>
              @endforeach
            </select>
          </div><br><br>
        </div>
        <div class="form-group">
          <input type="text" class="form-control" id="jobTitle" name="jobTitle"
            placeholder="Job title" required>
        </div>
        <div class="form-group">
          <textarea class="form-control" name="description" cols="10" rows="5" placeholder=" description" required></textarea>
        </div>
        <div class="form-group">
          <input type="number" class="form-control" id="positions" name="positions"
            placeholder="positions" required>
        </div>
        <div class="form-group col-md-6">
          <small style="margin-left: 4px;"><b>application deadline<b></small><br>
          <input type="date" class="form-control" id="deadline" name="deadline" required>
        </div>
        <div class="form-group">
          <small style="margin-left: 4px;"><b>Experience<b></small><br>
          <select class="form-control" id="experience" name="experience">
            <option value="1 year" selected>1 year</option>
            <option value="2 years">2 years</option>
            <option value="3 years">3 years</option>
            <option value="4 years">4 years</option>
            <option value="5 or more years">5 or more years</option>
          </select><br><br>
        </div>
        <div class="form-group">
          <small style="margin-left: 4px;"><b>Contract type<b></small><br>
          <select class="form-control" id="contract-type" name="contract_type">
            <option value="Full-time" selected>Full-time</option>
            <option value="Part-time">Part-time</option>
            <option value="Internship">Internship</option>
          </select><br><br>
        </div>
        <div class="form-group">
          <small style="margin-left: 4px;"><b>Education level<b></small><br>
          <select class="form-control" id="education" name="education">
            <option value="Diploma" selected>Diploma</option>
            <option value="Bachelor">Bachelor</option>
            <option value="Masters">Masters</option>
            <option value="PhD">PhD</option>
          </select><br><br>
        </div>
        <div class="form-group">
          <textarea class="form-control" name="skills" cols="10" rows="5" placeholder=" skills" required></textarea>
        </div>
        <div class="form-group">
          <button type="submit" id="payBtn" class="btn btn-sm">create job</button>
        </div>
      </form>
    @else
      <div class="jumbotron text-center">
        Please register company first. &nbsp; <a href="#"><b><u>register company here</u></b></a>
      </div>
    @endif
  </div>
</div>
@include('partials.footer')
