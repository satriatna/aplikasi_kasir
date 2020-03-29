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
  background-color: #4CAF50;
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
  <h1>Laporan Penjualan </h1>
  </center><br>

  <h3>Nama Resto : {{$nama->nama_resto}} </h3>
  <h3>Tanggal &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : <span style="font-size: 17px">{{$dari}} - {{$ke}}</span> </h3>
  <br>
<table border="1" cellpadding="10" cellspacing="" id="customers">
    <thead>
        <tr>
            <th> Tanggal </th>
            <th> Nama Menu </th>
            <th> Jumlah </th>
            <th> Harga </th>
            <th> Sub Total </th>
        </tr>
        </thead>
        <tbody>
        
        @foreach($data_pdf as $u)
        <tr>
        <td>{{$u->tanggal_transaksi}} </td>
        <td>{{$u->nama_masakan}} </td>
        <td>{{$u->jumlah}} </td>
        <td>{{$u->harga}} </td>
        <td>{{$u->sub_total}} </td>
        </tr>
        
        @endforeach
        <tr>
            <td colspan="2" class="text-center">Total</td>
            <th >{{$data_pdf->sum('jumlah')}} </td>
            <th >{{$data_pdf->sum('harga')}} </td>
            <th >{{$data_pdf->sum('sub_total')}} </td>
        </tr>
        
      
    </tbody>
</table>