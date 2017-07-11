<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\Request;

class MapController extends Controller
{
    public function getNearby(Request $request)
    {
        $location = $request->query("location");
        $location = explode(",", $location);
        $lat = $location[0];
        $lng = $location[1];
        $client = new Client();
        try {
            $res = $client->request('GET', "https://maps.googleapis.com/maps/api/place/nearbysearch/json?location=$lat,$lng&radius=2000&types=veterinary_care&key=AIzaSyBx_t7bHQ0LsDsZ2pzN-Zrn7G_OAyLRlSQ");
            if ($res->getStatusCode() == 200) {
                $location = $this->getLocation($res->getBody());
                $response = [
                  "result" => "Success",
                    "data" => $location,
                    "errorMessage" => null
                ];
                return response()->json($response);
            }
        } catch (RequestException $exception) {
            throw $exception;
        }


    }

    public function getList(Request $request)
    {
        $location = $request->query(location);
        $location = explode(",", $location);
        $lat = $location[0];
        $lng = $location[1];
        $client = new Client();
        try {
            $res = $client->request('GET', "https://maps.googleapis.com/maps/api/place/nearbysearch/json?location=$lat,$lng&radius=2000&types=veterinary_care&key=AIzaSyA8oHOWv6zvC1QSImujwIqtRFv7lvH4E9c");
            if ($res->getStatusCode() == 200) {
                $location = $res->getBody();
                $response = [
                    "result" => "Success",
                    "data" => $location,
                    "errorMessage" => null
                ];
                return response()->json($response);
            }
        } catch (RequestException $exception) {
            throw $exception;
        }
    }

    private function getLocation($getBody)
    {
        $jsonData = json_decode($getBody, true);
        $location = [];
        $arrLocation = [];
        $i = 0 ;
        foreach ($jsonData['results'] as $value){
             $arrLocation[$i] = ['lat' => $value['geometry']['location']['lat'], 'lng' => $value['geometry']['location']['lng'], 'title' => $value['name']];
            $i++;
        }
        $location["location"] = $arrLocation;
        return $location;
    }
}
