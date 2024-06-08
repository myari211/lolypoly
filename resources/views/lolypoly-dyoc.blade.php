@extends('lolypoly.app')

@section('content')
    <div class="mb-5">
        <div class="container py-5">
            <h1 class="text-center mb-5"><b>Design Your Case</b></h1>
            <h5 class="text-center mb-5">{{ (new \App\Helpers\GeneralFunction())->generalParameterValue('dyoc_text') }}
            </h5>
        </div>
        <div class="container pb-5">
            <div class="row">
                <div class="col-md-8">
                    <div class="border rounded" style="height: 800px">
                        <div class="d-flex align-items-center justify-content-center h-100">
                            <img src="" alt="" class="rounded img-fluid" id="image"
                                style="max-height: 750px">
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="accordion accordion-flush" id="accordionFlushExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapseOne" aria-expanded="false"
                                    aria-controls="flush-collapseOne">
                                    <span class="p-2 rounded me-2" style="background:#F5F6F8">1</span> Pilih Merk:
                                    <input type="text" id="merkValue" class="merk-value form-control w-50 border-0 ms-2"
                                        readonly role="button">
                                </button>
                            </h2>
                            <div id="flush-collapseOne" class="accordion-collapse collapse"
                                data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">
                                    @foreach ($brands as $brand)
                                        <label for="" class="merk mb-3" data-id="{{ $brand->id }}"
                                            data-value="{{ $brand->title }}">{{ $brand->title }}</label><br>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapseTwo" aria-expanded="false"
                                    aria-controls="flush-collapseTwo">
                                    <span class="p-2 rounded me-2" style="background:#F5F6F8">2</span> Pilih Tipe Perangkat
                                    <input type="text" id="tipeValue" class="merk-value form-control w-50 border-0 ms-2"
                                        readonly role="button">
                                </button>
                            </h2>
                            <div id="flush-collapseTwo" class="accordion-collapse collapse"
                                data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body" id="typeList">
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapseThree" aria-expanded="false"
                                    aria-controls="flush-collapseThree">
                                    <span class="p-2 rounded me-2" style="background:#F5F6F8">3</span> Pilih Desain
                                    <input type="text" id="customizationValue"
                                        class="merk-value form-control w-50 border-0 ms-2" readonly role="button">
                                </button>
                            </h2>
                            <div id="flush-collapseThree" class="accordion-collapse collapse"
                                data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">
                                    <div class="row" id="caseList">
                                    </div>
                                </div>
                                {{-- <div class="accordion-body">
                                    <div class="rounded">
                                        <input type="file" name="file_attachment" id="file_attachment"
                                            class="filepond" data-max-file-size="10MB" data-max-files="1"
                                            accept="image/png, image/jpeg, image/jpg">
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                        <form action="{{ Session::has('user') ? route('lolypoly.cart') : route('lolypoly.cart.guest') }}"
                            id="add-to-cart">
                            <input type="hidden" name="product_stock" id="product_stock" value="1">
                            <input type="hidden" name="product_id" id="product_id" value="">
                            <input type="hidden" name="product_variant_id" id="product_variant_id" value="">
                            <input type="hidden" name="product_type_id" id="product_type_id" value="">
                            <button type="submit" class="btn static-blue-button w-100 py-3 to-cart-button"
                                id="btn-add-to-cart" disabled>Add to Cart •
                                Rp <span id="pricetag">0</span> </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('.select2-form').select2({
                minimumResultsForSearch: -1,
                width: '100%'
            });
            $('.merk').click(function(e) {
                var value = $(this).data('value');
                var brand = $(this).data('id');
                $('#merkValue').val(value);
                $("#flush-collapseOne").removeClass('show');
                getTypeByBrand(brand);

                $('#tipeValue').val('');
                $('#customizationValue').val('');
            });
            $('.tipe').click(function(e) {
                var value = $(this).data('value');
                $('#tipeValue').val(value);
                $("#flush-collapseTwo").removeClass('show');
                $('#customizationValue').val('');
            });
            $('.case').click(function(e) {
                var value = $(this).data('value');
                $('#customizationValue').val(value);
                $('.case').css('border',
                    'var(--bs-border-width) var(--bs-border-style) var(--bs-border-color)');
                $(this).css('border', 'var(--bs-border-width) var(--bs-border-style) var(--primary-color)');
            });
            $('#customizationValue').change(function() {
                var value = $(this).val();
                if (value != '') {
                    $('#btn-add-to-cart').prop('disabled', false);
                } else {
                    $('#btn-add-to-cart').prop('disabled', true);
                }
            })
            FilePond.registerPlugin(
                FilePondPluginFileValidateSize,
                FilePondPluginImageValidateSize,
                FilePondPluginImagePreview,
                FilePondPluginFileValidateType
            );

            var fileAttachments = FilePond.create(
                document.querySelector('#file_attachment'), {
                    allowMultiple: false,
                    instantUpload: false,
                    allowProcess: true,
                    labelIdle: `
                        <div class="d-flex flex-column align-items-center gap-3">
                            <img src="{{ asset('images/dyoc/upload.svg') }}" alt="" class="rounded">
                            <a role="button" class="btn static-blue-button">Upload Image</a>
                            <span class="text-hue">Format: JPG, PNG, JPEG • Max. 10 MB</span>
                        </div>
                    `,
                    acceptedFileTypes: [
                        'image/png', 'image/jpeg', 'image/jpg'
                    ]
                }
            );

            fileAttachments.on('addfile', (error, file) => {
                if (!error) {
                    $('#customizationValue').val('Gambar');
                    console.log('File added:', file);
                    displayImagePreview(file);
                } else {
                    console.error('Error adding file:', error);
                }
            });

            fileAttachments.on('removefile', (error, file) => {
                if (!error) {
                    $('#customizationValue').val('');
                    $('#imagePreview').html('');
                    console.log('File removed:', file);
                } else {
                    console.error('Error removing file:', error);
                }
            });

            $('#download-button').click(function() {
                // Select the div to be converted
                const divToConvert = document.getElementById('downloadCase');

                // Use html2canvas to convert the div to a canvas
                html2canvas(divToConvert).then(function(canvas) {
                    // Create a data URL from the canvas
                    const imgData = canvas.toDataURL('image/png');

                    // Create a temporary anchor element for downloading
                    const a = document.createElement('a');
                    a.href = imgData;
                    a.download = 'downloaded-image.png';

                    // Trigger a click event on the anchor element to initiate the download
                    a.click();
                });
            });
        });

        function displayImagePreview(file) {
            // Assuming that 'file' is a File object
            const reader = new FileReader();

            reader.onload = function(e) {
                // Create an <img> element and set its 'src' attribute
                const imgElement = document.createElement('img');

                // Add a class to the <img> element
                imgElement.classList.add(
                    'img-fluid'); // Replace 'your-class-name' with your desired class name

                imgElement.src = e.target.result;
                // Append the <img> element to the target div
                $('#imagePreview').html(imgElement);
            };

            // Read the file as a data URL
            reader.readAsDataURL(file.file);
        }

        function getTypeByBrand(id) {
            $.ajax({
                url: '{{ route('lolypoly.dyoc.type') }}',
                type: 'POST',
                data: {
                    brand_id: id,
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                dataType: "JSON",
                success: function(response) {
                    if (response.code === 200) {
                        // swalSuccess(response.message);

                        $('#typeList').html('');
                        $('#typeList').html(response.data);
                        $('.tipe').click(function(e) {
                            var value = $(this).data('value');
                            var type = $(this).data('id');
                            $('#tipeValue').val(value);
                            $("#flush-collapseTwo").removeClass('show');
                            getCaseByType(type);
                            $('#customizationValue').val('');
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: response.message
                        });
                    }
                },
                error: function(response) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: response.message
                    });
                }
            });
        }

        function getCaseByType(id) {
            $.ajax({
                url: '{{ route('lolypoly.dyoc.case') }}',
                type: 'POST',
                data: {
                    type_id: id,
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                dataType: "JSON",
                success: function(response) {
                    if (response.code === 200) {
                        // swalSuccess(response.message);

                        $('#caseList').html('');
                        $('#caseList').html(response.data);
                        $('.case').click(function(e) {
                            var value = $(this).data('value');
                            var id = $(this).data('id');
                            var src = $(this).data('src');
                            var price = $(this).data('price');
                            $('#customizationValue').val(value);
                            $('.case').css('border',
                                'var(--bs-border-width) var(--bs-border-style) var(--bs-border-color)'
                            );
                            $(this).css('border',
                                'var(--bs-border-width) var(--bs-border-style) var(--primary-color)'
                            );
                            $('#product_id').val(id);
                            $('#image').attr('src', src);
                            $('#pricetag').html(price);
                            if (value != '') {
                                $('#btn-add-to-cart').prop('disabled', false);
                            } else {
                                $('#btn-add-to-cart').prop('disabled', true);
                            }
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: response.message
                        });
                    }
                },
                error: function(response) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: response.message
                    });
                }
            });
        }
    </script>
@endsection
