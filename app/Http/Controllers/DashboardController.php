<?php

namespace App\Http\Controllers;

use App\Contract;
use App\Perizinan;
use App\Post;
use App\PostPerizinan;
use App\PostController;
use App\TableMaster;
use App\TableMasterPerizinan;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class DashboardController extends Controller
{
    //
    public function index(){
        date_default_timezone_set('Asia/Bangkok');

        $tanggal = Post::where('jenis','perizinan')->select('id','tanggal_berakhir','kategori')->get()->toArray();

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
        return Post::where('id', $id)->firstOrFail();
    }

    public static function showNotification(){
        echo "<script src='{{ asset('js/jquery.min.js') }}'></script>

        <script type='text/javascript'>
            $(document).ready(function(){
                $('#modalReminder').modal('show');
            });
        </script>";
    }

    public static function totalContract(){
        $posts = Post::where('jenis', 'kontrak')->get();

        return count($posts);
    }

    public static function totalPerizinan(){
        $posts = Post::where('jenis', 'perizinan')->get();

        return count($posts);
    }

    public static function contractByJenis(){
        $table = TableMaster::where('jenis','kontrak')->select('id','nama')->get()->toArray();

        $array = Array();
        foreach ($table as $tab) {
            $post = Post::where([
                ['jenis', '=', 'kontrak'],
                ['table_master_id', '=', $tab['id']]
            ])->get();
            if(count($post) > 0) {
                $total = count($post);
                array_push($array, Arr::add(['jenis' => $tab['nama']], 'total', $total));
            }
        }

        return $array;
    }

    public static function perizinanByJenis(){
        $table = TableMaster::where('jenis', 'perizinan')->select('id','nama')->get()->toArray();

        $array = Array();
        foreach ($table as $tab) {
            $post = Post::where([
                ['jenis', '=', 'perizinan'],
                ['table_master_id', '=', $tab['id']]
            ])->get();
            if(count($post) > 0) {
                $total = count($post);
                array_push($array, Arr::add(['jenis' => $tab['nama']], 'total', $total));
            }
        }

        return $array;
    }

    public static function perizinanByKategori(){
        $kategori = Array();
        array_push($kategori, ['kategori' => '3 Bulan']);
        array_push($kategori, ['kategori' => '6 Bulan']);
        array_push($kategori, ['kategori' => '1 Tahun']);
        array_push($kategori, ['kategori' => '2 Tahun']);

        $array = Array();
        foreach ($kategori as $ktg) {
            $post = Post::where('kategori', $ktg['kategori'])->get();
            if(count($post) > 0) {
                $total = count($post);
                array_push($array, Arr::add(['kategori' => $ktg['kategori']], 'total', $total));
            }
        }

        return $array;
    }

}
