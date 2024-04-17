@extends('layouts.app')

@section('content')

<div class="container-scroller">
    <!-- partial:partials/_sidebar.html -->
    @include('layouts._partials.sidebar')
    <!-- partial -->
    <div class="container-fluid page-body-wrapper p-0">
        <!-- partial:partials/_navbar.html -->
        @include('layouts._partials.navtop')
        <!-- partial -->
        <div class="main-panel">

            <div class="content-wrapper">

                <div class="row">
                    <div class="col-md-12 grid-center stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <div class="position-absolute absolute-position">
                                    <a href="{{route('subgrupo.index')}}" class="btn btn-warning rounded-circle mdi mdi-keyboard-return" style="font-size: 24px">
                                    </a>
                                </div>
                               @component('app.subgrupo._components.form_create_edit', ['subgrupo'=>$subgrupo,'grupos'=>$grupos])
                               @endcomponent
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- content-wrapper ends -->
            <!-- partial:partials/_footer.html -->
            @include('layouts._partials.footer')
            <!-- partial -->
        </div>
        <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>

