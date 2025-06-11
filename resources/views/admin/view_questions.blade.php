@extends('layouts.Admin.master')
@section('content')

<div class="container-fluid">
    <div class="table-responsive text-center">
        <table class="table" style="border-collapse: separate; border-spacing: 0; border-radius: 12px; overflow: hidden;">
            <thead style="background-color: #7D6E65; color: #FFFFFF;">
                <tr>
                    <th style="border-right: 1px solid #FFFFFF;">Job</th>
                    <th style="border-right: 1px solid #FFFFFF;">Major</th>
                    <th style="border-right: 1px solid #FFFFFF;">Location</th>
                    <th style="border-right: 1px solid #FFFFFF;">Duration</th>
                    <th style="border-right: 1px solid #FFFFFF;">Available</th>
                    <th style="border-right: 1px solid #FFFFFF;">Action</th>



                </tr>
            </thead>
            <tbody>
              @foreach ($questions  as  $question)
              <tr>
                  <td>{{ $question->id }}</td>
                  <td>{{ $question->exam->exam_name }}</td>
                  <td>{{ $question->question_text }}</td>
                  <td>{{ $question->question_type }}</td>
                  <td>{{ $question->correct_answer }}</td>
                  <td>
                    <a href="{{ route('admin.edit.questions',$question->id) }}" >Edit</a>
                    <form action="{{ route('admin.delete.questions',$question->id) }}" method="post" style="display:inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                  </td>

              </tr>
              @endforeach

            </tbody>
        </table>
    </div>
</div>




@endsection
