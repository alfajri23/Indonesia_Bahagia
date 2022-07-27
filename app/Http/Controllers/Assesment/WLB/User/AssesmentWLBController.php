<?php

namespace App\Http\Controllers\Assesment\WLB\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AssesmentWLB;
use App\Models\AssesmentWLBEnroll;
use Illuminate\Support\Facades\Auth;

class AssesmentWLBController extends Controller
{
    public function index(){
        $datas = AssesmentWLB::all();

        return view('pages.assesment.wlb.user.assesment_wlb_user',compact('datas'));
    }

    public function done(Request $request){
        $data = $request->values;
        $id_user = Auth::check() ? auth()->user()->id : null;
        AssesmentWLBEnroll::create([
            'id_user' => $id_user,
            'hasil_tidak_seimbang' => $request->values
        ]);

        $tipe ='';
        $desc = '';

        if($request->values >= 0 && $request->values <= 3){
            $tipe = 'Tinggi';
            $desc = 'Selamat. Anda memiliki keseimbangan hidup dan pekerjaan yang baik. Anda bisa membagi waktu, energi, dan tenaga untuk kehidupan  di pekerjaan maupun di sosial. Jaga dan tingkatkan terus dengan menikmati setiap aktivitas yang Anda jalani. ';
        }elseif($request->values >= 4 && $request->values <= 6){
            $tipe = 'Sedang';
            $desc = 'Selamat. Anda memiliki keseimbangan hidup dan pekerjaan yang cukup baik. Anda cukup mampu membagi waktu, energi, dan tenaga untuk kehidupan di pekerjaan maupun di sosial. Meskipun adakalanya Anda masih terbebani dengan tanggung jawab di pekerjaan, tidak apa-apa, pelan-pelan mulailah menikmati pula kebersamaan dan waktu Anda secara sosial di rumah bersama keluarga ataupun di luar saat bersama teman dan komunitas. Jaga dan tingkatkan terus keseimbangan hidup Anda dengan menikmati dan mensyukuri setiap aktivitas yang Anda jalani. 

            Untuk mengoptimalkan kemampuan Anda secara personal, kami sarankan Anda mengikuti layanan konsultasi bersama Tim Profesional Kami.
            ';
        }elseif($request->values >= 7 && $request->values <= 9){
            $tipe = 'Rendah';
            $desc = 'Anda memiliki keseimbangan hidup dan pekerjaan yang tergolong kurang memadai. Anda belum seimbang dalam membagi waktu, energi, dan tenaga untuk kehidupan  di pekerjaan maupun di sosial.

            Kondisi yang kurang seimbang tersebut kurang baik bagi kesehatan fisik, mental, karir, maupun relasi Anda. 
           
           Anda bisa mulai berdamai dengan diri sendiri, lingkungan, dan pekerjaan agar bisa lebih seimbang menikmati hidup yang Anda. Kami rekomendasikan Anda untuk mengikuti layanan konsultasi bersama Tim Profesional kami untuk membantu Anda lebih tenang, bahagia, dan sukses jalani pekerjaan dan hidup Anda.';
        }

        return view('pages.assesment.wlb.user.assesment_wlb_result',compact('tipe','desc'));

        
    }


}
