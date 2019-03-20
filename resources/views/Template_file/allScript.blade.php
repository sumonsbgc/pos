<script src="{{asset('template_asset/app-assets/vendors/js/vendors.min.js')}}"></script>
<script src="{{asset('template_asset/app-assets/vendors/js/tables/datatable/datatables.min.js')}}"></script>
<script src="{{asset('template_asset/app-assets/vendors/js/tables/datatable/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('template_asset/app-assets/vendors/js/charts/raphael-min.js')}}"></script>
<script src="{{asset('template_asset/app-assets/vendors/js/charts/morris.min.js')}}"></script>
<script src="{{asset('template_asset/app-assets/vendors/js/extensions/unslider-min.js')}}"></script>
<script src="{{asset('template_asset/app-assets/vendors/js/timeline/horizontal-timeline.js')}}"></script>
<script src="{{asset('template_asset/app-assets/vendors/js/extensions/sweetalert.min.js')}}"></script>

<script src="{{asset('template_asset/app-assets/js/core/app-menu.js')}}"></script>
<script src="{{asset('template_asset/app-assets/js/core/app.js')}}"></script>
<script src="{{asset('template_asset/app-assets/js/scripts/customizer.js')}}"></script>
<script src="{{asset('template_asset/app-assets/js/scripts/tables/datatables/datatable-basic.js')}}"></script>
<script src="{{asset('template_asset/app-assets/js/scripts/pages/dashboard-ecommerce.js')}}"></script>
<script src="{{asset('template_asset/app-assets/vendors/js/forms/icheck/icheck.min.js')}}"></script>
<script src="{{asset('template_asset/app-assets/vendors/js/forms/validation/jqBootstrapValidation.js')}}"></script>
<script src="{{asset('template_asset/app-assets/js/scripts/forms/form-login-register.js')}}"></script>
<script src="{{asset('template_asset/app-assets/js/scripts/modal/components-modal.js')}}"></script>
<script src="{{asset('template_asset/app-assets/vendors/js/forms/select/select2.full.min.js')}}"></script>
<script src="{{asset('template_asset/app-assets/js/scripts/forms/select/form-select2.js')}}"></script>
<script src="{{asset('template_asset/app-assets/vendors/js/forms/repeater/jquery.repeater.min.js')}}"></script>
<script src="{{asset('template_asset/app-assets/js/scripts/forms/form-repeater.js')}}"></script>
<script src="{{asset('template_asset/app-assets/js/scripts/extensions/sweet-alerts.js')}}"></script>

<script src="{{asset('template_asset/app-assets/vendors/js/forms/extended/inputmask/jquery.inputmask.bundle.min.js')}}"></script>
<script src="{{asset('template_asset/app-assets/js/scripts/forms/extended/form-inputmask.js')}}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-bs4.js"></script>

<script>
    $(document).ready(function () {
        $('#product_details').summernote({
            placeholder: 'Add Some Notes Here',
            tabsize: 2,
            height: 300
        });
        // table = $('#example').DataTable();
        // table.column(1).data().unique();
    });
</script>


<script>

    function goToSubCategory(value) {
        var parentsCategory = value;
        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url: "{{url('/finding_sub_categories')}}" + "/" + parentsCategory,
            type: 'POST',
            success: function (response) {
                $("#subCategory").html(response[0]);
                $("#product_brand").html(response[1]);

                console.log(response)
            },

        })
    }

    function goToBrands(value) {

        var Category = value;

        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url: "{{url('/finding_brands')}}" + "/" + Category,
            type: 'POST',
            success: function (response) {
                $("#product_brand").html(response);
            },
        })


    }





</script>
<script>
    $(document).ready(function(){
        $.ajax({
            url: "http://localhost/chartjs/data.php",
            method: "GET",
            success: function(data) {
                console.log(data);
                var player = [];
                var score = [];

                for(var i in data) {
                    player.push("Player " + data[i].playerid);
                    score.push(data[i].score);
                }

                var chartdata = {
                    labels: player,
                    datasets : [
                        {
                            label: 'Player Score',
                            backgroundColor: 'rgba(200, 200, 200, 0.75)',
                            borderColor: 'rgba(200, 200, 200, 0.75)',
                            hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
                            hoverBorderColor: 'rgba(200, 200, 200, 1)',
                            data: score
                        }
                    ]
                };

                var ctx = $("#mycanvas");

                var barGraph = new Chart(ctx, {
                    type: 'bar',
                    data: chartdata
                });
            },
            error: function(data) {
                console.log(data);
            }
        });
    });
</script>