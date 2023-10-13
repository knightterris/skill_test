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
            <div class="d-flex justify-content-end">
                <a class="btn btn-primary mx-3" href="{{ route("tests.create") }}">Create Task</a>
                <a class="btn btn-primary mx-3" data-bs-toggle="modal" data-bs-target="#createProject">Create Project</a>
                <div class="dropdown mx-3">
                    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                     Show Projects
                    </a>

                    <ul class="dropdown-menu">
                        @if (count($projects) == 0)
                            <li><a class="dropdown-item" href="#">No projects</a></li>
                        @endif
                        @foreach ($projects as $project)
                            <li><a class="dropdown-item" href="{{ route("projects.show",$project->id) }}">{{ $project->name }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="modal fade" id="createProject" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="createProjectLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <form action="{{ route("projects.store") }}"  method="post">
                        @csrf
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="createProjectLabel">Create Project</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <label for="projectName" class="form-label">Project name</label>
                            <input type="text" name="projectName" id="" class="form-control">
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          <button class="btn btn-primary" type="submit">Create</button>
                        </div>
                    </form>
                  </div>
                </div>
              </div>
            <table class="table">
                {{-- @php
                    @dd($tests)
                @endphp --}}
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Project</th>
                    <th scope="col">Priority</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody id="sortable">
                    @if (count($tests) == 0)
                        <tr>
                            <td class="h4 text-center">There are no data.</td>
                        </tr>
                    @else
                        @foreach ($tests as $test)
                            <tr id="{{ $test->id }}">
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $test->name }}</td>
                                <td>{{ $test->projectName }}</td>
                                <td><span class=" @if ($test->priority == "true")
                                    text-bg-success
                                @else
                                    text-bg-danger
                                @endif ">
                                @if ($test->priority == "true")
                                    True
                                @else
                                    False
                                @endif
                                </span>
                                    </td>
                                    <td class="d-flex justify-between">
                                        <a href="{{ route("tests.edit",$test->id) }}" class="btn btn-success mx-3">Edit</a>
                                        <form action="{{ route("tests.destroy",$test->id) }}" method="POST">
                                            @method("DELETE")
                                            @csrf
                                            <button class="btn btn-danger mx-3">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>



</body>
<script>
    $(function () {
        $("#sortable").sortable({
            update: function( event, ui ) {
                // alert("Sortable Event Updated!")
                var sortedItemIds = [];
                $("#sortable tr").each(function () {
                    var itemId = $(this).attr("id");
                    sortedItemIds.push(itemId);
                });

                console.log("Sorted Item IDs:", sortedItemIds);
            }
        });
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</html>
