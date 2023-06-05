<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Collection;
use GuzzleHttp\Client;
use Carbon\Carbon;
use GuzzleHttp\Exception\ClientException;

class BeasiswaController extends Controller
{
    
    private $token;

    public function __construct()
    {
        // Inisialisasi nilai awal variabel
        $this->token = '19|ujcXH6zrRswMEFS7KuNCpZB5dUQ5VoUQshxFatYK';
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
        return view('welcome',['beasiswa'=>$data]);
        
    } 

    public function all_beasiswa()
    {
        $_SESSION['halaman'] = "Daftar Beasiswa";

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
        return view('konten.daftar-beasiswa',['beasiswa'=>$data]);
        
    } 
    
    public function detail_beasiswa($id)
    {

        $_SESSION['halaman'] = "Detail Beasiswa";

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
        return view('konten.detailbeasiswa',['beasiswa'=>$data]);
        
    }

    public function show_check ()
    {
        $_SESSION['halaman'] = "Cek Eligible";
        return view('konten.cek-eligible');
    }

    public function check_eligible (Request $r)
    {
     
        $_SESSION['halaman'] = "Cek Eligible";

        try {
            $client = new Client([
                'base_uri' => 'http://127.0.0.1:8002/',
                'timeout'  => 10,
            ]);
    
            $response = $client->request('GET', 'api/mahasiswa/'.$r->nim, [
                'headers' => [
                    'Authorization' => 'Bearer '."7|aK2Pl1UWNWE62UAdyOtAOcaZfWa4Wze74UXrxXr0",
                    'Accept' => 'application/json'
                ]
            ]);
    
            $mhs = json_decode($response->getBody()->getContents(), true);
    
            // Lakukan pengecekan apakah nim match atau tidak
            if (isset($mhs['status']) && $mhs['status'] === 'Error has occurred...' && $mhs['message'] === 'nim do not match') {
                return response()->json(['error' => $errorMessage], 403);
            } else{
                $client = new Client([
                'base_uri' => 'http://127.0.0.1:8000/',
                'timeout'  => 10,
            ]);
            
            $response = $client->request('GET', 'api/v1/beasiswas?includeJurusans=true', [
                'headers' => [
                    'Authorization' => 'Bearer '.$this->token,
                    'Accept' => 'application/json'
                    ]
                ]);

                $bs = json_decode($response->getBody()->getContents(), true);
                
                if ($mhs['data']['relationship']['status'] == 'Aktif') {
                    $eligible = [];
                
                    foreach ($bs['data'] as $bea) {
                        if ($mhs['data']['relationship']['semester_terdaftar'] >= $bea['semMin'] && $mhs['data']['relationship']['semester_terdaftar'] <= $bea['semMax'] && $bea['status'] == 'Aktif' && $mhs['data']['relationship']['ipk'] >= $bea['ipkMin']) {
                            $eligible[] = $bea;
                        }
                    }
                
                    if (count($eligible) > 0) {
                        return view('konten.cek-eligible', ['mhs' => $mhs, 'eligible' => $eligible])->with('success', 'Selamat '.$mhs['data']['attributes']['nama']);
                    } else {
                        return view('konten.cek-eligible')->with('error', 'Tidak ada beasiswa yang eligible');
                    }
                } else {
                    return view('konten.cek-eligible')->with('error', 'Status kamu ' . $mhs['data']['relationship']['status']);
                }


            }
            
        } 
        catch (ClientException $e) {
            return view('konten.cek-eligible',['no_nim'=> 'NIM tidak ditemukan!']);
        }

    }
} 