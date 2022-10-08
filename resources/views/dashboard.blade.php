@extends('layouts.back')
@section('content')
<div class="content-body">
    <section>
        <div class="row">
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-content">
                          <div class="p-2 bg-gradient-x-primary white media-body">
                            <h2 class="text-bold">Users</h2>
                            <p class="text-bold mb-0">{{ $users }}</p>
                          </div>
                      </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-content">
                          <div class="p-2 bg-gradient-x-primary white media-body">
                            <h2 class="text-bold">Taxi</h2>
                            <p class="text-bold mb-0">{{ $taxi }}</p>
                          </div>
                      </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-content">
                          <div class="p-2 bg-gradient-x-primary white media-body">
                            <h2 class="text-bold">Saipan</h2>
                            <p class="text-bold mb-0">{{ $saipan }}</p>
                          </div>
                      </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-content">
                          <div class="p-2 bg-gradient-x-primary white media-body">
                            <h2 class="text-bold">Pick up location</h2>
                            <p class="text-bold mb-0">{{ $pickUp }}</p>
                          </div>
                      </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-content">
                          <div class="p-2 bg-gradient-x-primary white media-body">
                            <h2 class="text-bold">Drop off location</h2>
                            <p class="text-bold mb-0">{{ $dropOff }}</p>
                          </div>
                      </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-content">
                          <div class="p-2 bg-gradient-x-primary white media-body">
                            <h2 class="text-bold">Taxi order today</h2>
                            <p class="text-bold mb-0">{{ $todayTaxiOrder }}</p>
                          </div>
                      </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-content">
                          <div class="p-2 bg-gradient-x-primary white media-body">
                            <h2 class="text-bold">Saipan order today</h2>
                            <p class="text-bold mb-0">{{ $todaySaipanOrder }}</p>
                          </div>
                      </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-content">
                          <div class="p-2 bg-gradient-x-primary white media-body">
                            <h2 class="text-bold">All taxi order</h2>
                            <p class="text-bold mb-0">{{ $totalTaxiOrder }}</p>
                          </div>
                      </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-content">
                          <div class="p-2 bg-gradient-x-primary white media-body">
                            <h2 class="text-bold">All saipan order</h2>
                            <p class="text-bold mb-0">{{ $totalSaipanOrder }}</p>
                          </div>
                      </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
