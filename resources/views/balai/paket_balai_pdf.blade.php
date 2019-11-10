<!DOCTYPE html>
<html>
<head>
	<title>Report PDF</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
	<center>
		<h5>PROGRES {{$balai->nmbalai}} </h4>		
	</center>
        <table class="table table-hover table-bordered">
            <tbody>
                <tr>
                    <th>No</th>
                    <th>Nama Paket</th>
                    <th>Pagu</th>
                    <th>Keuangan</th>
                    <th>Progres Keuangan</th>
                    <th>Progres Fisik</th>
                    
                </tr>

            @foreach ($satker->paket as $no => $balai)      
                
                <tr>
                    <td>{{++$no}}</td>
                    <td>{{$balai->nmpaket}}</td>
                    <td class="text-right">{{number_format($balai->pagurmp)}}</td>
                    <td class="text-right">{{number_format($balai->keuangan)}}</td>
                    <td class="text-right">{{number_format((($balai->keuangan/$balai->pagurmp)*100),2)}}</td>
                    <td class="text-right">{{number_format(($balai->progres_fisik),2)}}</td>
                    
                </tr>
                
            @endforeach
            <tfoot>
                <tr>
                    <td></td>
                    <td></td>
                    <td class="text-right">{{number_format($data_rekap->sum('pagurmp'))}}</td>
                    <td class="text-right">{{number_format($data_rekap->sum('keuangan'))}}</td>
                    <td class="text-right">{{number_format(($data_rekap->sum('keuangan')/$data_rekap->sum('pagurmp')*100),2)}}</td>
                <td class="text-right">{{number_format($data_rekap->avg('progres_fisik'),2)}}</td>
                </tr>
            </tfoot>
            </tbody>
        </table>
    </body>
    </html>