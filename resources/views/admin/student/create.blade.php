@extends('admin.dashboard')
@section('admin')



  <!-- Start Page Wrapper -->
<div class="page-wrapper">
    <div class="page-content">
        <!-- Container -->
        <div class="container">
            <div class="main-body">
                <div class="row">
                    <div class="col-lg-8">
                        <form action="{{ route('student.store') }}" method="POST">
                            @csrf <!-- This is required for form submission in Laravel -->
                           <div class="card">
                            <div class="card-body">
                                <!-- Name Field -->
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Full Name</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control" name="name" placeholder="Enter full name" />
                                    </div>
                                </div>
                                <!-- Email Field -->
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Email</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="email" class="form-control" name="email" placeholder="Enter email" />
                                    </div>
                                </div>
                                <!-- Date Field -->
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Date</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="date" class="form-control" name="date" />
                                    </div>
                                </div>
                                <!-- Save Changes Button -->
                                <div class="row">
                                    <div class="col-sm-3"></div>
                                    <div class="col-sm-9 text-secondary">
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
