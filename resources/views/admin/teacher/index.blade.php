@extends('layout.AdminLayout')
@section('content')

    @if ($message = Session::get('success'))
        <div id="successMessage"
            class="alert alert-success alert-dismissible alert-solid alert-label-icon fade show position-fixed top-0 end-0"
            style="z-index: 9999; margin-top: 25px;" role="alert">
            <i class="ri-check-double-line label-icon"></i><strong>{{ $message }}</strong>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if ($message = Session::get('danger'))
        <div id="dangerMessage"
            class="alert alert-danger alert-dismissible alert-solid alert-label-icon fade show position-fixed top-0 end-0"
            style="z-index: 9999; margin-top: 25px;" role="alert">
            <i class="ri-error-warning-line label-icon"></i><strong>{{ $message }}</strong>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-9">
                        <h4>Teacher</h4>
                    </div>
                    <div class="col-3 text-end">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModaladd">
                            Add Teacher
                        </button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered" id="teacher_table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Desgination</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Add Modal -->
    <div class="modal fade" id="exampleModaladd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Record</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('/admin/teacher/store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <label for="name">Name</label>
                        <input type="text" name="name" required class="form-control" placeholder="Enter the name">
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <label for="email">Email</label>
                        <input type="text" name="email" required class="form-control" placeholder="Enter the xyz@gmail.com">
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <label for="desgination">Desgination</label>
                        {{-- <input type="text" name="desgination_id" required class="form-control" placeholder="Enter the desgination"> --}}
                        <select name="desgination" id="" class="form-control" required>
                            <option value="">Choose the Desgination</option>
                            <option value="principal ">Principal</option>
                            <option value="assistantprofessor ">Assistant Professor</option>
                            <option value="professor ">Professor</option>
                        </select>
                        @error('desgination')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <label for="facebooklink">Facebook Link</label>
                        <input type="text" name="facebook_link" class="form-control" placeholder="https://www.facebook.com/profile.php?id=10">
                        @error('facebooklink')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <label for="youtubelink">Youtube Link</label>
                        <input type="text" name="youtube_link" class="form-control" placeholder="https://www.youtube.com/watch?v=dQw4w9WgXcQ">
                        @error('youtubelink')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <label for="twitterlink">Twitter Link</label>
                        <input type="text" name="twitter_link" class="form-control" placeholder="https://twitter.com/username">
                        @error('twitterlink')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <label for="image">Image</label>
                        <input type="file" name="image" required class="form-control">
                        @error('image')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <input type="submit" value="Submit" class="btn btn-primary">
                </div>
                </form>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(function() {
            var table = $('#teacher_table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('teachers.index') }}",
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'name', name: 'name' },
                    { data: 'email', name: 'email' },
                    { data: 'desgination', name: 'desgination'},
                    { data: 'image', name: 'image' },
                    { data: 'status', name: 'status' },
                    { data: 'actions', name: 'actions', orderable: false, searchable: true }
                ]
            });
        });
    </script>


@endsection()
