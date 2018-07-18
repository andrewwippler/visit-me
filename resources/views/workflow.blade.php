@extends('layouts.app')

@section('content')
<div class="col-sm-12">
Edit mapping for {{ $filename }}
</div>
<form method="post" action="/getmaps">
{{ csrf_field() }}
    <input type="hidden" name="file" value="{{ $filename }}" />
    @foreach ($values as $valueKey => $valueName)
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="addressColumn">{{ $valueName }}</label>
            <select id="addressColumn" name="{{ $valueName }}" class="form-control" @if ($valueKey < 5) required @endif>
                <option value="" disabled selected hidden>---</option>
                @foreach ($header as $key => $headerName)
                    <option value="{{ $key }}" @if (strtolower($headerName) == strtolower($valueName))
                        selected
                    @endif >{{ $headerName }}</option>
                @endforeach
            </select>
        </div>
    </div>
    @endforeach

        <input class="btn btn-large btn-primary" type="submit" name="submit" value="Process Addresses" />
</form>
@endsection