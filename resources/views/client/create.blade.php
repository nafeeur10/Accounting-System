@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header info-color white-text text-center py-4">
                        <h5>Create Client</h5>
                    </div>

                    <div class="card-body">
                        @if (session('message'))
                            <div class="alert alert-success" role="alert">
                                {{ session('message') }}
                            </div>
                        @endif

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form action="{{ route('client') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="companyName">Role:</label>
                                            <select name="role" id="role" class="form-control" required>
                                                <option value="0">Select a role</option>
                                                <option value="1">Admin</option>
                                                <option value="2">Client</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="companyName">Company name (Bedrijfsnaam):</label>
                                            <input type="text" class="form-control" value="{{ old('companyName') }}" id="companyName" placeholder="Enter Company Name" name="companyName">
                                        </div>

                                        <div class="form-group">
                                            <label for="email">Email (E-mailadres):</label>
                                            <input required type="email" class="form-control" value="{{ old('email') }}" id="email" placeholder="Enter email" name="email">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <input class="col-sm-8 pl-0 form-control-file" id="companyLogo" type="file" name="companyLogo"/>
                                        <div id="image-holder"></div>
                                    </div>


                                </div>


                                <div class="form-group">
                                    <label for="phone">Phone (Telefoonnummer):</label>
                                    <input type="text" class="form-control" id="phone" placeholder="Enter phone" name="phone">
                                </div>

                                <div class="form-group">
                                    <label for="address">Address (Adres):</label>
                                    <input type="text" class="form-control" id="address" value="{{ old('address') }}" placeholder="Enter address" name="address">
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="zipCode">ZIP (Postcode):</label>
                                            <input type="text" class="form-control" id="zipCode" value="{{ old('zipCode') }}" placeholder="Enter Zip Code" name="zipCode">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="city">City (Stad):</label>
                                            <input type="text" class="form-control" id="city" value="{{ old('city') }}" placeholder="Enter City" name="city">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="kvkNumber">KVK number (KVK nummer):</label>
                                    <input type="text" class="form-control" id="kvkNumber" value="{{ old('kvkNumber') }}" placeholder="Enter KVK Number" name="kvkNumber">
                                </div>

                                <div class="form-group">
                                    <label for="vatNumber">VAT number (BTW nummer):</label>
                                    <input type="text" class="form-control" id="vatNumber" value="{{ old('vatNumber') }}" placeholder="Enter VAT Number" name="vatNumber">
                                </div>

                                <div class="form-group">
                                    <label for="bankNumber">Bank number (Rekeningnummer):</label>
                                    <input type="text" class="form-control" id="bankNumber" value="{{ old('bankNumber') }}" placeholder="Enter Bank Number" name="bankNumber">
                                </div>

                                <div class="form-group">
                                    <label for="invoiceFootnote">Invoice footnote:</label>
                                    <input type="text" class="form-control" id="invoiceFootnote" value="{{ old('invoiceFootnote') }}" placeholder="Enter Invoice Footnote" name="invoiceFootnote">
                                </div>

                                <div class="form-group">
                                    <label for="password">Password (Wachtwoord):</label>
                                    <input required type="password" class="form-control" id="password" placeholder="Enter password" name="password">
                                </div>


                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
