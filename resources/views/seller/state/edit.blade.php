@extends('seller.dashboard')
@section('seller')
<div class="page-wrapper">
    <div class="page-content">
        <div class="row">
            <div class="col-xl-8 mx-auto">
                <h6 class="mb-0 text-uppercase">State Edit Form</h6>
                <hr />
                <div class="card border-top border-0 border-4 border-primary">
                    <div class="card-body p-5">
                        <div class="card-title d-flex align-items-center">
                            <div><i class="bx bxs-edit me-1 font-22 text-primary"></i></div>
                            <h5 class="mb-0 text-primary">Edit State</h5>
                        </div>
                        <hr>
                        <form action="{{ route('state.update', $state->id) }}" method="POST" class="row g-3">
                            @csrf
                            @method('POST') <!-- Use PUT method for update -->
                            <div class="col-md-6">
                                <label for="inputName" class="form-label">State Name</label>
                                <input type="text" name="name" class="form-control" id="inputName" value="{{ old('name', $state->name) }}" required>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary px-5">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
