<?php

namespace App\Http\Controllers\Admin\DataSet;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\TestingImport;
use App\Exports\TestingExport;
use DataTables;

use App\Repositories\DatasetRepository;
use App\Repositories\ProbabilityRepository;
use App\Repositories\KlasifikasiRepository;
use App\Resources\Responses\ApiResponse;

class TestingDataController extends Controller
{
    private $repo, $probRepo, $res;
    public function __construct(DatasetRepository $repo, KlasifikasiRepository $klasRepo, ProbabilityRepository $probRepo, ApiResponse $res)
    {
        $this->repo = $repo;
        $this->probRepo = $probRepo;
        $this->klasRepo = $klasRepo;
        $this->res = $res;
    }
    public function index(Request $request)
    {
        return view('pages.admin.dataset.testing.index');
    }
    public function json(Request $request)
    {
        return DataTables::of($this->repo->getByType('testing'))
            ->addIndexColumn()
            ->make(true);
    }
    public function count()
    {
        $data = count($this->repo->getByType('testing'));
        return $this->res->successResponse('Data testing berhasil dihitung', $data, 200);
    }
    public function store (Request $request)
    {
        $this->validate($request, [
			'excel_file' => 'required|mimes:csv,xls,xlsx'
		]);
        $file = $request->file('excel_file');
        $nama_file = time().$file->getClientOriginalName();
        $file->move('assets/file/excel',$nama_file);
        Excel::import(new TestingImport, public_path('/assets/file/excel/'.$nama_file));
        return $this->res->successResponse('Data testing berhasil disimpan', [], 200);
        
    }
    public function export(Request $request)
    {
        return Excel::download(new TestingExport, 'Data_Testing_'.time().'.xlsx');
    }
    public function delete(Request $request)
    {
        if(!$request->id){
            $delete = $this->repo->deleteAllData('testing');
            $this->klasRepo->deleteAllData();
            if($delete) return $this->res->successResponse('Data testing berhasil dihapus', [], 200);
        }
        return $this->res->errorResponse('Server error', 500);
    }
}
