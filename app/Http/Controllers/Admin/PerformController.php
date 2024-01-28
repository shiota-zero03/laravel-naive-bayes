<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Repositories\DatasetRepository;
use App\Repositories\ProbabilityRepository;
use App\Repositories\KlasifikasiRepository;
use App\Resources\Responses\ApiResponse;

class PerformController extends Controller
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
        count($this->klasRepo->getAll()) > 0 ? $status = true : $status = false;
        if($status == true){
            $prediksi = $this->prediksi();
            $secondPrediction = $this->secondPrediction($prediksi);
            $performVector = $this->performVector($prediksi, $secondPrediction);
            $data = [
                'status' => true,
                'prediksi' => $prediksi,
                'secondPrediction' => $secondPrediction,
                'perform' => $performVector
            ];
            // return $performVector;
        } else {
            $data = [
                'status' => false
            ];
        }
        return view('pages.admin.performa.index')->with($data);
    }

    public function prediksi()
    {
        $cpcp = $this->klasRepo->getByPredictionandFact('CUKUP PUAS', 'CUKUP PUAS');
        $pcp = $this->klasRepo->getByPredictionandFact('PUAS', 'CUKUP PUAS');
        $tpcp = $this->klasRepo->getByPredictionandFact('TIDAK PUAS', 'CUKUP PUAS');

        $cpp = $this->klasRepo->getByPredictionandFact('CUKUP PUAS', 'PUAS');
        $pp = $this->klasRepo->getByPredictionandFact('PUAS', 'PUAS');
        $tpp = $this->klasRepo->getByPredictionandFact('TIDAK PUAS', 'PUAS');

        $cptp = $this->klasRepo->getByPredictionandFact('CUKUP PUAS', 'TIDAK PUAS');
        $ptp = $this->klasRepo->getByPredictionandFact('PUAS', 'TIDAK PUAS');
        $tptp = $this->klasRepo->getByPredictionandFact('TIDAK PUAS', 'TIDAK PUAS');

        $data = [
            'cpcp' => count($cpcp),  'pcp' => count($pcp),  'tpcp' => count($tpcp),
            'cpp' => count($cpp),  'pp' => count($pp),  'tpp' => count($tpp),
            'cptp' => count($cptp),  'ptp' => count($ptp),  'tptp' => count($tptp),
        ];
        return $data;
    }

    public function secondPrediction($getprediction)
    {
        $data = [
            'cptp' => $getprediction['cpcp'],  'ptp' => $getprediction['pp'],  'tptp' => $getprediction['tptp'],
            'cpfp' => intval($getprediction['pcp'] + $getprediction['tpcp']),  'pfp' => intval($getprediction['cpp'] + $getprediction['tpp']),  'tpfp' => intval($getprediction['cptp'] + $getprediction['ptp']),
            'cpfn' => intval($getprediction['cpp'] + $getprediction['cptp']),  'pfn' => intval($getprediction['pcp'] + $getprediction['ptp']),  'tpfn' => intval($getprediction['tpcp'] + $getprediction['tpp'])
        ];
        return $data;
    }

    public function performVector($getprediction, $getSecondPrediction)
    {
        $total = $getprediction["cpcp"] + $getprediction["pcp"] + $getprediction["tpcp"] + $getprediction["cpp"] + $getprediction["pp"] + $getprediction["tpp"] + $getprediction["cptp"] + $getprediction["ptp"] + $getprediction["tptp"];

        $data = [
            'acp' => $getSecondPrediction['cptp']/$total, 'ap' => $getSecondPrediction['ptp']/$total, 'atp' => $getSecondPrediction['tptp']/$total, 'a_hasil_akhir' => (($getSecondPrediction['cptp']+$getSecondPrediction['ptp']+$getSecondPrediction['tptp'])*100)/$total,
            'pcp' => ($getSecondPrediction['cptp'] + $getSecondPrediction['cpfp']) > 0 ? $getSecondPrediction['cptp']/($getSecondPrediction['cptp'] + $getSecondPrediction['cpfp']) : 0, 'pp' => ($getSecondPrediction['ptp'] + $getSecondPrediction['pfp']) > 0 ? $getSecondPrediction['ptp']/($getSecondPrediction['ptp'] + $getSecondPrediction['pfp']) : 0, 'ptp' => ($getSecondPrediction['tptp'] + $getSecondPrediction['tpfp']) > 0 ? $getSecondPrediction['tptp']/($getSecondPrediction['tptp'] + $getSecondPrediction['tpfp']) : 0, 
            'rcp' => ($getSecondPrediction['cptp'] + $getSecondPrediction['cpfn']) > 0 ? $getSecondPrediction['cptp']/($getSecondPrediction['cptp'] + $getSecondPrediction['cpfn']) : 0, 'rp' => ($getSecondPrediction['ptp'] + $getSecondPrediction['pfn']) > 0 ? $getSecondPrediction['ptp']/($getSecondPrediction['ptp'] + $getSecondPrediction['pfn']) : 0, 'rtp' => ($getSecondPrediction['tptp'] + $getSecondPrediction['tpfn']) > 0 ? $getSecondPrediction['tptp']/($getSecondPrediction['tptp'] + $getSecondPrediction['tpfn']) : 0, 
        ];
        return $data;
    }
}
