@if( $mhs['data']['relationship']['semester_terdaftar'] > $bs['data'][$i]['semMin']  && $mhs['data']['relationship']['status'] == "Aktif" &&  $mhs['data']['relationship']['semester_terdaftar'] < $bs['data'][$i]['semMax'])
                    
                        {{$bs['data'][$i]['namaBeasiswa']}} =
                        {{$bs['data'][$i]['semMin']}} <
                        {{$mhs['data']['relationship']['semester_terdaftar']}} <
                        {{$bs['data'][$i]['semMax']}}
                        <br>
                    @endif