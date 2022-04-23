@include('partials.header')

<div style="width:70%;margin:auto;background: #eee;" class="p-4 mt-4">
  <div style="width:85%;margin:auto;">
    <h3 class="text-center">create a job</h3>
    <hr>
    <form action="#" method="POST">
      @csrf
      <div class="form-group">
        <input type="text" class="form-control" id="employer" name="employer"
          placeholder="Employer name" required>
      </div>
      <div class="form-group">
        <small style="margin-left: 4px;"><b>Select category</b></small><br>
        <select class="form-control" id="category" name="category">
          @foreach ($categories as $category)
            <option>{{ $category->name }}</option>
          @endforeach
        </select>
      </div><br><br>
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
      <div class="form-group">
        <small style="margin-left: 4px;"><b>application deadline<b></small><br>
        <input type="date" class="form-control" id="deadline" name="deadline" required>
      </div>
      <div class="form-group">
        <small style="margin-left: 4px;"><b>Experience<b></small><br>
        <select class="form-control" id="experience" name="experience">
          <option value="No experience">No experience</option>
          <option value="1 year">1 year</option>
          <option value="2 years">2 years</option>
          <option value="3 years">3 years</option>
          <option value="4 years">4 years</option>
          <option value="5 or more years">5 or more years</option>
        </select><br><br>
      </div>
      <div class="form-group">
        <small style="margin-left: 4px;"><b>Contract type<b></small><br>
        <select class="form-control" id="contract-type" name="contract-type">
          <option value="Full-time">Full-time</option>
          <option value="Part-time">Part-time</option>
          <option value="Internship">Internship</option>
        </select><br><br>
      </div>
      <div class="form-group">
        <small style="margin-left: 4px;"><b>Education level<b></small><br>
        <select class="form-control" id="education" name="education">
          <option value="Diploma">Diploma</option>
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
  </div>
</div>
@include('partials.footer')
