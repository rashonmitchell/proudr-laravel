@extends('layouts.app')

@section('content')
    <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">

        <div class="container mx-auto py-16">

        <!-- row -->
        <h1 class="text-3xl pb-8">Latest jobs</h1>
        <!-- row -->

        @if(!empty($titles))
        <!-- row -->
        <div class="grid md:grid-cols-3 sm:grid-cols-1 gap-4 ">
            @foreach($titles as $key => $title)
            <!-- Start div -->
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="https://via.placeholder.com/150/gray/FFFFFF/?Text=Proudr" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-header bg-transparent border-0">
                            <button type="button" class="btn close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{$title}}</h5>
                            <p class="card-text text-gray-700 text-base">{{isset($location[$key]) ? $location[$key] : 'N/A'}}</p>
                            <p class="card-text">
                                @if(isset($tags[$key]))
                                    @foreach($tags[$key] as $tag)
                                        <span class="text-muted inline-block bg-gray-200 rounded-full px-3 py-1 text-xs font-semibold text-gray-700 {{$loop->last ? '' : 'my-2 mr-2'}}">{{$tag['text']}}</span>
                                    @endforeach
                                @endif
                            </p>
                        </div>
                        <small class="text-muted text-gray-700 text-sm"> {{isset($time[$key]) ? $time[$key] : ''}}</small>
                    </div>
                </div>
                <div class="card-footer text-muted bg-transparent">
                    <span style="border-radius:60%; border:solid red 1px;padding:5px">keywords</span>
                    <button type="button" class="btn-danger close" data-dismiss="alert" aria-label="Add">
                        <span aria-hidden="true">+</span>
                    </button>
                </div>
            </div>
            <!-- End div -->
            @endforeach
        </div>
        <!-- end of row -->
        @endif

    </div>
    <!-- container -->
    </div>
@endsection