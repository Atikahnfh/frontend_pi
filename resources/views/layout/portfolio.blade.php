<!-- Portfolio Section Start -->
    <section id="portfolio" class="pt-36 pb-16 bg-slate-100 dark:bg-slate-800">
        
    <?php  $beasiswa = $beasiswa[0] ?>
    <table class="table mt-2 shadow" style="text-align: center;">
        <thead style="background-color:#9dd3fa;">
            <tr>
            <th scope="col">no.</th>
            <th scope="col">Nama Beasiswa</th>
            <th scope="col">Id Mitra</th>
            <th scope="col">Deskripsi </th>
            <th scope="col">Angkatan Awal </th>
            <th scope="col">Angkatan Akhir</th>
            <th scope="col">Semester Minimal</th>
            <th scope="col">Semester Maksimal</th>
            <th scope="col">Status</th>
            <th scope="col">Nama Mitra</th>
            </tr>
        </thead>
        <tbody>
          
            @foreach($beasiswa as $key => $b)
            <tr>
            <td>{{$key +1}}</td>
            <td>{{$b['namaBeasiswa']}}</td>
            <td>{{$b['idMitra']}}</td>
            <td>{{$b['deskripsi']}}</td>
            <td>{{$b['angkatanAwal']}}</td>
            <td>{{$b['angkatanAkhir']}}</td>
            <td>{{$b['semMin']}}</td>
            <td>{{$b['semMax']}}</td>
            <td>{{$b['status']}}</td>
            <td>{{$b['namaMitra']}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
    </section>
    <!-- Portfolio Section End -->
  