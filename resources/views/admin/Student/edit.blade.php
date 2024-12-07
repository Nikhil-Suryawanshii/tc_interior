@extends('admin.dashboard')
@section('admin')

<!-- Start Page Wrapper -->
<div class="page-wrapper">
    <div class="page-content">
        <!-- Container -->
        <div class="container">
            <div class="main-body">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <form action="{{ route('student.update',$students[0]->id) }}" method="POST">
                            @csrf <!-- Required for form submission in Laravel -->
                            @method('POST')
                            <div class="card">
                                <div class="card-body">
                                    <!-- Name Field -->
                                    <div class="row mb-3">
                                        <label for="name" class="col-sm-3 col-form-label">Full Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="name" name="name" value="{{$students[0]->name}}" placeholder="Enter full name" required>
                                        </div>
                                    </div>
                                    <!-- Email Field -->
                                    <div class="row mb-3">
                                        <label for="email" class="col-sm-3 col-form-label">Email</label>
                                        <div class="col-sm-9">
                                            <input type="email" class="form-control" id="email" name="email" value="{{$students[0]->email}}" placeholder="Enter email" required>
                                        </div>
                                    </div>
                                    <!-- Date Field -->
                                    <div class="row mb-3">
                                        <label for="date" class="col-sm-3 col-form-label">Date</label>
                                        <div class="col-sm-9">
                                            <input type="date" class="form-control" id="date" name="date" value="{{$students[0]->date}}" required>
                                        </div>
                                    </div>
                                    <!-- Save Changes Button -->
                                    <div class="row">
                                        <div class="col-sm-3"></div>
                                        <div class="col-sm-9">
                                            <button type="submit" class="btn btn-primary px-4">Save Changes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
