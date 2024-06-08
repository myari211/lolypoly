@extends('layouts.admin.app', ['title' => 'List', 'parent' => 'Testimonial'])

@section('title', 'Add Testimonial')

@section('content')
    <section class="content">
        <div id="main-content">
            <form action="{{ route('testimonial.store') }}" id="submit-form">
                <input type="hidden" name="id" id="id" value="">
                <div class="row mb-5">
                    <div class="col-md-5">
                        <label for="title">Image</label>
                        <div class="row" id="list-image-thumbnail">
                            <div class="wrapper col-md-12 item-image-1">
                                <div class="box" style="margin: 0;max-width: 500px">
                                    <div class="js--image-preview"></div>
                                    <div class="upload-options">
                                        <label>
                                            <input type="file" name="images_thumbnail" class="image-upload"
                                                accept="image/*">
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="name">Customer Name*</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        placeholder="Enter Customer Name" data-validation="required">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="stars">Stars*</label>
                                    <select class="form-control" id="stars" name="stars"
                                        placeholder="Choose Discount Type" data-validation="required">
                                        @for ($x = 5; $x >= 1; $x--)
                                            <option value="{{$x}}">{{$x}}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
							<div class="col-md-12">
								<div class="form-group">
									<label for="description">Description*</label>
									<textarea class="form-control" id="description" name="description" placeholder="Enter Description" data-validation="required"></textarea>
								</div>
							</div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="{{ route('testimonial.index') }}" class="btn btn-secondary">Cancel</a>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </section>
@endsection

@push('body-scripts')
    <script>
        $(document).ready(function() {
            var minDate = moment().format('YYYY-MM-DDTHH:mm');
            var maxDate = moment().add(45, 'days').format('YYYY-MM-DDTHH:mm');

            $("#start_date").attr("min", minDate);
            $("#end_date").attr("min", minDate);
            $("#end_date").attr("max", maxDate);

            $("#start_date").on("change", function() {
                var startDateValue = $(this).val();

                $("#end_date").attr("min", startDateValue);
            });
            $('#discount_type').change(function() {
                var val = $(this).val();
                if (val == 'P') {
                    $('#discount_value').addClass('decimal-mask').removeClass('numeric-mask');
                    $('#max_discount').addClass('decimal-mask').removeClass('numeric-mask');
                } else if (val == 'F') {
                    $('#discount_value').addClass('numeric-mask').removeClass('decimal-mask');
                    $('#max_discount').addClass('numeric-mask').removeClass('decimal-mask');
                }
                $(".numeric-mask").inputmask({
                    alias: "integer",
                    integerDigits: 5,
                    allowMinus: false,
                    placeholder: "",
                    shortcuts: null,
                    min: 0,
                    groupSeparator: ".",
                    autoGroup: true,
                    autoUnmask: true,
                    rightAlign: false,
                    max: 99999999999999999999,
                });
                $(".decimal-mask").inputmask({
                    alias: "decimal",
                    integerDigits: 5,
                    digits: 2,
                    allowMinus: false,
                    digitsOptional: false,
                    placeholder: "0",
                    min: 0,
                    max: 100,
                    rightAlign: false,
                });
            });
            $('#discount_value').change(function() {
                var val = $(this).val();
                $(".decimal-mask").inputmask({
                    alias: "decimal",
                    integerDigits: 5,
                    digits: 2,
                    allowMinus: false,
                    digitsOptional: false,
                    placeholder: "0",
                    min: val,
                    max: 100,
                    rightAlign: false,
                });
                $(".numeric-mask").inputmask({
                    alias: "integer",
                    integerDigits: 5,
                    allowMinus: false,
                    placeholder: "",
                    shortcuts: null,
                    min: val,
                    groupSeparator: ".",
                    autoGroup: true,
                    autoUnmask: true,
                    rightAlign: false,
                    max: 99999999999999999999,
                });
            });

            $(".numeric-mask").inputmask({
                alias: "integer",
                integerDigits: 5,
                allowMinus: false,
                placeholder: "",
                shortcuts: null,
                min: 0,
                groupSeparator: ".",
                autoGroup: true,
                autoUnmask: true,
                rightAlign: false,
                max: 99999999999999999999,
            });
            $(".numeric-inputmask").inputmask({
                alias: "integer",
                integerDigits: 5,
                allowMinus: false,
                placeholder: "",
                shortcuts: null,
                min: 0,
                groupSeparator: ".",
                autoGroup: true,
                autoUnmask: true,
                rightAlign: false,
                max: 99999999999999999999,
            });
            $(".decimal-mask").inputmask({
                alias: "decimal",
                integerDigits: 5,
                digits: 2,
                allowMinus: false,
                digitsOptional: false,
                rightAlign: false,
                placeholder: "0",
                min: 0,
                max: 100,
            });
        });
    </script>
@endpush
