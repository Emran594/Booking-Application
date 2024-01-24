@extends('layout.user-dashboard')
@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">BOOKING HISTORY</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Bookie</a></li>
                            <li class="breadcrumb-item active">BOOKING HISTORY</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <table class="table table-nowrap">
            <thead>
                <tr>
                    <th scope="col">Date</th>
                    <th scope="col">Trip Title</th>
                    <th scope="col">Number Of Seats</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($bookings as $booking)
                <tr>
                    <td>{{ $booking->created_at->format('F d, Y') }}</td>
                    <td>{{ $booking->trip->title }}</td>
                    <td>{{ count(json_decode($booking->booked_seats)) }}</td>
                    <td>{{ $booking->total_amount }}</td>
                    <td><a href="javascript:void(0);" class="link-success">View More <i class="ri-arrow-right-line align-middle"></i></a></td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
    <!-- container-fluid -->
</div>

@endsection


