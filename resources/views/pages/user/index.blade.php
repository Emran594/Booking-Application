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
                        <form action="{{ url('/search-trip') }}" method="GET">
                            <div class="row g-3">
                                <div class="col-xl-2">
                                    <div class="input-group">
                                        <input type="date" class="form-control" name="date" placeholder="Input From Location" aria-label="Search">
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
                                    <button type="submit" class="btn btn-primary">Search</button>
                                </div>
                            </div>
                        </form>


                    </div>
                    <div class="table-responsive table-card mb-1">
                        <table class="table align-middle" id="customerTable">
                            <thead class="table-light text-muted">
                                <tr>
                                    <th class="sort" data-sort="customer_name">Trip Title</th>
                                    <th class="sort" data-sort="email">Date</th>
                                    <th class="sort" data-sort="phone">From Location</th>
                                    <th class="sort" data-sort="date">Destination</th>
                                    <th class="sort" data-sort="date">Bus Name</th>
                                    <th class="sort" data-sort="status">Fare</th>
                                    <th class="sort" data-sort="status">Status</th>
                                    <th class="sort" data-sort="action">Action</th>
                                </tr>
                            </thead>
                            <tbody class="list form-check-all">

                            </tbody>
                        </table>
                        <div class="noresult" style="display: none">
                            <div class="text-center">
                                <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop" colors="primary:#25a0e2,secondary:#00bd9d" style="width:75px;height:75px">
                                </lord-icon>
                                <h5 class="mt-2">Sorry! No Result Found</h5>
                                <p class="text-muted mb-0">We've searched more than 150+ TRIPS
                                    We did not find any
                                    TRIPS for you search.</p>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
    <!-- container-fluid -->
</div>

@endsection
