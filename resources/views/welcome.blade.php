@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="loader" style="display: none;"></div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Product listing</div>
                    <div class="card-body">
                        @if(Session::has('message'))
                            <div class="alert-success">{{ Session::get('message') }}</div>
                        @endif

                        <form method="GET" action="/products/filter" class="filter-products">
                            <div class="form-group row">
                                <div class="col-4">
                                    <input type="search" placeholder="Search..." name="name" class="form-control"/>
                                </div>
                            </div>
                        </form>
                        <div class="product-table">
                            @include('products/table')
                        </div>
                    </div>
                </div>
            </div>
        </div>
  </div>
@endsection

@section('js')
    <script>
        $(document).ready(function(){

            //filter($('.filter-products'));

            $(document).ajaxStart(function() {
                $(".loader").show();
            }).ajaxStop(function() {
                $(".loader").hide();
            });

            // $(document).on('click', '.pagination .page-link',function(event)
            // {
            //     event.preventDefault();

            //     $('.page-item').removeClass('active');
            //     $(this).parent('.page-item').addClass('active');
            //     var url = $(this).attr('href');
            //     var page=$(this).attr('href').split('page=')[1];
            //     filter($('.filter-products'), page);
            // });

            var productsFilter = $('.filter-products').find('.form-control');

            productsFilter.on('change keyup', function (event) {
                if(event.keyCode != 13){
                    setTimeout(function () {
                        filter($('.filter-products'));
                    }, 3000);
                }

            });
            $('.filter-products').on('submit', function (event) {
                event.preventDefault();
            });
        });
        var filter = function (filterElement, pageNumber) {
            if(pageNumber)
                var pageUrl = '?page=' + pageNumber
            else
                var pageUrl = '';

            // $.ajax({
            //     type: "POST",
            //     data: filterElement.serialize(),
            //     url: filterElement.attr('action') + pageUrl ,
            //     success: function(response){
            //         $('.product-table').html(response.products);
            //     }
            // });

            $.get({
                //data: filterElement.serialize(),
                url: filterElement.attr('action') + pageUrl + '?' + filterElement.serialize(),
                success: function(response){
                    $('.product-table').html(response.products);
                }
            });
        }
    </script>
@endsection
