@include('partials.header')

<div style="width:70%;margin:auto;background: #eee;" class="p-4 mt-4">
  <div style="width:85%;margin:auto;">
    <h3 class="text-center">Fill application form</h3>
    <hr>
    <form action="#" method="POST">
      @csrf
      <div class="form-group">
        <small style="margin-left: 4px;"><b>Job<b></small><br>
        <input type="text" class="form-control" id="job" name="job"
          value="{{ $job->title }}">
      </div>
      <div class="form-group">
        <input type="text" class="form-control" id="firstname" name="firstname"
          placeholder="First name" required>
      </div>
      <div class="form-group">
        <input type="text" class="form-control" id="lastname" name="lastname"
          placeholder="Last name" required>
      </div>
      <div class="form-group">
        <input type="email" class="form-control" id="email" name="email"
          placeholder="Email" required>
      </div>
      <div class="form-group">
        <input type="number" class="form-control" id="phone" name="phone"
          placeholder="Phone" required>
      </div>
      <div class="form-group">
        <input type="text" class="form-control" id="nationality" name="nationality"
          placeholder="Nationality" required>
      </div>
      <div class="form-group">
        <small style="margin-left: 4px;"><b>Gender<b></small><br>
        <select class="form-control" id="gender" name="gender">
          <option value="Male">Male</option>
          <option value="Female">Female</option>
        </select><br><br>
      </div>
      <div class="form-group">
        <input type="text" class="form-control" id="cvTitle" name="cvTitle"
          placeholder="CV Title" required>
      </div>
      <div class="form-group">
        <small style="margin-left: 4px;"><b>Attach your CV<b></small><br>
        <input type="file" class="form-control" id="cv" name="cv" required>
      </div>
      <div class="form-group">
        <small style="margin-left: 4px;"><b>Attach other files (if any)<b></small><br>
        <input type="file" class="form-control" id="other-files" name="other-files[]" required>
        <small style="margin-left: 4px;">maximun 2 files</small><br>
      </div>
      <div class="form-group">
        <small style="margin-left: 4px;"><b>Highest degree<b></small><br>
        <select class="form-control" id="education" name="education">
          <option value="Diploma">Diploma</option>
          <option value="Bachelor">Bachelor</option>
          <option value="Masters">Masters</option>
          <option value="PhD">PhD</option>
        </select><br><br>
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
        <textarea class="form-control" name="skills" cols="10" rows="5" placeholder=" skills" required></textarea>
      </div>
      <div class="form-group">
        <button type="submit" id="payBtn" class="btn btn-sm">Apply</button>
      </div>
    </form>
  </div>
</div>

@include('partials.footer')
