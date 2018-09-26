@extends('layouts.frontend')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Bounties</div>

                <div class="card-body text-center">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="under-construction">
                        <i class="fa fa-exclamation-triangle fa-red fa-2x"></i>
                        <h2 style="position: relative; top: -2px;">Currently In Development</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
