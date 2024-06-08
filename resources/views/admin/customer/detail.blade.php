@extends('layouts.admin.app', ['title' => 'Customer', 'parent' => ''])

@section('title', 'Customer')

@section('content')
    <section class="content">
        <div class="container-fluid">

            <div class="row m-0">
                <div class="col-sm-4 mb-3">
                    <div id="upload-photo">
                        <div class="box">
                            <img src="{{ asset($data->image) }}" alt="" class="img-fluid w-100">
                        </div>
                    </div>
                </div>
                <div class="col-sm-8 mb-3">
                    <input type="hidden" name="id" value="{{ $data->id }}">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $data->name }}"
                            placeholder="Enter Name" data-validation="required" readonly>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ $data->email }}"
                            placeholder="Enter Email" data-validation="required" readonly>
                    </div>
                    <div class="form-group">
                        <label for="phone_number">Phone Number</label>
                        <input type="text" class="form-control" id="phone_number" name="phone_number"
                            value="{{ $data->phone_number }}" placeholder="Enter Phone Number" data-validation="required"
                            readonly>
                    </div>
                    <div class="w-100 my-2">
                        <label for="phone_number">Customer Address</label>
                        @foreach ($data->address as $address)
                            <div class="row mb-3">
                                <div class="col-md-3 d-flex align-items-center">
                                    <h5>Alamat {{ $address->name }}</h5>
                                </div>
                                <div class="col-md-9">
                                    <div class="d-flex align-items-center justify-content-end">
                                        <input type="text" class="form-control account-form text-wrap"
                                            id="{{ $address->id }}"
                                            value="{{ $address->name }} - {{ $address->phone_number }} - {{ $address->address }}, {{ $address->kode_pos }}, kel.{{ ucwords(strtolower($address->kelurahanDesa ? $address->kelurahanDesa->kelurahan_desa_name : '-')) }}, kec.{{ ucwords(strtolower($address->kecamatan ? $address->kecamatan->kecamatan_name : '-')) }},  {{ ucwords(strtolower($address->kabupatenKota ? $address->kabupatenKota->kabupaten_kota_name : '-')) }}, {{ ucwords(strtolower($address->provinsi ? $address->provinsi->provinsi_name : '')) }}"
                                            disabled>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        @if ($data->address->count() <= 0)
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    No Address
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('body-scripts')
    <script></script>
@endpush
