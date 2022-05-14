<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <link rel="shortcut icon" href="http://thevectorlab.net/flatlab/img/favicon.png">

    <title> @yield('title')Faisal Restaurant</title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('backend')}}/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{asset('backend')}}/css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="{{asset('backend')}}/assets/font-awesome/css/font-awesome.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="{{asset('backend')}}/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet"
          type="text/css" media="screen"/>
    <link rel="stylesheet" href="{{asset('backend')}}/css/owl.carousel.css" type="text/css">

    <!--right slidebar-->
    <link href="{{asset('backend')}}/css/slidebars.css" rel="stylesheet">

    <!-- Custom styles for this template -->

    <link href="{{asset('backend')}}/css/style.css" rel="stylesheet">
    <link href="{{asset('backend')}}/css/style-responsive.css" rel="stylesheet"/>

{{--    toastr--}}
    <link rel="stylesheet" href="{{asset('backend')}}/toastr/toastr.min.css">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->

      <script src="{{asset('backend')}}/js/html5shiv.js"></script>
      <script src="{{asset('backend')}}/js/respond.min.js"></script>

    @stack('admin_need_css')
</head>

<body>
<section id="container">
    <!--header start-->
    <header class="header white-bg">
        @include('backend.layout.partials.header')

    </header>
    <!--header end-->
    <!--sidebar start-->
    <aside>
        @include('backend.layout.partials.siteber')
    </aside>
    <!--sidebar end-->
    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
            @yield('content')
        </section>

    </section>
    <!--main content end-->


    <!--footer start-->
    <footer class="site-footer">
        @include('backend.layout.partials.footer')

    </footer>
    <!--footer end-->
</section>
<!-- js placed at the end of the document so the pages load faster -->
<script src="{{asset('backend')}}/js/jquery.js"></script>
<script src="{{asset('backend')}}/js/bootstrap.min.js"></script>
<script class="include" type="text/javascript" src="{{asset('backend')}}/js/jquery.dcjqaccordion.2.7.js"></script>
<script src="{{asset('backend')}}/js/jquery.scrollTo.min.js"></script>
<script src="{{asset('backend')}}/js/jquery.nicescroll.js" type="text/javascript"></script>
<script src="{{asset('backend')}}/js/jquery.sparkline.js" type="text/javascript"></script>
<script src="{{asset('backend')}}/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
<script src="{{asset('backend')}}/js/owl.carousel.js"></script>
<script src="{{asset('backend')}}/js/jquery.customSelect.min.js"></script>
<script src="{{asset('backend')}}/js/respond.min.js"></script>

<!--right slidebar-->
<script src="{{asset('backend')}}/js/slidebars.min.js"></script>

<!--common script for all pages-->
<script src="{{asset('backend')}}/js/common-scripts.js"></script>

<!--script for this page-->
<script src="{{asset('backend')}}/js/sparkline-chart.js"></script>
<script src="{{asset('backend')}}/js/easy-pie-chart.js"></script>
<script src="{{asset('backend')}}/js/count.js"></script>

<script>

    //owl carousel

    $(document).ready(function () {
        $("#owl-demo").owlCarousel({
            navigation: true,
            slideSpeed: 300,
            paginationSpeed: 400,
            singleItem: true,
            autoPlay: true

        });
    });

    //custom select box

    $(function () {
        $('select.styled').customSelect();
    });

    $(window).on("resize", function () {
        var owl = $("#owl-demo").data("owlCarousel");
        owl.reinit();
    });

</script>

<!-- Toastr -->
<script src="{{asset('backend')}}/toastr/toastr.min.js"></script>
<script>
    @if(Session::has('message'))
    var type = "{{Session::get('alert-type','info')}}"

    switch (type) {
        case 'info':
            toastr.info("{{ Session::get('message') }}");
            break;
        case 'success':
            toastr.success("{{ Session::get('message') }}");
            break;
        case 'warning':
            toastr.warning("{{ Session::get('message') }}");
            break;
        case 'error':
            toastr.error("{{ Session::get('message') }}");
            break;
    }
    @endif
</script>
<!-- Toastr -->

@stack('admin_need_js')
</body>
</html>
