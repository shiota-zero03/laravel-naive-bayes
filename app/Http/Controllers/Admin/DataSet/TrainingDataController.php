<?php

namespace App\Http\Controllers\Admin\DataSet;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\TrainingImport;
use App\Exports\TrainingExport;
use DataTables;

use App\Repositories\DatasetRepository;
use App\Repositories\ProbabilityRepository;
use App\Repositories\KlasifikasiRepository;
use App\Resources\Responses\ApiResponse;

class TrainingDataController extends Controller
{
    private $repo, $probRepo, $klasRepo, $res;
    public function __construct(DatasetRepository $repo, KlasifikasiRepository $klasRepo, ProbabilityRepository $probRepo, ApiResponse $res)
    {
        $this->repo = $repo;
        $this->probRepo = $probRepo;
        $this->klasRepo = $klasRepo;
        $this->res = $res;
    }
    public function index(Request $request)
    {
        return view('pages.admin.dataset.training.index');
    }
    public function json(Request $request)
    {
        return DataTables::of($this->repo->getByType('training'))
            ->addIndexColumn()
            ->make(true);
    }
    public function count()
    {
        $data = count($this->repo->getByType('training'));
        return $this->res->successResponse('Data training berhasil dihitung', $data, 200);
    }
    public function store (Request $request)
    {
        $this->validate($request, [
			'excel_file' => 'required|mimes:csv,xls,xlsx'
		]);
        $file = $request->file('excel_file');
        $nama_file = time().$file->getClientOriginalName();
        $file->move('assets/file/excel',$nama_file);
        Excel::import(new TrainingImport, public_path('/assets/file/excel/'.$nama_file));
        return $this->res->successResponse('Data training berhasil disimpan', [], 200);
        
    }
    public function export(Request $request)
    {
        return Excel::download(new TrainingExport, 'Data_Training_'.time().'.xlsx');
    }
    public function delete(Request $request)
    {
        if(!$request->id){
            $delete = $this->repo->deleteAllData('training');
            $this->probRepo->deleteAllData();
            $this->klasRepo->deleteAllData();
            if($delete) return $this->res->successResponse('Data training berhasil dihapus', [], 200);
        }
        return $this->res->errorResponse('Server error', 500);
    }
}
