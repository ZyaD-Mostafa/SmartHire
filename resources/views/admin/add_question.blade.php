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
              <i class="fas fa-plus" style="color: #302927; margin-right: 8px;"></i> Add Question
          </button>

                    </div>
    </div>
    <form method="POST" action="{{ route('admin.create.quesion') }}" id="addUserForm" style="display: none;">

        @csrf




      <div class="row mt-5" dir="ltr">

          <div class="col-xl-3 col-md-6">
              <div class="card bg-pattern">
                  <div class="form-group m-1">
                      <select name="exam_id" id="addUserStatus" class="form-control" required>
                          <option value="">Select Exam</option>
                        @foreach ($exams as $exam )

                            <option value="{{ $exam->id }}">{{ $exam->exam_name }}</option>

                        @endforeach
                      </select>
                  </div>
              </div>
          </div>


          <div class="col-xl-3 col-md-6">
              <div class="card bg-pattern">
                  <div class="form-group m-1">
                      <input type="text" name="question_text" class="w-100 border-1 form-control" placeholder="Question.." id="addUserName" required>
                  </div>
              </div>
          </div>

          <div class="col-xl-3 col-md-6">
            <div class="card bg-pattern">
                <div class="form-group m-1">
                    <select name="question_type" id="addUserStatus" class="form-control" required>
                        <option value="">Question type</option>
                        <option value="mcq">MCQ</option>
                        <option value="true_false">True  False </option>


                    </select>
                </div>
            </div>
        </div>


          <div class="col-xl-3 col-md-6">
              <div class="card bg-pattern">
                  <div class="form-group m-1">
                      <input type="text" name="points" class="w-100 border-1 form-control" placeholder="Mark.." id="addUserEmail" required>
                  </div>
              </div>
          </div>

          <div class="col-xl-3 col-md-6">
              <div class="card bg-pattern">
                  <div class="form-group m-1">
                      <input name="option1" type="text" class="w-100 border-1 form-control" placeholder="option 1" id="addUserJob" required>
                  </div>
              </div>
          </div>

          <div class="col-xl-3 col-md-6">
              <div class="card bg-pattern">
                  <div class="form-group m-1">
                      <input type="text" name="option2" class="w-100 border-1 form-control" placeholder="option 2" id="addUserJob" required>
                  </div>
              </div>
          </div>


          <div class="col-xl-3 col-md-6">
              <div class="card bg-pattern">
                  <div class="form-group m-1">
                      <input type="text" name="option3" class="w-100 border-1 form-control" placeholder="option 3" id="addUserJob" >
                  </div>
              </div>
          </div>


          <div class="col-xl-3 col-md-6">
              <div class="card bg-pattern">
                  <div class="form-group m-1">
                      <input type="text" name="option4" class="w-100 border-1 form-control" placeholder="option 4" id="addUserJob" >
                  </div>
              </div>
          </div>


          <div class="col-xl-3 col-md-6">
              <div class="card bg-pattern">
                  <div class="form-group m-1">
                      <select name="correct_answer" id="addUserStatus" class="form-control" required>
                          <option value="">Correct Ans</option>

                          <option value="option1">Option 1</option>
                          <option value="option2">Option 2</option>
                          <option value="option3">Option 3</option>
                          <option value="option4">Option 4</option>

                      </select>
                  </div>
              </div>
          </div>





          <div class="col-xl-3 col-md-6">
              <div class="card bg-pattern">
                  <div class="form-group m-1">
                      <button class="btn w-100" type="submit">ADD</button>
                  </div>
              </div>
          </div>
      </div>
  </form>

  <form method="POST" action="{{ route('admin.upload.questions') }}" enctype="multipart/form-data">
    @csrf
    <div class="row mt-5">
        <div class="col-xl-3 col-md-6">
            <div class="card bg-pattern">
                <div class="form-group m-1">
                    <input type="file" name="excel_file" class="form-control" accept=".xlsx,.xls" required>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card bg-pattern">
                <div class="form-group m-1">
                    <button class="btn w-100" type="submit">Upload Excel</button>
                </div>
            </div>
        </div>
    </div>
</form>
    <a href="{{ route('admin.download.question.template') }}" class="btn btn-sm btn-primary">
        Download Excel Template
    </a>


@endsection
