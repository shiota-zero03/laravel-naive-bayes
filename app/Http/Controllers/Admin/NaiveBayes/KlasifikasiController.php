<?php

namespace App\Http\Controllers\Admin\NaiveBayes;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Repositories\DatasetRepository;
use App\Repositories\ProbabilityRepository;
use App\Repositories\KlasifikasiRepository;
use App\Resources\Responses\ApiResponse;

use DataTables;

class KlasifikasiController extends Controller
{
    private $datasetRepo, $probRepo, $klasRepo, $res;
    public function __construct(DatasetRepository $datasetRepo, ProbabilityRepository $probRepo, KlasifikasiRepository $klasRepo, ApiResponse $res)
    {
        $this->datasetRepo = $datasetRepo;
        $this->probRepo = $probRepo;
        $this->klasRepo = $klasRepo;
        $this->res = $res;
    }
    public function index()
    {
        return view('pages.admin.naive-bayes.klasifikasi.index');
    }
    public function json()
    {
        return DataTables::of($this->klasRepo->getAll())
            ->addIndexColumn()
            ->make(true);
    }
    public function store(Request $request)
    {
        $this->klasRepo->deleteAllData();
        if(count($this->datasetRepo->getByType('training')) == 0) return redirect()->to(route('admin.training.index'))->with('error', 'Harap masukkan data training terlebih dahulu');
        if(count($this->datasetRepo->getByType('testing')) == 0) return redirect()->to(route('admin.testing.index'))->with('error', 'Harap masukkan data testing terlebih dahulu');
        if(count($this->probRepo->getAll()) == 0) return redirect()->to(route('admin.probability.index'))->with('error', 'Harap hitung data probabilitas terlebih dahulu');
        $data = $this->storeData();
        // return $data;
        $insert = $this->klasRepo->insertData($data);
        if($insert){
            return back()->with('success', 'Berhasil menghitung klasifikasi');
        }
        return $this->res->errorResponse('Server error', 500);
    }
    public function probabilitasLabelKelas()
    {
        $lkcp = count($this->datasetRepo->getByCategory('training', 0, 0, 'CUKUP PUAS'));
        $lkp = count($this->datasetRepo->getByCategory('training', 0, 0, 'PUAS'));
        $lktp = count($this->datasetRepo->getByCategory('training', 0, 0, 'TIDAK PUAS'));

        $data = [
            'CUKUP PUAS' => $lkcp,
            'PUAS' => $lkp,
            'TIDAK PUAS' => $lktp,
        ];
        return $data;
    }
    public function storeData()
    {
        $dataRepo = $this->datasetRepo->getByType('testing');
        $probabilitasKelas = $this->probabilitasLabelKelas();
        foreach ($dataRepo as $key => $dt) {
            $jk = $this->probRepo->getByTypeandLabel(1, $dt->jenis_kelamin);
            $j = $this->probRepo->getByTypeandLabel(2, $dt->jurusan);
            if($dt->q1 == 1) {$s1 = 'TIDAK PUAS';} elseif($dt->q1 == 2) {$s1 = 'TIDAK PUAS';} elseif($dt->q1 == 3) {$s1 = 'CUKUP PUAS';} elseif($dt->q1 == 4) {$s1 = 'PUAS';} elseif($dt->q1 == 5) {$s1 = 'PUAS';}
            $q1 = $this->probRepo->getByTypeandLabel(3, $s1);
            if($dt->q2 == 1) {$s2 = 'TIDAK PUAS';} elseif($dt->q2 == 2) {$s2 = 'TIDAK PUAS';} elseif($dt->q2 == 3) {$s2 = 'CUKUP PUAS';} elseif($dt->q2 == 4) {$s2 = 'PUAS';} elseif($dt->q2 == 5) {$s2 = 'PUAS';}
            $q2 = $this->probRepo->getByTypeandLabel(4, $s2);
            if($dt->q3 == 1) {$s3 = 'TIDAK PUAS';} elseif($dt->q3 == 2) {$s3 = 'TIDAK PUAS';} elseif($dt->q3 == 3) {$s3 = 'CUKUP PUAS';} elseif($dt->q3 == 4) {$s3 = 'PUAS';} elseif($dt->q3 == 5) {$s3 = 'PUAS';}
            $q3 = $this->probRepo->getByTypeandLabel(5, $s3);
            if($dt->q4 == 1) {$s4 = 'TIDAK PUAS';} elseif($dt->q4 == 2) {$s4 = 'TIDAK PUAS';} elseif($dt->q4 == 3) {$s4 = 'CUKUP PUAS';} elseif($dt->q4 == 4) {$s4 = 'PUAS';} elseif($dt->q4 == 5) {$s4 = 'PUAS';}
            $q4 = $this->probRepo->getByTypeandLabel(6, $s4);
            if($dt->q5 == 1) {$s5 = 'TIDAK PUAS';} elseif($dt->q5 == 2) {$s5 = 'TIDAK PUAS';} elseif($dt->q5 == 3) {$s5 = 'CUKUP PUAS';} elseif($dt->q5 == 4) {$s5 = 'PUAS';} elseif($dt->q5 == 5) {$s5 = 'PUAS';}
            $q5 = $this->probRepo->getByTypeandLabel(7, $s5);
            if($dt->q6 == 1) {$s6 = 'TIDAK PUAS';} elseif($dt->q6 == 2) {$s6 = 'TIDAK PUAS';} elseif($dt->q6 == 3) {$s6 = 'CUKUP PUAS';} elseif($dt->q6 == 4) {$s6 = 'PUAS';} elseif($dt->q6 == 5) {$s6 = 'PUAS';}
            $q6 = $this->probRepo->getByTypeandLabel(8, $s6);
            if($dt->q7 == 1) {$s7 = 'TIDAK PUAS';} elseif($dt->q7 == 2) {$s7 = 'TIDAK PUAS';} elseif($dt->q7 == 3) {$s7 = 'CUKUP PUAS';} elseif($dt->q7 == 4) {$s7 = 'PUAS';} elseif($dt->q7 == 5) {$s7 = 'PUAS';}
            $q7 = $this->probRepo->getByTypeandLabel(9, $s7);
            if($dt->q8 == 1) {$s8 = 'TIDAK PUAS';} elseif($dt->q8 == 2) {$s8 = 'TIDAK PUAS';} elseif($dt->q8 == 3) {$s8 = 'CUKUP PUAS';} elseif($dt->q8 == 4) {$s8 = 'PUAS';} elseif($dt->q8 == 5) {$s8 = 'PUAS';}
            $q8 = $this->probRepo->getByTypeandLabel(10, $s8);
            if($dt->q9 == 1) {$s9 = 'TIDAK PUAS';} elseif($dt->q9 == 2) {$s9 = 'TIDAK PUAS';} elseif($dt->q9 == 3) {$s9 = 'CUKUP PUAS';} elseif($dt->q9 == 4) {$s9 = 'PUAS';} elseif($dt->q9 == 5) {$s9 = 'PUAS';}
            $q9 = $this->probRepo->getByTypeandLabel(11, $s9);
            if($dt->q10 == 1) {$s10 = 'TIDAK PUAS';} elseif($dt->q10 == 2) {$s10 = 'TIDAK PUAS';} elseif($dt->q10 == 3) {$s10 = 'CUKUP PUAS';} elseif($dt->q10 == 4) {$s10 = 'PUAS';} elseif($dt->q10 == 5) {$s10 = 'PUAS';}
            $q10 = $this->probRepo->getByTypeandLabel(12, $s10);
            if($dt->q11 == 1) {$s11 = 'TIDAK PUAS';} elseif($dt->q11 == 2) {$s11 = 'TIDAK PUAS';} elseif($dt->q11 == 3) {$s11 = 'CUKUP PUAS';} elseif($dt->q11 == 4) {$s11 = 'PUAS';} elseif($dt->q11 == 5) {$s11 = 'PUAS';}
            $q11 = $this->probRepo->getByTypeandLabel(13, $s11);
            if($dt->q12 == 1) {$s12 = 'TIDAK PUAS';} elseif($dt->q12 == 2) {$s12 = 'TIDAK PUAS';} elseif($dt->q12 == 3) {$s12 = 'CUKUP PUAS';} elseif($dt->q12 == 4) {$s12 = 'PUAS';} elseif($dt->q12 == 5) {$s12 = 'PUAS';}
            $q12 = $this->probRepo->getByTypeandLabel(14, $s12);
            if($dt->q13 == 1) {$s13 = 'TIDAK PUAS';} elseif($dt->q13 == 2) {$s13 = 'TIDAK PUAS';} elseif($dt->q13 == 3) {$s13 = 'CUKUP PUAS';} elseif($dt->q13 == 4) {$s13 = 'PUAS';} elseif($dt->q13 == 5) {$s13 = 'PUAS';}
            $q13 = $this->probRepo->getByTypeandLabel(15, $s13);
            if($dt->q14 == 1) {$s14 = 'TIDAK PUAS';} elseif($dt->q14 == 2) {$s14 = 'TIDAK PUAS';} elseif($dt->q14 == 3) {$s14 = 'CUKUP PUAS';} elseif($dt->q14 == 4) {$s14 = 'PUAS';} elseif($dt->q14 == 5) {$s14 = 'PUAS';}
            $q14 = $this->probRepo->getByTypeandLabel(16, $s14);
            if($dt->q15 == 1) {$s15 = 'TIDAK PUAS';} elseif($dt->q15 == 2) {$s15 = 'TIDAK PUAS';} elseif($dt->q15 == 3) {$s15 = 'CUKUP PUAS';} elseif($dt->q15 == 4) {$s15 = 'PUAS';} elseif($dt->q15 == 5) {$s15 = 'PUAS';}
            $q15 = $this->probRepo->getByTypeandLabel(17, $s15);
            
            $probabilitasKelas_p = number_format($probabilitasKelas['PUAS'] / ($probabilitasKelas['PUAS'] + $probabilitasKelas['CUKUP PUAS'] + $probabilitasKelas['TIDAK PUAS']), 1, '.', '');
            $probabilitasKelas_cp = number_format($probabilitasKelas['CUKUP PUAS'] / ($probabilitasKelas['PUAS'] + $probabilitasKelas['CUKUP PUAS'] + $probabilitasKelas['TIDAK PUAS']), 1, '.', '');
            $probabilitasKelas_tp = number_format($probabilitasKelas['CUKUP PUAS'] / ($probabilitasKelas['PUAS'] + $probabilitasKelas['CUKUP PUAS'] + $probabilitasKelas['TIDAK PUAS']), 1, '.', '');

            // return $jk->tidak_puas/$probabilitasKelas['TIDAK PUAS'];
            if($probabilitasKelas['CUKUP PUAS'] == 0) $cukup_puas = 0;
            else{
                $cukup_puas = ((
                    (
                        (isset($jk->cukup_puas) ? $jk->cukup_puas/$probabilitasKelas['CUKUP PUAS'] : 0) * 
                        (isset($j->cukup_puas) ? $j->cukup_puas/$probabilitasKelas['CUKUP PUAS'] : 0) * 
                        (isset($q1->cukup_puas) ? $q1->cukup_puas/$probabilitasKelas['CUKUP PUAS'] : 0) * 
                        (isset($q2->cukup_puas) ? $q2->cukup_puas/$probabilitasKelas['CUKUP PUAS'] : 0) * 
                        (isset($q3->cukup_puas) ? $q3->cukup_puas/$probabilitasKelas['CUKUP PUAS'] : 0) * 
                        (isset($q4->cukup_puas) ? $q4->cukup_puas/$probabilitasKelas['CUKUP PUAS'] : 0) * 
                        (isset($q5->cukup_puas) ? $q5->cukup_puas/$probabilitasKelas['CUKUP PUAS'] : 0) * 
                        (isset($q6->cukup_puas) ? $q6->cukup_puas/$probabilitasKelas['CUKUP PUAS'] : 0) * 
                        (isset($q7->cukup_puas) ? $q7->cukup_puas/$probabilitasKelas['CUKUP PUAS'] : 0) * 
                        (isset($q8->cukup_puas) ? $q8->cukup_puas/$probabilitasKelas['CUKUP PUAS'] : 0) * 
                        (isset($q9->cukup_puas) ? $q9->cukup_puas/$probabilitasKelas['CUKUP PUAS'] : 0) * 
                        (isset($q10->cukup_puas) ? $q10->cukup_puas/$probabilitasKelas['CUKUP PUAS'] : 0) * 
                        (isset($q11->cukup_puas) ? $q11->cukup_puas/$probabilitasKelas['CUKUP PUAS'] : 0) * 
                        (isset($q12->cukup_puas) ? $q12->cukup_puas/$probabilitasKelas['CUKUP PUAS'] : 0) * 
                        (isset($q13->cukup_puas) ? $q13->cukup_puas/$probabilitasKelas['CUKUP PUAS'] : 0) * 
                        (isset($q14->cukup_puas) ? $q14->cukup_puas/$probabilitasKelas['CUKUP PUAS'] : 0) * 
                        (isset($q15->cukup_puas) ? $q15->cukup_puas/$probabilitasKelas['CUKUP PUAS'] : 0) * 
                        $probabilitasKelas_cp
                    )
                ));
                // return $jk->cukup_puas/$probabilitasKelas['CUKUP PUAS']*$j->cukup_puas/$probabilitasKelas['CUKUP PUAS']*$q1->cukup_puas/$probabilitasKelas['CUKUP PUAS']*$q2->cukup_puas/$probabilitasKelas['CUKUP PUAS']*$q3->cukup_puas/$probabilitasKelas['CUKUP PUAS']*$q4->cukup_puas/$probabilitasKelas['CUKUP PUAS']*$q5->cukup_puas/$probabilitasKelas['CUKUP PUAS']*$q6->cukup_puas/$probabilitasKelas['CUKUP PUAS']*$q7->cukup_puas/$probabilitasKelas['CUKUP PUAS']*$q8->cukup_puas/$probabilitasKelas['CUKUP PUAS']*$q9->cukup_puas/$probabilitasKelas['CUKUP PUAS']*$q10->cukup_puas/$probabilitasKelas['CUKUP PUAS']*$q11->cukup_puas/$probabilitasKelas['CUKUP PUAS']*$q12->cukup_puas/$probabilitasKelas['CUKUP PUAS']*$q13->cukup_puas/$probabilitasKelas['CUKUP PUAS']*$q14->cukup_puas/$probabilitasKelas['CUKUP PUAS']*$q15->cukup_puas/$probabilitasKelas['CUKUP PUAS']*$probabilitasKelas_cp;
            }
            if($probabilitasKelas['PUAS'] == 0) $puas = 0;
            else {
                $puas = ((
                    (
                        (isset($jk->puas) ? $jk->puas/$probabilitasKelas['PUAS'] : 0) * 
                        (isset($j->puas) ? $j->puas/$probabilitasKelas['PUAS'] : 0) * 
                        (isset($q1->puas) ? $q1->puas/$probabilitasKelas['PUAS'] : 0) * 
                        (isset($q2->puas) ? $q2->puas/$probabilitasKelas['PUAS'] : 0) * 
                        (isset($q3->puas) ? $q3->puas/$probabilitasKelas['PUAS'] : 0) * 
                        (isset($q4->puas) ? $q4->puas/$probabilitasKelas['PUAS'] : 0) * 
                        (isset($q5->puas) ? $q5->puas/$probabilitasKelas['PUAS'] : 0) * 
                        (isset($q6->puas) ? $q6->puas/$probabilitasKelas['PUAS'] : 0) * 
                        (isset($q7->puas) ? $q7->puas/$probabilitasKelas['PUAS'] : 0) * 
                        (isset($q8->puas) ? $q8->puas/$probabilitasKelas['PUAS'] : 0) * 
                        (isset($q9->puas) ? $q9->puas/$probabilitasKelas['PUAS'] : 0) * 
                        (isset($q10->puas) ? $q10->puas/$probabilitasKelas['PUAS'] : 0) * 
                        (isset($q11->puas) ? $q11->puas/$probabilitasKelas['PUAS'] : 0) * 
                        (isset($q12->puas) ? $q12->puas/$probabilitasKelas['PUAS'] : 0) * 
                        (isset($q13->puas) ? $q13->puas/$probabilitasKelas['PUAS'] : 0) * 
                        (isset($q14->puas) ? $q14->puas/$probabilitasKelas['PUAS'] : 0) * 
                        (isset($q15->puas) ? $q15->puas/$probabilitasKelas['PUAS'] : 0) *
                        $probabilitasKelas_p
                    )
                ));
            }
            if($probabilitasKelas['TIDAK PUAS'] == 0) $tidak_puas = 0;
            else {
                $tidak_puas = ((
                    (
                        (isset($jk->tidak_puas) ? $jk->tidak_puas/$probabilitasKelas['TIDAK PUAS'] : 0) * 
                        (isset($j->tidak_puas) ? $j->tidak_puas/$probabilitasKelas['TIDAK PUAS'] : 0) * 
                        (isset($q1->tidak_puas) ? $q1->tidak_puas/$probabilitasKelas['TIDAK PUAS'] : 0) * 
                        (isset($q2->tidak_puas) ? $q2->tidak_puas/$probabilitasKelas['TIDAK PUAS'] : 0) * 
                        (isset($q3->tidak_puas) ? $q3->tidak_puas/$probabilitasKelas['TIDAK PUAS'] : 0) * 
                        (isset($q4->tidak_puas) ? $q4->tidak_puas/$probabilitasKelas['TIDAK PUAS'] : 0) * 
                        (isset($q5->tidak_puas) ? $q5->tidak_puas/$probabilitasKelas['TIDAK PUAS'] : 0) * 
                        (isset($q6->tidak_puas) ? $q6->tidak_puas/$probabilitasKelas['TIDAK PUAS'] : 0) * 
                        (isset($q7->tidak_puas) ? $q7->tidak_puas/$probabilitasKelas['TIDAK PUAS'] : 0) * 
                        (isset($q8->tidak_puas) ? $q8->tidak_puas/$probabilitasKelas['TIDAK PUAS'] : 0) * 
                        (isset($q9->tidak_puas) ? $q9->tidak_puas/$probabilitasKelas['TIDAK PUAS'] : 0) * 
                        (isset($q10->tidak_puas) ? $q10->tidak_puas/$probabilitasKelas['TIDAK PUAS'] : 0) * 
                        (isset($q11->tidak_puas) ? $q11->tidak_puas/$probabilitasKelas['TIDAK PUAS'] : 0) * 
                        (isset($q12->tidak_puas) ? $q12->tidak_puas/$probabilitasKelas['TIDAK PUAS'] : 0) * 
                        (isset($q13->tidak_puas) ? $q13->tidak_puas/$probabilitasKelas['TIDAK PUAS'] : 0) * 
                        (isset($q14->tidak_puas) ? $q14->tidak_puas/$probabilitasKelas['TIDAK PUAS'] : 0) * 
                        (isset($q15->tidak_puas) ? $q15->tidak_puas/$probabilitasKelas['TIDAK PUAS'] : 0) *
                        $probabilitasKelas_tp
                    )
                ));
            }

            $maxValue = max($cukup_puas, $puas, $tidak_puas);
            if($puas > $cukup_puas && $puas > $tidak_puas) $maxValue = 'PUAS';
            elseif ($cukup_puas > $tidak_puas && $cukup_puas > $puas) $maxValue = 'CUKUP PUAS';
            else $maxValue = 'TIDAK PUAS';
            $data[] = [
                'testing_id' => $dt->id,
                'cukup_puas' => $cukup_puas,
                'puas' => $puas,
                'tidak_puas' => $tidak_puas,
                'kelas_prediksi' => $maxValue,
                'kelas_asli' => $dt->hasil
            ];
        }
        return $data;
    }
}
