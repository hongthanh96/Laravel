@extends('layouts.app')
@section('content')
 <div class="flex-center position-ref full-height">
     <div class="content">
         <div class="title m-b-md">
             Add new Task
         </div>
         <form class="text-left" action="{{ route("tasks.store") }}" method="POST"  enctype="multipart/form-data">
            @csrf
             <div class="form-group">
                 <label for="inputTitle">Task title</label>
                 <input type="text"
                        class="form-control"
                        id="inputTitle"
                        name="inputTitle"
                        required>
             </div>
             <div class="form-group">
                 <label for="inputContent">Task content</label>
                 <textarea class="form-control"
                           id="inputContent"
                           name="inputContent"
                           rows="3"
                           required></textarea>
             </div>
             <div class="form-group">
                 <label for="inputDueDate">Due Date</label>
                 <input type="date"
                        class="form-control"
                        id="inputDueDate"
                        name="inputDueDate"
                        required>
             </div>
             <div class="form-group">
                 <label for="inputFileName">File Name</label>
                 <input type="text"
                        class="form-control"
                        id="inputFileName"
                        name="inputFileName">
                 <input type="file"
                        class="form-control-file"
                        id="inputFile"
                        name="inputFile">
             </div>
             <button type="submit" class="btn btn-primary">Submit</button>
         </form>
         <hr>
         <a href="{{ route('welcome.name') }}">< Back</a>
     </div>
 </div>


@endsection
