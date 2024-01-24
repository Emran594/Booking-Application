@extends('layout.dashboard')
@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">TRIPS</h4>

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
                                    <h5 class="card-title mb-0">Trips List</h5>
                                </div>
                            </div>
                            <div class="col-sm-auto">
                                <div class="d-flex flex-wrap align-items-start gap-2">
                                    <button class="btn btn-soft-danger" id="remove-actions" onClick="deleteMultiple()"><i class="ri-delete-bin-2-line"></i></button>
                                    <button type="button" class="btn btn-primary add-btn" data-bs-toggle="modal" id="create-btn" data-bs-target="#showModal"><i class="ri-add-line align-bottom me-1"></i> Add Trip</button>
                                    <button type="button" class="btn btn-soft-success"><i class="ri-file-download-line align-bottom me-1"></i>
                                        Import</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body border-bottom-dashed border-bottom">
                        <form>
                            <div class="row g-3">
                                <div class="col-xl-6">
                                    <div class="search-box">
                                        <input type="text" class="form-control search" placeholder="Search for customer, email, phone, status or something...">
                                        <i class="ri-search-line search-icon"></i>
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-xl-6">
                                    <div class="row g-3">
                                        <div class="col-sm-4">
                                            <div class="">
                                                <input type="text" class="form-control" id="datepicker-range" data-provider="flatpickr" data-date-format="d M, Y" data-range-date="true" placeholder="Select date">
                                            </div>
                                        </div>
                                        <!--end col-->
                                        <div class="col-sm-4">
                                            <div>
                                                <select class="form-control" data-plugin="choices" data-choices data-choices-search-false name="choices-single-default" id="idStatus">
                                                    <option value="">Status</option>
                                                    <option value="all" selected>All</option>
                                                    <option value="Active">Active</option>
                                                    <option value="Block">Block</option>
                                                </select>
                                            </div>
                                        </div>
                                        <!--end col-->

                                        <div class="col-sm-4">
                                            <div>
                                                <button type="button" class="btn btn-secondary w-100" onclick="SearchData();"> <i class="ri-equalizer-fill me-2 align-bottom"></i>Filters</button>
                                            </div>
                                        </div>
                                        <!--end col-->
                                    </div>
                                </div>
                            </div>
                            <!--end row-->
                        </form>
                    </div>
                    <div class="card-body">
                        <div>
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
                                        @foreach($trips as $trip)
                                        <tr>
                                            <td class="customer_name">{{ $trip->title }}</td>
                                            <td class="email">{{ $trip->date }}</td>
                                            <td class="phone">{{ $trip->fromLocation->name }}</td>
                                            <td class="date">{{ $trip->toLocation->name }}</td>
                                            <td class="date">{{ $trip->bus->bus_name }}</td>
                                            <td class="status">{{ $trip->fare }}</td>
                                            <td class="status"><span class="badge bg-success-subtle text-success text-uppercase">{{ $trip->status }}</span></td>
                                            <td>
                                                <ul class="list-inline hstack gap-2 mb-0">
                                                    <li class="list-inline-item edit" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Edit">
                                                        <a href=""> <i class="ri-pencil-fill"></i></a>
                                                    </li>
                                                    <li class="list-inline-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Remove">
                                                        <a href="{{ url('/deleteTrip', $trip->id) }}" onclick="return confirm('Are you sure you want to delete this trip?')"><i class="ri-delete-bin-2-fill"></i></a>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                    @endforeach

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
                            <div class="d-flex justify-content-end">
                                <div class="pagination-wrap hstack gap-2">
                                    <a class="page-item pagination-prev disabled" href="#">
                                        Previous
                                    </a>
                                    <ul class="pagination listjs-pagination mb-0"></ul>
                                    <a class="page-item pagination-next" href="#">
                                        Next
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="showModal" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header bg-light p-3">
                                        <h5 class="modal-title" id="exampleModalLabel"></h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
                                    </div>
                                    <form class="tablelist-form" autocomplete="off" action="{{ '/store-trips' }}" method="POST">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label for="date-field" class="form-label">Date</label>
                                                <input type="date" name="date" id="date-field" class="form-control" required />
                                            </div>
                                            <div class="mb-3">
                                                <label for="title-field" class="form-label">Trips Title</label>
                                                <input type="text" name="title" id="title-field" class="form-control" required />
                                            </div>
                                            <div class="mb-3">
                                                <label for="from-location-field" class="form-label">From Location</label>
                                                <select class="form-select mb-3" name="from_location" id="from-location-field" aria-label="Default select example" required>
                                                    <option selected>Select From Location</option>
                                                    @foreach($locations as $location)
                                                    <option value="{{ $location->id }}">{{ $location->name }}</option>
                                                @endforeach
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="to-location-field" class="form-label">Destination</label>
                                                <select class="form-select mb-3" name="to_location" id="to-location-field" aria-label="Default select example" required>
                                                    <option selected>Select To Location</option>
                                                    @foreach($locations as $location)
                                                    <option value="{{ $location->id }}">{{ $location->name }}</option>
                                                @endforeach
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="bus-id-field" class="form-label">Bus Name</label>
                                                <select class="form-select mb-3" name="bus_id" id="bus-id-field" aria-label="Default select example" required>
                                                    <option selected>Select Bus ID</option>
                                                    @foreach($buses as $bus)
                                                    <option value="{{ $bus->id }}">{{ $bus->bus_name }}</option>
                                                @endforeach
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="fare-field" class="form-label">Fare</label>
                                                <input type="text" name="fare" id="fare-field" class="form-control" placeholder="Enter Fare Per Ticket" required />
                                            </div>
                                            <div class="mb-3">
                                                <label for="status-field" class="form-label">Status</label>
                                                <select class="form-control" data-choices data-choices-search-false name="status" id="status-field" required>
                                                    <option value="">Status</option>
                                                    <option value="active">Active</option>
                                                    <option value="inactive">In Active</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <div class="hstack gap-2 justify-content-end">
                                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-success" id="add-btn">Add Trip</button>
                                                <!-- Add button for updating if needed -->
                                            </div>
                                        </div>
                                    </form

                                </div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal -->
                        <div class="modal fade zoomIn" id="deleteRecordModal" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="btn-close" id="deleteRecord-close" data-bs-dismiss="modal" aria-label="Close" id="btn-close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mt-2 text-center">
                                            <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop" colors="primary:#25a0e2,secondary:#00bd9d" style="width:100px;height:100px"></lord-icon>
                                            <div class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">
                                                <h4>Are you sure ?</h4>
                                                <p class="text-muted mx-4 mb-0">Are you sure you want to
                                                    remove this record ?</p>
                                            </div>
                                        </div>
                                        <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                                            <button type="button" class="btn w-sm btn-light" data-bs-dismiss="modal">Close</button>
                                            <button type="button" class="btn w-sm btn-primary " id="delete-record">Yes, Delete It!</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end modal -->
                    </div>
                </div>

            </div>
            <!--end col-->
        </div>
        <!--end row-->

    </div>
    <!-- container-fluid -->
</div>
@endsection


<script>
    document.addEventListener('DOMContentLoaded', function () {
        const form = document.querySelector('.tablelist-form');
        const fromLocationField = document.getElementById('from-location-field');
        const toLocationField = document.getElementById('to-location-field');

        form.addEventListener('submit', function (event) {
            if (fromLocationField.value === toLocationField.value) {
                event.preventDefault();
                alert("From Location and Destination cannot be the same. Please select different locations.");
            }
        });
    });
</script>
