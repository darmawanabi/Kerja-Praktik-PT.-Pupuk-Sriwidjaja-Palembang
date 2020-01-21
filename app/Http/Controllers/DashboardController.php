<?php

namespace App\Http\Controllers;

use App\Perizinan;
use App\PostPerizinan;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class DashboardController extends Controller
{
    //
    public function index(){
        date_default_timezone_set('Asia/Bangkok');

        // $dateTemp = Perizinan::find($id);

        $tanggal = PostPerizinan::all('id','tanggal_berakhir','kategori')->toArray();

        $tgl_reminder = [];

        foreach ($tanggal as $tgl) {
            if (Arr::get($tgl, 'kategori') == "3 Bulan"){
                $kategori = "-3 months";
            } elseif (Arr::get($tgl, 'kategori') == "6 Bulan"){
                $kategori = "-6 months";
            } elseif (Arr::get($tgl, 'kategori') == "1 Tahun"){
                $kategori = "-1 years";
            } elseif (Arr::get($tgl, 'kategori') == "2 Tahun"){
                $kategori = "-2 years";
            }

            array_push($tgl_reminder, date("Y-m-d", strtotime(Arr::get($tgl, 'tanggal_berakhir') . $kategori . "-7 days")));
        }

        $now = now();
        // $dates =  "2020-01-13 10:00:00.000000 Asia/Bangkok (+07:00)";
        $today = substr_replace($now,"",-9);

        $check = [];
        $show_notif = false;
        for ($i = 0; $i < count($tanggal); $i++) {
            if ($today >= $tgl_reminder[$i]) {
                $array = Arr::add(['post_id' => Arr::get($tanggal[$i], 'id')], 'check', true);
                array_push($check, $array);
                $show_notif = true;
            }
            // else{
            //     $array = Arr::add(['post_id' => Arr::get($tanggal[$i], 'id')], 'check', false);
            //     array_push($check, $array);
            // }
        }

        return view('dashboard/index', ['check' => $check], ['show_notif' => $show_notif]);
    }

    public static function getPerizinan($id){
        return PostPerizinan::where('id', $id)->firstOrFail();
    }

    public static function showNotification(){
        echo "<script src='{{ asset('js/jquery.min.js') }}'></script>

        <script type='text/javascript'>
            $(document).ready(function(){
                $('#modalReminder').modal('show');
            });
        </script>";
    }
}
