@extends('layout.user-dashboard')
@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Bookings</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Bookie</a></li>
                            <li class="breadcrumb-item active">TRIPS</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card" id="customerList">
                    <div class="card-header border-bottom-dashed">
                        <div class="row g-4 align-items-center">
                            <div class="col-sm">
                                <div>
                                    <h5 class="card-title mb-0">Search Available Trips Here</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body border-bottom-dashed border-bottom">
                        <form action="{{ route('search-trips')}}" method="GET">
                            <div class="row g-3">
                                <div class="col-xl-2">
                                    <div class="input-group">
                                        <input type="date" class="form-control" name="from_location" placeholder="Input From Location" aria-label="Search">
                                    </div>
                                </div>
                                <div class="col-xl-3">
                                    <select class="form-select mb-3" name="from_location" id="from-location-field" aria-label="Default select example" required>
                                        <option selected>Select From Location</option>
                                        @foreach($locations as $location)
                                        <option value="{{ $location->id }}">{{ $location->name }}</option>
                                    @endforeach
                                    </select>
                                </div>
                                <div class="col-xl-3">
                                    <select class="form-select mb-3" name="to_location" id="to-location-field" aria-label="Default select example" required>
                                        <option selected>Select To Location</option>
                                        @foreach($locations as $location)
                                        <option value="{{ $location->id }}">{{ $location->name }}</option>
                                    @endforeach
                                    </select>
                                </div>
                                <div class="col-xl-2">
                                    <button type="button" class="btn btn-primary">Search</button>
                                </div>
                            </div>
                        </form>
                    </div>
            </div>
        </div>
    </div>
    <!-- container-fluid -->
</div>

@endsection
