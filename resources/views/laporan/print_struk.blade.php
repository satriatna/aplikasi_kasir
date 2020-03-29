    <style>
    #customers {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
    }

    #customers td, #customers th {
    border: 1px solid #ddd;
    padding: 8px;
    }

    #customers tr:nth-child(even){background-color: #f2f2f2;}

    #customers tr:hover {background-color: #ddd;}

    #customers th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: grey;
    color: white;
    }
    h3,h1 {
    color: #999999;
    font-family: arial, sans-serif;
    font-weight: bold;
    margin-top: 0px;
    margin-bottom: 1px;
    }

    h3{
    font-size: 20px;
    }
    </style>
    <center>
    <h1>Struk Pembelian </h1>
    </center><br>

    <h3>Nama Resto : {{$nama_resto->nama_resto}} </h3>
    <h3>Nama Kasir &nbsp;: {{$nama_kasir->nama}} </h3>
    <h3>Tanggal &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : <span style="font-size: 17px">{{$tgl_transaksi->tanggal_transaksi}}</span> </h3>
    <br>
    <table id="customers" id="example"  cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th> Nama Masakan </th>
                        <th> Jumlah </th>
                        <th> Harga </th>
                        <th> Sub Total </th>
                    </tr>
                    </thead>
                    <tbody>
                        
                    @foreach($transaksi as $m)
                    <tr>
                    <td>{{$m->nama_masakan}} </td>
                    <td>{{$m->jumlah}} </td>
                    <td>{{$m->harga}} </td>
                    <td> {{$m->jumlah * $m->harga }} </td>
                    </tr>
                    @endforeach
                    <tr>
                        <th colspan="5"></th>
                    </tr>
                    <tr>
                        <th colspan="3" class=>Total Harga</th>
                        <td>{{$m->total_bayar}}</td>
                    </tr>
                    <tr>
                        <th colspan="3" class=>Jumlah Bayar</th>
                        <td>{{$m->jumlah_pembayaran}} </td>
                    </tr>
                    <tr>
                        <th colspan="3" class=>Kembalian</th>
                        <td>{{$m->kembalian}} </td>
                    </tr>
                    </tbody>
                </table>