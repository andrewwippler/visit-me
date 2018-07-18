@extends('layouts.app') 

@section('content')

@foreach ($maps as $mapIndex => $map)
    
<div class="visit">
    <div id="map">
        <img src="{{ $mapImages[$mapIndex] }}">
    </div><br />


<table>
    <tr>
        <td width="150">Name:</td>
        <td>{{ $map['Full_Name'] }}</td>
    </tr>
@if ($map["Parent's name"])
    <tr>
        <td width="150">Parent Name:</td>
        <td>{{ $map["Parent's name"] }}</td>
    </tr>
@endif
    <tr valign="top">
        <td>Address:</td>
        <td> {{ $map['Print_Full_Address'] }} </td>
    </tr>
@if ($map['Main/Home Phone'])
    <tr>
        <td>Phone:</td>
        <td>{{ $map['Main/Home Phone'] }}</td>
    </tr>
@endif
    <tr height="40">
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    </tr>
@if ($map['Neighborhood'] && $map['Pickup time'])
    {{--  BUS VISIT  --}}
    <tr>
        <td>Neighborhood:</td>
        <td>{{ $map['Neighborhood'] }}</td>
    </tr>
    <tr>
        <td>Pickup Time:</td>
        <td>{{ $map['Pickup time'] }}</td>
    </tr>
    <tr height="40">
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td colspan="2"><b>Riding</b>  Date/Visited By: ___________________________________________</td>
    </tr>
    <tr>
        <td colspan="2"><b>Riding</b>  Date/Visited By: ___________________________________________</td>
    </tr>
    <tr>
        <td colspan="2"><b>Riding</b>  Date/Visited By: ___________________________________________</td>
    </tr>
    <tr>
        <td colspan="2"><b>Riding</b>  Date/Visited By: ___________________________________________</td>
    </tr>
    <tr>
        <td colspan="2"><b>Riding</b>  Date/Visited By: ___________________________________________</td>
    </tr>
    <tr height="40">
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    </tr>
@else
    {{--  NORMAL VISIT  --}}
@endif

    <tr valign="top">
    <td>Comments:</td>
        <td>___________________________________________________________________________________<br /><br />
            ___________________________________________________________________________________<br /><br />
            ___________________________________________________________________________________<br /></td>
    </tr>
</table>
</div>
<div class="page-break"></div>
@endforeach
@endsection