@extends('layout.user-dashboard')
@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">BOOKING</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Bookie</a></li>
                            <li class="breadcrumb-item active">TRIPS</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-header border-bottom-dashed p-4">
            <div class="d-flex">
                <div class="flex-grow-1">
                    <img src="{{ asset("assets/images/logo-dark.png") }}" class="card-logo card-logo-dark" alt="logo dark" height="40">
                    <img src="{{ asset("assets/images/logo-light.png") }}" class="card-logo card-logo-light" alt="logo light" height="50">
                    <div class="mt-sm-5 mt-4">
                        <h6 class="text-muted text-uppercase fw-semibold">TRIP NAME: {{ $trip->title }}</h6>
                        <h6 class="text-muted text-uppercase fw-semibold">DRIVER NAME: {{ $trip->bus->driver_name }}</h6>
                        <h6 class="text-muted text-uppercase fw-semibold">DRIVER PHONE NO: {{ $trip->bus->phone }}</h6>
                    </div>
                </div>
                <div class="mt-sm-5 mt-4">
                    <h6 class="text-muted text-uppercase fw-semibold">BUS MODEL: {{ $trip->bus->bus_name }}</h6>
                    <h6 id="base_fare" class="text-muted text-uppercase fw-semibold">BUS FARE: {{ $trip->fare }}</h6>
                    <h6 class="text-muted text-uppercase fw-semibold">DESTINATION: {{ $trip->fromLocation->name }} TO {{ $trip->toLocation->name }}</h6>
                </div>
            </div>
        </div>

        <div class="card-body border-bottom-dashed border-bottom">
            <form action="{{ url('/confirm-booking') }}" method="POST" id="bookingForm">
                @csrf
                <div class="row g-3">
                    <div class="col-xl-6">
                        <input type="hidden" value="{{ $trip->id }}" name="trip_id">
                        {{-- <input type="hidden" value="{{ auth()->user()->id }}" name="user_id"> --}}
                        @foreach($trip->bus->seats as $seat)
                            <div class="form-check mb-3">
                                <input class="form-check-input seat-checkbox" type="checkbox" id="formCheck{{ $seat->id }}" name="selected_seats[]" value="{{ $seat->id }}">
                                <label class="form-check-label" for="formCheck{{ $seat->id }}">
                                    {{ $seat->name }}
                                </label>
                            </div>
                        @endforeach
                        <input type="text" value="" name="total_fare" id="total_fare" readonly>
                    </div>
                    <div class="input-group">
                        <div class="col-xl-6">
                            <button type="submit" class="btn btn-primary">Confirm Booking</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        
    </div>
    <!-- container-fluid -->
</div>


@endsection

<script>
    // Function to calculate total fare based on selected seats
    function calculateTotalFare() {
        var baseFare = parseFloat(document.getElementById('base_fare').value);
        var selectedSeats = document.querySelectorAll('.seat-checkbox:checked').length;

        var totalFare = baseFare * selectedSeats;

        // Update the total fare input field
        document.getElementById('total_fare').value = totalFare.toFixed(2);
    }

    // Attach the function to the change event of checkboxes
    var seatCheckboxes = document.querySelectorAll('.seat-checkbox');
    seatCheckboxes.forEach(function(checkbox) {
        checkbox.addEventListener('change', calculateTotalFare);
    });
</script>
