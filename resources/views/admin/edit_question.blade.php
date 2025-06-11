
@extends('layouts.Admin.master')

@section('content')

    <form method="POST" action="{{ route('admin.update.questions') }}" id="addUserForm">
        @method('PUT')
        @csrf

        <input type="hidden" value="{{ $quesion->id }}" name="id">

      <div class="row mt-5" dir="ltr">

          <div class="col-xl-3 col-md-6">
              <div class="card bg-pattern">
                  <div class="form-group m-1">
                      <input type="text" value="{{ $quesion->question_text }}"  name="question_text" class="w-100 border-1 form-control" placeholder="Question.." id="addUserName" required>
                  </div>
              </div>
          </div>

          <div class="col-xl-3 col-md-6">
            <div class="card bg-pattern">
                <div class="form-group m-1">
                    <select name="question_type" id="addUserStatus" class="form-control" required>
                        <option value="">Select Type</option>
                        <option value="mcq" {{ $quesion->question_type ==='mcq' ?'selected':'' }}>MCQ</option>
                        <option value="true_false" {{ $quesion->question_type ==='true_false' ?'selected':'' }}>True  False </option>


                    </select>
                </div>
            </div>
        </div>


          <div class="col-xl-3 col-md-6">
              <div class="card bg-pattern">
                  <div class="form-group m-1">
                      <input type="text" value="{{ $quesion->points }}" name="points" class="w-100 border-1 form-control" placeholder="Mark.." id="addUserEmail" required>
                  </div>
              </div>
          </div>

          <div class="col-xl-3 col-md-6">
              <div class="card bg-pattern">
                  <div class="form-group m-1">
                      <input value="{{ $quesion->option1 }}" name="option1" type="text" class="w-100 border-1 form-control" placeholder="option 1" id="addUserJob" required>
                  </div>
              </div>
          </div>

          <div class="col-xl-3 col-md-6">
              <div class="card bg-pattern">
                  <div class="form-group m-1">
                      <input type="text" value="{{ $quesion->option2 }}"  name="option2" class="w-100 border-1 form-control" placeholder="option 2" id="addUserJob" required>
                  </div>
              </div>
          </div>


          <div class="col-xl-3 col-md-6">
              <div class="card bg-pattern">
                  <div class="form-group m-1">
                      <input type="text" value="{{ $quesion->option3 }}"  name="option3" class="w-100 border-1 form-control" placeholder="option 3" id="addUserJob" required>
                  </div>
              </div>
          </div>


          <div class="col-xl-3 col-md-6">
              <div class="card bg-pattern">
                  <div class="form-group m-1">
                      <input type="text" value="{{ $quesion->option4 }}"  name="option4" class="w-100 border-1 form-control" placeholder="option 4" id="addUserJob" required>
                  </div>
              </div>
          </div>


          <div class="col-xl-3 col-md-6">
              <div class="card bg-pattern">
                  <div class="form-group m-1">
                      <select name="correct_answer" id="addUserStatus" class="form-control" required>
                          <option value="">Correct Ans</option>

                          <option value="option1" {{ $quesion->correct_answer ==='option1' ? 'selected':'' }}>Option 1</option>
                          <option value="option2" {{ $quesion->correct_answer ==='option2' ? 'selected':'' }}>Option 2</option>
                          <option value="option3" {{ $quesion->correct_answer ==='option3' ? 'selected':'' }}>Option 3</option>
                          <option value="option4" {{ $quesion->correct_answer ==='option4' ? 'selected':'' }}>Option 4</option>

                      </select>
                  </div>
              </div>
          </div>





          <div class="col-xl-3 col-md-6">
              <div class="card bg-pattern">
                  <div class="form-group m-1">
                      <button class="btn w-100" type="submit">Update</button>
                  </div>
              </div>
          </div>
      </div>
  </form>






@endsection
