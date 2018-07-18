<?php

namespace App\Http\Controllers;

use App\mapper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Webpatser\Uuid\Uuid;

class MapperController extends Controller
{
    /**
     * Store an address list file in storage and return a workflow.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $filename = Uuid::generate()->string;
        $filename = "$filename.csv";
        $path = \Storage::putFileAs(
            'files',
            $request->file('theFile'),
            $filename
        );

        $rows   = array_map('str_getcsv', file($request->file('theFile')));
        $header = array_shift($rows);
        $values = [
            "First Name",
            "Address Line 1",
            "City",
            "State",
            "Zip",
            "Last Name",
            "Main/Home Phone",
            "Address Line 2",
            "Parent's name",
            "Pickup time",
            "Neighborhood",
        ];

        return view('workflow')
            ->with('filename', "files/$filename")
            ->with('header', $header)
            ->with('values', $values);
    }

    /**
     * Generate maps from a workflow file
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function generateMaps(Request $request)
    {
        // load map from storage
        $file = Storage::get($request->input('file'));
        
        // associate columns to values
        $rows   = array_map('str_getcsv', explode(PHP_EOL, $file));
        //delete header
        $header = array_shift($rows);
        
        render($request, "things");

        // First_Name	    "0"
        // Address_Line_1	"2"
        // City	        "3"
        // State	        "4"
        // Zip	            "5"

        $maps    = array();
        $mapImages = array();
        foreach ($rows as $row) {
            // format print address
            $uriFullAddress = $row[$request->input('Address_Line_1')].'<br /> '.
                $row[$request->input('City')].', '.
                $row[$request->input('State')].' '.
                $row[$request->input('Zip')];
            if ($row[$request->input('Address_Line_2')] != '') {
                $printAddress = $row[$request->input('Address_Line_1')].'<br /> '.
                $row[$request->input('Address_Line_2')].'<br /> '.
                $row[$request->input('City')].', '.
                $row[$request->input('State')].' '.
                $row[$request->input('Zip')];
            } else {
                $printAddress = $uriFullAddress;
            }

            // get map locator
            // map cacher or generated google maps url
            $mapImageURL = env(
                'MAP_IMAGE',
                "http://maps.googleapis.com/maps/api/staticmap?zoom=15&size=400x350&scale=2&sensor=false&key=" .
                env('GOOGLE_MAPS_API_KEY').
                "&center=$uriFullAddress&marker="
            );

            // assign things to array
            $maps[] = [
                "First Name" => $row[$request->input('First_Name')],
                "Address Line 1" => $row[$request->input('Address_Line_1')],
                "City" => $row[$request->input('City')],
                "State" => $row[$request->input('State')],
                "Zip" => $row[$request->input('Zip')],
                "Last Name" => $row[$request->input('Last_Name')],
                "Main/Home Phone" => $row[$request->input('Main/Home_Phone')],
                "Address Line 2" => $row[$request->input('Address_Line_2')],
                "Parent's name" => $row[$request->input("Parent's_name")],
                "Pickup time" => $row[$request->input('Pickup_time')],
                "Neighborhood" => $row[$request->input('Neighborhood')],
                "URI_Full_Address" => $uriFullAddress,
                "Print_Full_Address" => $printAddress,
                "Full_Name" => $row[$request->input('First_Name')].' '.
                                $row[$request->input('Last_Name')],
                                        
                // Input additional here
            ];
            $mapImages[] = $mapImageURL . $uriFullAddress;
        }


        // delete file
        Storage::delete($file);

        // return view with maps
        return view('maps')
            ->with('maps', $maps)
            ->with('mapImages', $mapImages);
    }

    /**
     * Display the start page.
     *
     * @return \Illuminate\Http\Response
     */
    public function start()
    {
        return view('welcome');
    }
}
