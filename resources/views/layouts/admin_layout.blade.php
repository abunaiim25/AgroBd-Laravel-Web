{{-- admin --}}
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>
        @yield('title')
    </title>

    <link rel="stylesheet" href="{{ asset('admin') }}/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="{{ asset('admin') }}/assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="{{ asset('admin') }}/assets/vendors/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="{{ asset('admin') }}/assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="{{ asset('admin') }}/assets/vendors/owl-carousel-2/owl.carousel.min.css">
    <link rel="stylesheet" href="{{ asset('admin') }}/assets/vendors/owl-carousel-2/owl.theme.default.min.css">
    <link rel="stylesheet" href="{{ asset('admin') }}/assets/css/style.css">

    @php
        $front = App\Models\FrontControl::first();
    @endphp
    <link rel="shortcut icon" href="{{ asset('img_DB/front/logo/' . $front->logo_small) }}" alt="" />


    <link rel="stylesheet" href="{{ asset('admin') }}/assets/css/admin.css">
    <!--font awesome cdn link-->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
         <!--new font awesome cdn link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>
    <div class="container-scroller">

        @include('layouts.admin_inc.sidebar')

        <div class="container-fluid page-body-wrapper">

            @include('layouts.admin_inc.navbar')

            <div class="main-panel " style="background: #1e273b">

                @yield('admin_content')
                {{-- @include('layouts.admin_inc.footer') --}}
            </div>
        </div>
    </div>




    <script>
        $(function() {
            'use strict';

            $('#datatable1').DataTable({
                responsive: true,
                language: {
                    searchPlaceholder: 'Search...',
                    sSearch: '',
                    lengthMenu: '_MENU_ items/page',
                }
            });

            $('#datatable2').DataTable({
                bLengthChange: false,
                searching: false,
                responsive: true
            });

            // Select2
            $('.dataTables_length select').select2({
                minimumResultsForSearch: Infinity
            });

        });
    </script>

    <script src="{{ asset('admin') }}/myadmin/main.js"></script>
    <script src="{{ asset('admin') }}/assets/vendors/js/vendor.bundle.base.js"></script>
    <script src="{{ asset('admin') }}/assets/vendors/chart.js/Chart.min.js"></script>
    <script src="{{ asset('admin') }}/assets/vendors/progressbar.js/progressbar.min.js"></script>
    <script src="{{ asset('admin') }}/assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
    <script src="{{ asset('admin') }}/assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="{{ asset('admin') }}/assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>
    <script src="{{ asset('admin') }}/assets/js/off-canvas.js"></script>
    <script src="{{ asset('admin') }}/assets/js/hoverable-collapse.js"></script>
    <script src="{{ asset('admin') }}/assets/js/misc.js"></script>
    <script src="{{ asset('admin') }}/assets/js/settings.js"></script>
    <script src="{{ asset('admin') }}/assets/js/todolist.js"></script>
    <script src="{{ asset('admin') }}/assets/js/dashboard.js"></script>


    <script src="{{ asset('admin') }}/assets/lib/medium-editor/medium-editor.js"></script>
    <script src="{{ asset('admin') }}/assets/lib/summernote/summernote-bs4.min.js"></script>


    <!--https://sweetalert.js.org/guides/-->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    @if (session('status_swal'))
        <script>
            swal("{{ session('status_swal') }}");
        </script>
    @endif



</body>

</html>
