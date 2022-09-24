@include('site/parts/header')

<div class="bg-light py-3">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-0"><a href="{{route('home')}}">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Categories</strong></div>
        </div>
    </div>
</div>

<div class="site-section">
    <div class="container">

        <div class="row mb-5">
                <div class="row mb-5">
                    @foreach($categories as $category)
                    <div class="col-sm-6 col-lg-4 mb-4" data-aos="fade-up">
                        <div class="block-4 text-center border">
                            <div class="block-4-text p-4">
                                <h3><a href="{{route('show.category', $category)}}">{{$category->name}}</a></h3>
                                <p class="mb-0">{{$category->description}}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach




                </div>

            </div>



@include('site/parts/footer')
