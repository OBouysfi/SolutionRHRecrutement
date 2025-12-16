@extends('layouts.master')

@section('title', 'HumanJobs - Liste des évaluateurs')

@section('css_header')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.min.js"></script>
@endsection


@section('content')
<main class="main mainheight">


 <!-- content -->
 <div class="container mt-4">
     

        <div class="row mb-5 justify-content-center">
            <div class="col-12">
                <div class="card border-0"  >
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="card border-0 " style="padding: 10px 20px;">
                                    <div class="card-header ">
                                        <div class="row align-items-center">

                                            <div class="col">
                                                <h5>Liste des évaluateurs</h5>
                                            </div>
                                            <div class="col col-sm-auto">
                                                <div class="input-group input-group-md">
                                                    <input type="text" class="form-control bg-none px-0" value="" id="titlecalendar" style="background-color: transparent !important;"/>
                                                    <span style="background-color: transparent !important;" class="input-group-text text-secondary bg-none" id="titlecalandershow"><i class="bi bi-calendar-event"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-12" style="overflow: hidden;overflow-x: scroll;">
                                                <table class="table offres-table" data-show-toggle="true" id="evaluatorTable">
                                                    <thead style="font-size: 13px;border-top: 1px solid #e9e9e9;">
                                                        <tr>
                                                            <th style="font-weight: 600;">Action</th>
                                                            <th style="font-weight: 600;">#</th>
                                                            <th style="font-weight: 600;">Nom de l’évaluateur</th>
                                                            <th style="font-weight: 600;">Prénom de l’évaluateur</th>
                                                            <th style="font-weight: 600;">Profession</th>
                                                            <th style="font-weight: 600;">Client</th>
                                                            <th style="font-weight: 600;">Entreprise</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody style="font-size: 13px; vertical-align: middle;"></tbody>
                                                </table>
                                            </div>
                                        </div>

                                        <div class="row align-items-center mx-0 mb-3">
                                            <div class="col-6 ">

                                            </div>
                                            <div class="col-6 footable-paging-external footable-paging-right" id="footable-pagination">
                                                <div class="footable-pagination-wrapper"><ul class="pagination"><li class="footable-page-nav disabled" data-page="first"><a class="footable-page-link" href="#">«</a></li><li class="footable-page-nav disabled" data-page="prev"><a class="footable-page-link" href="#">‹</a></li><li class="footable-page visible active" data-page="1"><a class="footable-page-link" href="#">1</a></li><li class="footable-page visible" data-page="2"><a class="footable-page-link" href="#">2</a></li><li class="footable-page-nav" data-page="next"><a class="footable-page-link" href="#">›</a></li><li class="footable-page-nav" data-page="last"><a class="footable-page-link" href="#">»</a></li></ul><div class="divider"></div><span class="label label-default">1 sur 2</span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</main>
@endSection

@section('js_footer')
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
<script src="{{ asset('assets/js/client/listing.js') }}"></script>
<script>
    var evaluatorListingData = "{{ route('api.evaluator.client.listing.data') }}";
    var ApiClientDeleteEvaluator = "{{ route('api.evaluator.delete', ['evaluatorId' => 'evaluatorId']) }}";

</script>

@vite(['resources/js/evaluator/listing.js'])

@endsection