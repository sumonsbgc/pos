@extends('Template_file.master')

@section('title','Sales Entry')

@section('content')

    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a>
                                </li>
                                <li class="breadcrumb-item active"><a href="#">Sales Entry</a>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @php
                            $id=0;
                        @endphp
                        @foreach ($errors->all() as $error)
                            @php
                                $id++;
                            @endphp
                            <li>{{$id}}.{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="content-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Borderless table</h4>
                                <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                        <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                        <li><a data-action="close"><i class="ft-x"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-content">
                                <div class="card-body">

                                    <form action="{{route('sale_store')}}" method="post">
                                        @csrf
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <div class="text-bold-600 font-medium-2">
                                                    Single Placeholder
                                                </div>
                                                <select class="select2-placeholder form-control" id="single-placeholder" onchange="pullProduct(this.value)">
                                                    <option value="#">Select Or Search Product</option>

                                                    @foreach($products as $product)
                                                        <option value="{{$product->id}}"
                                                                style="border-bottom: 1px dotted #ccc">
                                                            <p>{{$product->product_name}}</p>
                                                            <p>{{$product->product_description}}</p>
                                                            <p>; Color : {{$product->color}}</p>
                                                            @if($product->product_imei != null)
                                                                <p>; IMEI : {{$product->product_imei}}</p>
                                                            @endif
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <div class="table-responsive">
                                                    <table class="table  mb-0">
                                                        <thead>
                                                        <tr class="border-solid">
                                                            <th>Product Name</th>
                                                            <th>Description</th>
                                                            <th>Quantity</th>
                                                            <th>Price</th>
                                                            <th>Total Price</th>
                                                            <th></th>
                                                        </tr>
                                                        </thead>
                                                        <tbody id="t-body" class="product-list">
                                                        </tbody>
                                                    </table>
                                                    <table class="table  mb-0">
                                                        <tr class="border-solid">
                                                            <th class="text-bold-700 text-right" width="85%">Total
                                                                Amount
                                                            </th>
                                                            <th id="total_amount" class="text-bold-700 text-left"
                                                                width="15%"></th>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Customer Name</label>
                                                <input type="text" name="customer_name" id="customer_name" class="form-control" onkeyup="get_customer_data()">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Customer Contact No</label>
                                                <input type="text" name="customer_contact_no" id="customer_contact_no" class="form-control" onkeyup="get_customer_data()">
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label>Customer Address</label>
                                                <textarea type="text" id="customer_add" name="customer_add"
                                                          class="form-control" onkeyup="get_customer_data()"></textarea>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-12 text-right">
                                                <button type="button" class="btn btn-danger text-bold-700" data-toggle="modal" data-target="#by_bkash" onclick="this_total()">By bKash</button>
                                                <button type="button" class="btn btn-primary text-bold-700" data-toggle="modal" data-target="#by_cash" onclick="this_total()">By Cash</button>
                                            </div>
                                        </div>

                                        <div class="modal fade" id="by_bkash" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">By B-Kash</h5>

                                                    </div>
                                                    <div class="modal-body">

                                                        <div class="form-group">
                                                            <input type="text" placeholder="Transction Id" value="" name="transaction_id" class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Paid</label>
                                                            <input type="text" id="receive_amount" placeholder="receive_amount" value="" name="receive_amount" class="form-control" onkeyup="paid(this.value)">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Due</label>
                                                            <input type="text" id="due" placeholder="" value="" name="due_amount" class="form-control">
                                                        </div>
                                                        <div class="or display-hidden" id="or1">
                                                            <div class="form-group">
                                                                <label>Select Customer</label>
                                                                <select type="select" id="customer_id" placeholder="" value="" name="customer_id" class="form-control">
                                                                    @foreach($customers as $customer)
                                                                        <option value="{{$customer->id}}">{{$customer->customer_name}}</option>
                                                                    @endforeach

                                                                </select>
                                                            </div>

                                                            <h5>Or Create Customer</h5>

                                                            <div class="form-group">
                                                                <label>Customer Name</label>
                                                                <input type="text" placeholder="" value="" name="customer_name" class="form-control">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Customer Mobile No</label>
                                                                <input type="text" placeholder="" value="" name="mobile_no" class="form-control">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Customer Phone No</label>
                                                                <input type="text" placeholder="" value="" name="phone_no" class="form-control">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Customer Mail</label>
                                                                <input type="text" placeholder="" value="" name="mail" class="form-control">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Customer Address</label>
                                                                <textarea class="form-control" name="address"></textarea>
                                                            </div>
                                                        </div>

                                                        <button type="button" class="btn btn-secondary " data-dismiss="modal">Close</button>
                                                        <button class="btn btn-primary" type="submit"><strong>SELL</strong></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="modal fade" id="by_cash" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">By Cash</h5>

                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label>Paid</label>
                                                            <input type="text" id="receive_amount_1" placeholder="receive_amount" value="" name="receive_amount" class="form-control" onkeyup="paid(this.value)">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Due</label>
                                                            <input type="text" id="due_1" placeholder="" value="" name="due_amount" class="form-control">
                                                        </div>

                                                        <div class="or display-hidden" id="or">
                                                            <div class="form-group">
                                                                <label>Select Customer</label>
                                                                <select type="select" id="customer_id" placeholder="" value="" name="customer_id" class="form-control">
                                                                    <option value="">Select Customer</option>
                                                                    @foreach($customers as $customer)
                                                                        <option value="{{$customer->id}}">{{$customer->customer_name}}</option>
                                                                    @endforeach

                                                                </select>
                                                            </div>

                                                            <h5>Or Create Customer</h5>

                                                            <div class="form-group">
                                                                <label>Customer Name</label>
                                                                <input type="text" id="c_name" placeholder="" value="" name="customer_name" class="form-control">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Customer Mobile No</label>
                                                                <input type="text" id=m_number placeholder="" value="" name="mobile_no" class="form-control">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Customer Phone No</label>
                                                                <input type="text" id="" placeholder="" value="" name="phone_no" class="form-control">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Customer Mail</label>
                                                                <input type="text" id="c_mail" placeholder="" value="" name="mail" class="form-control">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Customer Address</label>
                                                                <textarea class="form-control" id="c_add" name="address"></textarea>
                                                            </div>
                                                        </div>

                                                        <button type="button" class="btn btn-secondary " data-dismiss="modal">Close</button>
                                                        <button class="btn btn-primary" type="submit"><strong>SELL</strong></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script>
        function pullProduct(value) {

            id = value;
            console.log(id);

            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                url: "{{url('/saleProduct')}}" + "/" + id,
                type: 'GET',
                success: function (response) {

                    $('#t-body').append(response);

                    get_total();


                },
            });

        }

        function get_customer_data() {

            var customer_name = $('#customer_name').val();
            var phone = $('#customer_contact_no').val();
            var address = $('#customer_add').val();

            $('#c_name').val(customer_name);
            $('#m_number').val(phone);
            $('#c_add').val(address)

        }

        function paid(value) {

            var paid = value;

            var total = get_total();

            var due = total - paid;

            if (due > 0){
                $('#or').removeClass('display-hidden');
                $('#or1').removeClass('display-hidden');
            }else{
                $('#or').addClass('display-hidden');
                $('#or1').addClass('display-hidden');
            }

            $('#due').val(due);
            $('#due_1').val(due);

        }

        function get_total() {
            sum=0;

            var a= $('.sell_total_price');
            //console.log(a);
            a.each(function (inx, cv) {
                //console.log(cv);
                sum+=parseInt($(cv).text());
                //console.log(sum);
                $('#total_amount').text(sum);
            });

            return sum;
        }
        function this_total() {
            $('#receive_amount').val(get_total());
            $('#receive_amount_1').val(get_total());
        }

        function total_price(val) {

            var idName = val;

            var arr = idName.split('_');

            var num = arr[1];
            var quantity = $('#quantity_'+num).val();

            var price = $('#price_'+num).val();
            var total = parseInt(quantity) * parseInt(price);
            $('#total_price_'+num).text(total);

            $('#total'+num).val(total);

            var a= $('.sell_total_price');
            //console.log(a);

            get_total();
        }


        function remove_row(val) {
            var idName = val;
            var arr = idName.split('_');
            var num = arr[1];
            var remove_btn = $('#'+idName);

            $('#product_row_'+num).remove();

            get_total();
        }

    </script>
@endsection