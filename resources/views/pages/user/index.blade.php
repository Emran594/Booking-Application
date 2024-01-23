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
                        @if (isset($trips) && count($trips) > 0)
                        <table class="table align-middle" id="customerTable">
                            <thead class="table-light text-muted">
                                <tr>
                                    <th class="sort" data-sort="customer_name">Trip Title</th>
                                    <th class="sort" data-sort="email">Date</th>
                                    <th class="sort" data-sort="phone">From Location</th>
                                    <th class="sort" data-sort="date">Destination</th>
                                    <th class="sort" data-sort="date">Bus Name</th>
                                    <th class="sort" data-sort="status">Fare</th>
                                    <th class="sort" data-sort="action">Action</th>
                                </tr>
                            </thead>
                            <tbody class="list form-check-all">
                                @foreach($trips as $trip)
                                    <tr>
                                        <td class="customer_name">{{ $trip->title }}</td>
                                        <td class="email">{{ $trip->date }}</td>
                                        <td class="phone">{{ $trip->fromLocation->name }}</td>
                                        <td class="date">{{ $trip->toLocation->name }}</td>
                                        <td class="date">{{ $trip->bus->bus_name }}</td>
                                        <td class="status">{{ $trip->fare }}</td>
                                        <td>
                                            <ul class="list-inline hstack gap-2 mb-0">
                                                <li class="list-inline-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Remove">
                                                    <a class="btn btn-success waves-effect waves-light" href="{{ url('/booked-seat', $trip->id) }}">Booked A Seat</a>
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                    <div class="alert alert-danger border-0 mb-xl-0" role="alert">
                        <strong> There Is NO Trip  </strong> Available Now
                    </div>
                    @endif
                    </div>
            </div>
        </div>
    </div>
    <!-- container-fluid -->
</div>

@endsection
