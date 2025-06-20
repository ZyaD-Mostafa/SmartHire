@extends('layouts.Admin.master')
@section('content')
@if(session('error'))
<div class="alert alert-danger">
    {{ session('error') }}
</div>
@endif

@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif
<div class="content mt-4 pt-4">
    <div class="dash-nav d-flex flex-column flex-md-row align-items-center employee mb-3 mt-3">
        <div class="buttons mt-md-0 w-100 fs-4">
          <button type="button" class="btn btn-sm w-100" onclick="toggleAddForm()">
              <i class="fas fa-plus" style="color: #302927; margin-right: 8px;"></i> Add Exam
          </button>

        </div>
    </div>
    <form method="POST" action="{{ route('admin.create.exam') }}" id="addUserForm" style="display: none;" dir="ltr">
        @csrf
      <div class="row mt-5">
          <div class="col-xl-3 col-md-6">
              <div class="card bg-pattern">
                  <div class="form-group m-1">
                      <input type="text" name="exam_name" class="w-100 border-1 form-control" placeholder="Exam Field.." id="addUserName" required>
                  </div>
              </div>
          </div>


          <div class="col-xl-3 col-md-6">
              <div class="card bg-pattern">
                  <div class="form-group m-1">
                      <select name="job_id" id="addUserStatus" class="form-control" required>
                          <option value="">Select Job</option>
                        @foreach ( $jobs as $job )
                          <option value="{{ $job->id }}">{{ $job->name }}</option>

                        @endforeach
                      </select>
                  </div>
              </div>
          </div>



          <div class="col-xl-3 col-md-6">
              <div class="card bg-pattern">
                  <div class="form-group m-1">
                      <input type="text" class="w-100 border-1 form-control" name="number_of_questions" placeholder="Total Questions" id="addUserEmail" required>
                  </div>
              </div>
          </div>

          <div class="col-xl-3 col-md-6">
              <div class="card bg-pattern">
                  <div class="form-group m-1">
                      <input type="text" name="exam_duration" class="w-100 border-1 form-control" placeholder="Duration" id="addUserJob" required>
                  </div>
              </div>
          </div>
          <!-- addUserPhoto -->





          <div class="col-xl-3 col-md-6">
              <div class="card bg-pattern">
                  <div class="form-group m-1">
                      <button class="btn w-100" type="submit">Create</button>
                  </div>
              </div>
          </div>
      </div>
  </form>
  <div class="container-fluid">
      <div class="table-responsive text-center">
          <table class="table" style="border-collapse: separate; border-spacing: 0; border-radius: 12px; overflow: hidden;">
              <thead style="background-color: #7D6E65; color: #FFFFFF;">
                  <tr>
                      <!-- First and last TH get rounded corners -->
                      <th style="border-right: 1px solid #FFFFFF;">ID</th>
                      <th style="border-right: 1px solid #FFFFFF;">Exam Field</th>
                      <th style="border-right: 1px solid #FFFFFF;">Related Job</th>
                      <th style="border-right: 1px solid #FFFFFF;">Total Question</th>
                      <th style="border-top-right-radius: 12px;">Duration</th>
                  </tr>
              </thead>
              <tbody>
                @foreach ($exams as $exam )
                    <tr>
                        <td>{{ $exam->id }}</td>
                        <td>{{ $exam->exam_name }}</td>
                        <td>{{ $exam->job->name }}</td>
                        <td>{{ $exam->number_of_questions }}</td>
                        <td>{{ $exam->exam_duration }}</td>
                        >
                    </tr>
                @endforeach

              </tbody>
          </table>
      </div>
  </div>

@endsection
