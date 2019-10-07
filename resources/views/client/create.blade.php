@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header info-color white-text text-center py-4">
                        <h5>Create Client</h5>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                            <form action="{{ route('client') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="custom-file mb-3">
                                    <input type="file" class="custom-file-input" id="companyLogo" name="companyLogo">
                                    <label class="custom-file-label" for="companyLogo">Choose file</label>
                                </div>

                                <div class="form-group">
                                    <label for="companyName">Company name (Bedrijfsnaam):</label>
                                    <input type="text" class="form-control" id="companyName" placeholder="Enter Company Name" name="companyName">
                                </div>

                                <div class="form-group">
                                    <label for="email">Email (E-mailadres):</label>
                                    <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                                </div>

                                <div class="form-group">
                                    <label for="phone">Phone (Telefoonnummer):</label>
                                    <input type="text" class="form-control" id="phone" placeholder="Enter phone" name="phone">
                                </div>

                                <div class="form-group">
                                    <label for="address">Address (Adres):</label>
                                    <input type="text" class="form-control" id="address" placeholder="Enter address" name="address">
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="zipCode">ZIP (Postcode):</label>
                                            <input type="text" class="form-control" id="zipCode" placeholder="Enter Zip Code" name="zipCode">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="city">City (Stad):</label>
                                            <input type="text" class="form-control" id="city" placeholder="Enter City" name="city">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="kvkNumber">KVK number (KVK nummer):</label>
                                    <input type="text" class="form-control" id="kvkNumber" placeholder="Enter KVK Number" name="kvkNumber">
                                </div>

                                <div class="form-group">
                                    <label for="vatNumber">VAT number (BTW nummer):</label>
                                    <input type="text" class="form-control" id="vatNumber" placeholder="Enter VAT Number" name="vatNumber">
                                </div>

                                <div class="form-group">
                                    <label for="bankNumber">Bank number (Rekeningnummer):</label>
                                    <input type="text" class="form-control" id="bankNumber" placeholder="Enter Bank Number" name="bankNumber">
                                </div>

                                <div class="form-group">
                                    <label for="invoiceFootnote">Invoice footnote:</label>
                                    <input type="text" class="form-control" id="invoiceFootnote" placeholder="Enter Invoice Footnote" name="invoiceFootnote">
                                </div>

                                <div class="form-group">
                                    <label for="password">Password (Wachtwoord):</label>
                                    <input type="password" class="form-control" id="password" placeholder="Enter password" name="password">
                                </div>


                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
