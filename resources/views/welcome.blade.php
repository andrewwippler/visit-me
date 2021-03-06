@extends('layouts.app') 
@section('content')
<div class="col-sm-12">
    <b>Please select an address list file</b>
    <form name "fileform" method="post" enctype="multipart/form-data" action="/upload">
    {{ csrf_field() }}
        <p><input type="file" name="theFile" size="20" /></p>
        <input class="btn btn-large btn-primary" type="submit" name="submit" value="Upload Addresses" />
    </form>
</div>
<br />
<div class="alert alert-info">
    <strong>NOTE: </strong>Address List File must be comma-separated text, with a header row, <br /> and contain the following
    required fields (column mapping is done on the next screen):
</div>

<div class="col-sm-12">
    <p>Required Fields:</p>
    <ul>
        <li>First Name</li>
        <li>Address Line 1</li>
        <li>City</li>
        <li>State</li>
        <li>Zip</li>
    </ul>
    <p>
        Optional Fields:
    </p>
    <ul>
        <li>Last Name</li>
        <li>Main/Home Phone</li>
        <li>Address Line 2</li>
        <li>Parent's name</li>
        <li>Pickup time</li>
        <li>Neighborhood</li>
    </ul>
</div>
<div id="push"></div>
@endsection