<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Test Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href= "https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head>
<body>
  <div class=" d-flex justify-content-center align-items-center min-vh-100">
    <div class="w-100 container">
        <div class="card">
            <div class="card-header">Create Task
                <div class="d-flex justify-content-end">
                    <button class="btn btn-primary text-end" type="" onclick="history.back()">Back</button>
                </div>
            </div>
            <form action="{{ route("tests.store")  }}" method="post">
                @csrf
                <div class="card-body">
                    <label for="testName" class="form-label">Task Name</label>
                    <input type="text" name="testName" id="testName" class="form-control my-3 @error("testName")
                        is-invalid
                    @enderror" placeholder="Fill your task">

                    <label for="priority" class="form-label">Priority</label>
                    <select name="priority" id="" class="form-control @error("priority")
                        is-invalid
                    @enderror">
                        <option value="true">Yes</option>
                        <option value="false">No</option>
                    </select>

                    <label for="project" class="form-label">Projects</label>
                    <select name="project" id="" class="form-control @error("project")
                        is-invalid
                    @enderror">
                    @if (count($projects) == 0)
                    <option value="">No projects.</option>
                    @endif
                    @foreach ($projects as $project)
                        <option value="{{ $project->id }}">{{ $project->name }}</option>
                    @endforeach
                    </select>
                </div>
                <div class="card-footer text-end">
                    <button class="btn btn-primary" type="submit">Create</button>
                </div>
            </form>
        </div>
    </div>
  </div>



</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</html>
