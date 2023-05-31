<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Collection;
use GuzzleHttp\Client;
use Carbon\Carbon;

class BeasiswaController extends Controller
{
    
    private $token;

    public function __construct()
    {
        // Inisialisasi nilai awal variabel
        $this->token = '21|QriEFpwmow6OSImpxD5a8O1gvf6YfvYeyIU9QMvv';
    }

    public function read_beasiswa()
    {

        $_SESSION['halaman'] = "beasiswa";

        $client = new Client([
            'base_uri' => 'http://127.0.0.1:8000/',
            'timeout'  => 10,
        ]);
        $response = $client->request('GET', 'api/v1/beasiswas', [
            'headers' => [
                'Authorization' => 'Bearer '.$this->token,
                'Accept' => 'application/json'
            ]
        ]);

        $data = json_decode($response->getBody()->getContents(), true);
        // return $data['data'][2]['idBeasiswa'];
        return view('welcome',['beasiswa'=>$data]);
        
    } 

    public function all_beasiswa()
    {

        $_SESSION['halaman'] = "beasiswa";

        $client = new Client([
            'base_uri' => 'http://127.0.0.1:8000/',
            'timeout'  => 10,
        ]);
        $response = $client->request('GET', 'api/v1/beasiswas', [
            'headers' => [
                'Authorization' => 'Bearer '.$this->token,
                'Accept' => 'application/json'
            ]
        ]);

        $data = json_decode($response->getBody()->getContents(), true);
        // return $data['data'][2]['idBeasiswa'];
        return view('/konten/daftarbeasiswa',['beasiswa'=>$data]);
        
    } 
    
    public function detail_beasiswa($id)
    {

        $_SESSION['halaman'] = "beasiswa";

        $client = new Client([
            'base_uri' => 'http://127.0.0.1:8000/',
            'timeout'  => 10,
        ]);
        $response = $client->request('GET', 'api/v1/beasiswas/'.$id, [
            'headers' => [
                'Authorization' => 'Bearer '.$this->token,
                'Accept' => 'application/json'
            ]
        ]);

        $data = json_decode($response->getBody()->getContents(), true);
        // return $data;
        // return $data['data']['idBeasiswa'];
        return view('/konten/detailbeasiswa',['beasiswa'=>$data]);
        
    }
} 