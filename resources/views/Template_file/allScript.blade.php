<script src="{{asset('template_asset/app-assets/vendors/js/vendors.min.js')}}"></script>
<script src="{{asset('template_asset/app-assets/vendors/js/charts/raphael-min.js')}}"></script>
<script src="{{asset('template_asset/app-assets/vendors/js/charts/morris.min.js')}}"></script>
<script src="{{asset('template_asset/app-assets/vendors/js/extensions/unslider-min.js')}}"></script>
<script src="{{asset('template_asset/app-assets/vendors/js/timeline/horizontal-timeline.js')}}"></script>
<script src="{{asset('template_asset/app-assets/vendors/js/tables/datatable/datatables.min.js')}}"></script>
<script src="{{asset('template_asset/app-assets/js/core/app-menu.js')}}"></script>
<script src="{{asset('template_asset/app-assets/js/core/app.js')}}"></script>
<script src="{{asset('template_asset/app-assets/js/scripts/customizer.js')}}"></script>
<script src="{{asset('template_asset/app-assets/js/scripts/tables/datatables/datatable-basic.js')}}"></script>
<script src="{{asset('template_asset/app-assets/js/scripts/pages/dashboard-ecommerce.js')}}"></script>
<script src="{{asset('template_asset/app-assets/vendors/js/forms/icheck/icheck.min.js')}}"></script>
<script src="{{asset('template_asset/app-assets/vendors/js/forms/validation/jqBootstrapValidation.js')}}"></script>
<script src="{{asset('template_asset/app-assets/js/scripts/forms/form-login-register.js')}}"></script>
<script src="{{asset('template_asset/app-assets/js/scripts/modal/components-modal.js')}}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-bs4.js"></script>

<script>
    $(document).ready(function () {
        $('#product_details').summernote({
            placeholder: 'Add Some Notes Here',
            tabsize: 2,
            height: 300
        });

        $(".modal").on("hidden.bs.modal", function () {
            $(".modal-body input").val("");
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