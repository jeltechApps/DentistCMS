<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Report;
use App\Pacient;
use App\Treatment;
use PDF;
use DB;
use DataTables;


class ReportController extends Controller
{


    function getReportDataTable()
    {
        $reports = DB::table('reports')
        ->join('treatments', 'treatments.id', '=', 'reports.treatment_id')
        ->join('pacients', 'pacients.id', '=', 'reports.pacient_id')
        ->select('reports.*', 'treatments.starting_date', 'pacients.first_name', 'pacients.last_name', 'pacients.personal_number')
        ->get();
        $table = DataTables::of($reports)
        ->editColumn('Menaxhimi' ,'<a href="/report/{{$id}}" class="btn btn-circle btn-secondary "><i class="fa fa-eye"></i></a>
        <a href="/report/{{$id}}/edit"  class="btn btn-circle btn-primary "><i class="fa fa-pen"></i></a>
        <button class="btn btn-circle btn-danger " data-toggle="modal" data-target="#fshijModal{{$id}}"><i class="fa fa-trash"></i></button>
        <div class="modal fade" id="fshijModal{{$id}}" tabindex="-1" role="dialog" aria-labelledby="fshijModalLabel{{$id}}" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="fshijModalLabel{{$id}}">Fshij Raportin?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        A jeni i sigurtë që doni të vazhdoni?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-circle btn-secondary" data-dismiss="modal"><i class="fa fa-times"></i></button>
                        <form class="d-inline" method="POST" action="{{ route(\'report.destroy\',$id)}}" accept-charset="UTF-8">
                            {{ csrf_field() }}
                            <input name="_method" type="hidden" value="DELETE">
                            <button type="submit" class="btn btn-circle btn-danger"><i class="fa fa-trash"></i></button>
                        </form>
                        
                    </div>
                </div>
            </div>
        </div> 
        <form method="GET" action="{{ url(\'pdf\') }}" class="d-inline form-inline">
        <input id="id" hidden name="id" value="{{$id}}"/>
      <button type="submit" class="btn btn-circle btn-success "><i class="fa fa-print"></i></button>
      </form>')
        ->editColumn('pacient_id',' <a class="btn btn-circle btn-secondary btn-sm" href="/pacient/{{$pacient_id}}"><i class="fa fa-user"></i></a> {{$first_name}}  {{$last_name}}  {{$personal_number}}')
        ->editColumn('starting_date',' <a class="btn btn-circle btn-secondary btn-sm" href="/treatment/{{$treatment_id}}"><i class="fa fa-syringe"></i></a> {{$starting_date}}')
        ->rawColumns(['Menaxhimi','pacient_id','starting_date'])
        ->make(true);
        return $table;
    }

    public function pdf(Request $request)
    {
        $report = Report::find($request->input('id'));
        $pacient = Pacient::find($report->pacient_id);
        $treatment = Treatment::find($report->treatment_id);
        $services = $treatment->services()->get();
        $data['pacient'] = $pacient;
        $data['report'] = $report;
        $data['services'] = $services;
        $pdf = PDF::loadView('report.download', $data);
        return $pdf->stream('Fatura-'.$report->id.'.pdf');
       }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->guest())
        return redirect('/login')->with('error', 'Unathorized Page');
        else
        return view('report.report');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(auth()->guest())
        return redirect('/login')->with('error', 'Unathorized Page');
        else
        return view('report.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $report = Report::find($id);
        $pacient = Pacient::find($report->pacient_id);
        $treatment = Treatment::find($report->treatment_id);
        $services = $treatment->services()->get();
        if(auth()->guest())
        return redirect('/login')->with('error', 'Unathorized Page');
            else
        return view('report.show')->with('report',$report)->with('pacient',$pacient)->with('services',$services);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $report = Report::find($id);
        if(auth()->guest())
        {
            return redirect('/')->with('error','Unathorized Page'); 
        }
        else
        {
            $report->delete();           
            return redirect('/report')->with('success','Është fshirë Raporti');
        }
    }
}
