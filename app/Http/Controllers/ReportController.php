<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\User;
class ReportController extends Controller
{
    public function userReportViewPDF(){
        $users = User::all();
        $pdf = Pdf::loadView('reports.user.index', array('users'=>$users));
        return $pdf->stream();
      }

    public function userReportDownloadPDF(){
        $users = User::all();
        $pdf = Pdf::loadView('reports.user.index', array('users'=>$users));
        return $pdf->download('usersreport.pdf');
      }
    
}
