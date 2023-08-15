@extends('layouts.app')
@section('title', 'Attendace In')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 d-flex flex-column">
                <div class="row flex-grow" style="justify-content: center;">
                    <div class="col-6 grid-margin stretch-card">
                        <div class="card card-rounded">

                            <div class="card-body" style="text-align: center;">
                                <h4 class="card-title"> QR Code To Sign in</h4>

                                <form class="forms-sample" action="{{ route('attendance.store_signIn') }}" method="post">
                                    @csrf

                                    <input type="hidden" name="user_enter" value="{{ Auth::user()->name }}">

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="trainer_id"
                                                placeholder="Inter Your QR Code">
                                        </div>
                                    </div>

                                    <input type="hidden" name="date_in">


                                    <div class="d-sm-flex justify-content-center">
                                        <div>
                                            <button type="submit" class="btn btn-primary me-2">Submit</button>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




@endsection
@section('scripts')
    <script>
        function generateRandomNumber() {
            var randomNumber = Math.floor(Math.random() * 100000000);
            var formattedNumber = randomNumber.toString().padStart(8, '0');
            document.getElementById('QR_code').value = formattedNumber;
        }
    </script>
@endsection
