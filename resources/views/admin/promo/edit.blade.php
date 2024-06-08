@extends('layouts.admin.app', ['title' => 'List', 'parent' => 'promo'])

@section('title', 'Edit Promo')

@section('content')
    <section class="content">
        <div id="main-content">
            <form action="{{ route('promo.update', ['id' => $data->id]) }}" id="submit-form">
                <input type="hidden" name="id" id="id" value="{{ $data->id }}">
                <input type="hidden" name="is_popup" id="is_popup" value="{{ $data->is_popup }}">

                <div class="row mb-5">
                    <div class="col-md-5">
                        <label for="title">Image Slider</label>
                        <div class="row" id="list-image-thumbnail">
                            <div class="wrapper col-md-12 item-image-1">
                                <div class="box" style="margin: 0">
                                    <div class="js--image-preview js--no-default"
                                        style="background-image: url('{{ asset($data->image) }}') "></div>
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
                                    <label for="title">Title*</label>
                                    <input type="text" class="form-control" id="title" name="title"
                                        value="{{ $data->title }}" placeholder="Enter Name" data-validation="required">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="slug">Slug*</label>
                                    <input type="text" class="form-control" id="slug" name="slug"
                                        value="{{ $data->slug }}" placeholder="Enter Order" data-validation="required">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="order">Code*</label>
                                    <input type="text" class="form-control" id="code" name="code"
                                        value="{{ $data->code }}" placeholder="Enter Code" data-validation="required">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="min_order">Minimal Order*</label>
                                    <input type="text" class="form-control numeric-inputmask" id="min_order" name="min_order"
                                        value="{{ $data->min_order }}" placeholder="Enter Minimal Order"
                                        data-validation="required">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="start_date">Start Date*</label>
                                    <input type="datetime-local" class="form-control" id="start_date" name="start_date"
                                        value="{{ $data->start_date }}" placeholder="Enter Start Date"
                                        data-validation="required">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="end_date">End Date*</label>
                                    <input type="datetime-local" class="form-control" id="end_date" name="end_date"
                                        value="{{ $data->end_date }}" placeholder="Enter End Date"
                                        data-validation="required">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="discount_type">Discount Type*</label>
                                    <select class="form-control" id="discount_type" name="discount_type"
                                        placeholder="Choose Discount Type" data-validation="required">
                                        <option value="P" {{ $data->discount_type == 'P' ? 'selected' : '' }}>Percent
                                        </option>
                                        <option value="F" {{ $data->discount_type == 'F' ? 'selected' : '' }}>Flat
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="discount_value">Discount Value*</label>
                                    <input type="text" class="form-control {{ $data->discount_type == 'P' ? 'decimal-mask' : 'numeric-mask' }}" id="discount_value" name="discount_value"
                                        value="{{ $data->discount_value }}" placeholder="Enter Discount Value"
                                        data-validation="required">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="max_discount">Max Discount*</label>
                                    <input type="text" class="form-control {{ $data->discount_type == 'P' ? 'decimal-mask' : 'numeric-mask' }}" id="max_discount" name="max_discount"
                                        value="{{ $data->max_discount }}" placeholder="Enter Max Discount"
                                        data-validation="required">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="{{ route('promo.index') }}" class="btn btn-secondary">Cancel</a>
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
