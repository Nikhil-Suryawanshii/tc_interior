@extends('seller.dashboard')
@section('seller')
<div class="page-wrapper">
    <div class="page-content">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Edit City</h5>
                <form action="{{ route('city.update', $city->id) }}" method="POST">
                    @csrf
                    @method('POST')
                    <div class="mb-3">
                        <label for="name" class="form-label">City Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $city->name }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="state_id" class="form-label">State</label>
                        <select class="form-control" id="state_id" name="state_id" required>
                            @foreach($states as $state)
                                <option value="{{ $state->id }}" {{ $city->state_id == $state->id ? 'selected' : '' }}>{{ $state->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
