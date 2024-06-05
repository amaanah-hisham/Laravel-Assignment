@extends('layouts.base')

@section('content')
    <div class="container">
        <div class="row my-5">
            <div class="col-md-8 offset-md-2 text-center">
                <p class="text-muted">Your one-stop destination for renting and renting out electronic products! Whether you're a renter looking to generate passive income or a rentee searching for high-quality and affordable gadgets, we've got you covered. Explore our platform to discover the advantages for both renters and rentees. Get Strated !!</p>
            </div>

        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="card mb-4">
                    <img src="{{ asset('assets/imgs/slider/renter.jpg') }}" class="card-img-top" alt="Renter Image">
                    <div class="card-body">
                        <h5 class="card-title">Advantages for Renters</h5>
                        <ul>
                            <li>Generate passive income by listing your electronic products for rent.</li>
                            <li>Reach a wide audience of potential customers looking to rent electronic items.</li>
                            <li>Control rental terms, pricing, and availability of your products.</li>
                            <li>Gain exposure for your brand and build customer trust through positive rental experiences.</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card mb-4">
                    <img src="{{ asset('assets/imgs/slider/rentee.jpg') }}" class="card-img-top" alt="Rentee Image">
                    <div class="card-body">
                        <h5 class="card-title">Advantages for Rentees</h5>
                        <ul>
                            <li>Access a wide range of high-quality electronic products for rent at affordable prices.</li>
                            <li>Save money by renting items for short-term use instead of purchasing them outright.</li>
                            <li>Try out different electronic gadgets and devices before making a purchase decision.</li>
                            <li>Convenient online platform for browsing, booking, and managing rental orders.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div style="margin-top: 40px; margin-bottom: 40px;">
        <!-- Your content goes here -->
    </div>

@endsection
