

<style>

    .h1, .h2, .h3, .h4, .h5, .h6, h1, h2, h3, h4, h5, h6 {
        color: #2f3044;
        font-weight: 500;
        line-height: 1.2;
        margin-bottom: 0.5rem;
    }


    .row {
        display: flex;
        flex-wrap: wrap;
        margin-left: -10px;
        margin-right: -10px;
    }

    .col-6 {
        flex: 0 0 50%;
        max-width: 50%;
        padding-left: 10px;
        padding-right: 10px;
        position: relative;
        width: 100%;
    }


    .d-flex {
        display: flex!important;
    }
    .flex-column {
        flex-direction: column!important;
    }


    .bgi-position-y-top {
        background-position-y: top;
    }
    .bgi-position-x-center {
        background-position-x: center;
    }
    .bgi-no-repeat {
        background-repeat: no-repeat;
    }
    .bgi-size-cover {
        background-size: cover;
    }


    .h-150px {
        height: 150px!important;
    }






    .font-size-4 {
        font-size: 1rem!important;
    }
    .font-size-3 {
        font-size: .8rem!important;
    }



    .block-dark {
        background-color: #0d151e;
    }
    .dark-top-curved-bg {
        background-image: url('https://keenthemes.com/images/misc/curve-dark-top-bg.png');
    }

    .text-muted, .text-muted i {
        color: #b5b5c3!important;
    }
    .text-dark-60 {
        color: #7e8299!important;
    }
    .page_speed_560018307 {
        border-top: 1px solid #152231;
    }
    .h-20px {
        height: 20px!important;
    }
    .mr-2, .mx-2 {
        margin-right: 0.5rem!important;
    }
    .rounded-sm {
        border-radius: 0.25rem!important;
    }

    .w-20px {
        width: 20px!important;
    }
    .mr-4, .mx-4 {
        margin-right: 1rem!important;
    }



    @media (min-width: 992px)
    {
        .col-lg {
            flex-basis: 0;
            flex-grow: 1;
            max-width: 100%;
        }
        .pb-lg-3, .py-lg-3 {
            padding-bottom: 0.75rem!important;
        }
        .h-lg-225px {
            height: 225px!important;
        }
    }
</style>
<footer class="footer block-dark mt-n15 mt-lg-n30">

    <div class="h-150px h-lg-225px bgi-no-repeat bgi-position-x-center bgi-position-y-top bgi-size-cover dark-top-curved-bg"></div>

    <div class="container mt-n15">
        <div class="row">
            <div class="col-6 col-lg">
                <div class="pb-10">
                    <h3 class="text-muted mb-5 mb-lg-7 font-size-4">Our Items</h3>

                    <div class="d-flex flex-column font-size-3 font-weight-bold">
                        @foreach($categories as $category)

                        <a href="#" class="text-dark-60 text-hover-primary py-2 py-lg-3">{{$category->restaurant_food_category_name}}</a>
                        @endforeach

                    </div>
                </div>
            </div>

            <div class="col-6 col-lg">
                <div class="pb-10">
                    <h3 class="text-muted mb-5 mb-lg-7 font-size-4"> New Items </h3>

                    <div class="d-flex flex-column font-size-3 font-weight-bold">
                        @foreach($categories as $category)

                            <a href="#" class="text-dark-60 text-hover-primary py-2 py-lg-3">{{$category->restaurant_food_category_name}}</a>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="col-6 col-lg">
                <div class="pb-10">
                    <h3 class="text-muted mb-5 mb-lg-7 font-size-4"> Most Popular Items</h3>

                    @foreach($categories as $category)

                        <a href="#" class="text-dark-60 text-hover-primary py-2 py-lg-3">{{$category->restaurant_food_category_name}}</a>
                    @endforeach
                </div>
            </div>

            <div class="col-6 col-lg">
                <div class="pb-10">
                    <h3 class="text-muted mb-5 mb-lg-7 font-size-4">For You</h3>

                    @foreach($categories as $category)

                        <a href="#" class="text-dark-60 text-hover-primary py-2 py-lg-3">{{$category->restaurant_food_category_name}}</a>
                    @endforeach
                </div>
            </div>

            <div class="col-6 col-lg">
                <div class="pb-10">
                    <h3 class="text-muted mb-5 mb-lg-7 font-size-4">Stay Connected</h3>

                    <div class="d-flex flex-column font-size-3 font-weight-bold">
                        <a href="https://developer6669.com" class="d-flex align-items-center text-center text-dark-60 text-hover-primary py-2 py-lg-3">
                            <img src="https://developer6669.com/Projects/assets/images/icons/social-media/facebook.svg" data-lazy-src="https://developer6669.com/Projects/assets/images/icons/social-media/facebook.svg" class="w-20px mr-4 loaded" alt="">
                            Facebook
                        </a>
                        <a href="https://developer6669.com" class="d-flex align-items-center text-center text-dark-60 text-hover-primary py-2 py-lg-3">
                            <img src="https://developer6669.com/Projects/assets/images/icons/social-media/twitter.svg" data-lazy-src="https://developer6669.com/Projects/assets/images/icons/social-media/twitter.svg" class="w-20px mr-4 loaded" alt="">
                            Twitter
                        </a>
                        <a href="https://developer6669.com" class="d-flex align-items-center text-center text-dark-60 text-hover-primary py-2 py-lg-3">
                            <img src="https://developer6669.com/Projects/assets/images/icons/social-media/instagram.svg" class="w-20px mr-4 loaded"  data-lazy-src="https://developer6669.com/Projects/assets/images/icons/social-media/instagram.svg" alt="">
                            Instagram
                        </a>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="page_speed_247610277"></div>

    <div class="container py-5 py-lg-10">
        <div class="d-flex flex-column flex-md-row align-items-center justify-content-center justify-content-md-between">
            <div class="d-flex align-items-center mr-md-2 order-2 order-md-1">

{{--                <a href="https://developer6669.com" class="mr-3 mr-md-6">--}}
{{--                    <img alt="logo" src="https://developer6669.com/Projects/assets/images/logo/developer6669.png" class="h-20px h-md-25px">--}}
{{--                </a>--}}

                <span class="font-size-2 font-weight-bold text-dark-60 pt-1" href="">
						© 2022  Developer Faisal Ahmmed
					</span>

            </div>

        </div>
    </div>
</footer>
