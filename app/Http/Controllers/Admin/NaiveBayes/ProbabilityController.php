<?php

namespace App\Http\Controllers\Admin\NaiveBayes;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Repositories\DatasetRepository;
use App\Repositories\ProbabilityRepository;
use App\Repositories\KlasifikasiRepository;
use App\Resources\Responses\ApiResponse;

class ProbabilityController extends Controller
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
        if(count($this->datasetRepo->getByType('training')) == 0) $data = [];
        $kelas = $this->probabilitasLabelKelas();
        $jenis_kelamin = $this->getByJenisKelamin();
        $jurusan = $this->getByJurusan();

        $question = [];
        for($i = 1; $i < 16; $i++){
            $question[] = $this->getByQuestion($i);
        }
        $data = [
            'kelas' => $kelas,
            'jenis_kelamin' => $jenis_kelamin[0][0] ? $jenis_kelamin : null,
            'jurusan' => $jurusan[0][0] ? $jurusan : null,
            'question' => $question[0][0][0] ? $question : null
        ];
        return view('pages.admin.naive-bayes.probability.index')->with($data);
    }

    public function store()
    {
        if(count($this->datasetRepo->getByType('training')) == 0) return redirect()->to(route('admin.training.index'))->with('error', 'Harap masukkan data training terlebih dahulu');
        $this->klasRepo->deleteAllData();
        $this->probRepo->deleteAllData();
        $jk = $this->storeByJenisKelamin();
        $jurusan = $this->storeByJurusan();

        $mergeData = [];

        for($i = 1; $i < 16; $i++){
            $mergeData[] = $this->storeByQuestion($i);
        }

        $data = array_merge($jk, $jurusan, $mergeData[0], $mergeData[1], $mergeData[2], $mergeData[3], $mergeData[4], $mergeData[5], $mergeData[6], $mergeData[7], $mergeData[8], $mergeData[9], $mergeData[10], $mergeData[11], $mergeData[12], $mergeData[13], $mergeData[14]);

        $insert = $this->probRepo->insertData($data);
        if($insert){
            return back()->with('success', 'Berhasil menghitung probabilitas');
        }
        return $this->res->errorResponse('Server error', 500);
    }

    public function storeByJenisKelamin()
    {
        $jklkcp = count($this->datasetRepo->getByCategory('training', 'jenis_kelamin', 'Laki - Laki', 'CUKUP PUAS'));
        $jklkp = count($this->datasetRepo->getByCategory('training', 'jenis_kelamin', 'Laki - Laki', 'PUAS'));
        $jklktp = count($this->datasetRepo->getByCategory('training', 'jenis_kelamin', 'Laki - Laki', 'TIDAK PUAS'));

        $jkprcp = count($this->datasetRepo->getByCategory('training', 'jenis_kelamin', 'Perempuan', 'CUKUP PUAS'));
        $jkprp = count($this->datasetRepo->getByCategory('training', 'jenis_kelamin', 'Perempuan', 'PUAS'));
        $jkprtp = count($this->datasetRepo->getByCategory('training', 'jenis_kelamin', 'Perempuan', 'TIDAK PUAS'));

        $data = [
            [ 'label_id' => 1, 'type' => 'Laki - Laki', 'cukup_puas' => $jklkcp, 'puas' => $jklkp, 'tidak_puas' => $jklktp ],
            [ 'label_id' => 1, 'type' => 'Perempuan', 'cukup_puas' => $jkprcp, 'puas' => $jkprp, 'tidak_puas' => $jkprtp ],
        ];

        return $data;
    }
    public function getByJenisKelamin()
    {
        $laki = $this->probRepo->getByTypeandLabel(1, 'Laki - Laki');
        $perempuan = $this->probRepo->getByTypeandLabel(1, 'Perempuan');

        $data = [
            [ $laki ],
            [ $perempuan ],
        ];
        return $data;
    }
    public function storeByJurusan()
    {
        $acp = count($this->datasetRepo->getByCategory('training', 'jurusan', 'Akutansi', 'CUKUP PUAS'));
        $ap = count($this->datasetRepo->getByCategory('training', 'jurusan', 'Akutansi', 'PUAS'));
        $atp = count($this->datasetRepo->getByCategory('training', 'jurusan', 'Akutansi', 'TIDAK PUAS'));

        $mcp = count($this->datasetRepo->getByCategory('training', 'jurusan', 'Manajemen', 'CUKUP PUAS'));
        $mp = count($this->datasetRepo->getByCategory('training', 'jurusan', 'Manajemen', 'PUAS'));
        $mtp = count($this->datasetRepo->getByCategory('training', 'jurusan', 'Manajemen', 'TIDAK PUAS'));

        $micp = count($this->datasetRepo->getByCategory('training', 'jurusan', 'Manajemen Informatika', 'CUKUP PUAS'));
        $mip = count($this->datasetRepo->getByCategory('training', 'jurusan', 'Manajemen Informatika', 'PUAS'));
        $mitp = count($this->datasetRepo->getByCategory('training', 'jurusan', 'Manajemen Informatika', 'TIDAK PUAS'));

        $sicp = count($this->datasetRepo->getByCategory('training', 'jurusan', 'Sistem Informasi', 'CUKUP PUAS'));
        $sip = count($this->datasetRepo->getByCategory('training', 'jurusan', 'Sistem Informasi', 'PUAS'));
        $sitp = count($this->datasetRepo->getByCategory('training', 'jurusan', 'Sistem Informasi', 'TIDAK PUAS'));

        $tacp = count($this->datasetRepo->getByCategory('training', 'jurusan', 'Teknik Aeronautika', 'CUKUP PUAS'));
        $tap = count($this->datasetRepo->getByCategory('training', 'jurusan', 'Teknik Aeronautika', 'PUAS'));
        $tatp = count($this->datasetRepo->getByCategory('training', 'jurusan', 'Teknik Aeronautika', 'TIDAK PUAS'));

        $tecp = count($this->datasetRepo->getByCategory('training', 'jurusan', 'Teknik Elektro', 'CUKUP PUAS'));
        $tep = count($this->datasetRepo->getByCategory('training', 'jurusan', 'Teknik Elektro', 'PUAS'));
        $tetp = count($this->datasetRepo->getByCategory('training', 'jurusan', 'Teknik Elektro', 'TIDAK PUAS'));

        $ticp = count($this->datasetRepo->getByCategory('training', 'jurusan', 'Teknik Industri', 'CUKUP PUAS'));
        $tip = count($this->datasetRepo->getByCategory('training', 'jurusan', 'Teknik Industri', 'PUAS'));
        $titp = count($this->datasetRepo->getByCategory('training', 'jurusan', 'Teknik Industri', 'TIDAK PUAS'));

        $tpcp = count($this->datasetRepo->getByCategory('training', 'jurusan', 'Teknik Penerbangan', 'CUKUP PUAS'));
        $tpp = count($this->datasetRepo->getByCategory('training', 'jurusan', 'Teknik Penerbangan', 'PUAS'));
        $tptp = count($this->datasetRepo->getByCategory('training', 'jurusan', 'Teknik Penerbangan', 'TIDAK PUAS'));

        $data = [
            [ 'label_id' => 2, 'type' => 'Akutansi', 'cukup_puas' => $acp, 'puas' => $ap, 'tidak_puas' => $atp ],
            [ 'label_id' => 2, 'type' => 'Manajemen', 'cukup_puas' => $mcp, 'puas' => $mp, 'tidak_puas' => $mtp ],
            [ 'label_id' => 2, 'type' => 'Manajemen Informatika', 'cukup_puas' => $micp, 'puas' => $mip, 'tidak_puas' => $mitp ],
            [ 'label_id' => 2, 'type' => 'Sistem Informasi', 'cukup_puas' => $sicp, 'puas' => $sip, 'tidak_puas' => $sitp ],
            [ 'label_id' => 2, 'type' => 'Teknik Aeronautika', 'cukup_puas' => $tacp, 'puas' => $tap, 'tidak_puas' => $tatp ],
            [ 'label_id' => 2, 'type' => 'Teknik Elektro', 'cukup_puas' => $tecp, 'puas' => $tep, 'tidak_puas' => $tetp ],
            [ 'label_id' => 2, 'type' => 'Teknik Industri', 'cukup_puas' => $ticp, 'puas' => $tip, 'tidak_puas' => $titp ],
            [ 'label_id' => 2, 'type' => 'Teknik Penerbangan', 'cukup_puas' => $tpcp, 'puas' => $tpp, 'tidak_puas' => $tptp ],
        ];

        return $data;
    }
    public function getByJurusan()
    {
        $Akutansi = $this->probRepo->getByTypeandLabel(2, 'Akutansi');
        $Manajemen = $this->probRepo->getByTypeandLabel(2, 'Manajemen');
        $Manajemen_Informatika = $this->probRepo->getByTypeandLabel(2, 'Manajemen Informatika');
        $Sistem_Informasi = $this->probRepo->getByTypeandLabel(2, 'Sistem Informasi');
        $Teknik_Aeronautika = $this->probRepo->getByTypeandLabel(2, 'Teknik Aeronautika');
        $Teknik_Elektro = $this->probRepo->getByTypeandLabel(2, 'Teknik Elektro');
        $Teknik_Industri = $this->probRepo->getByTypeandLabel(2, 'Teknik Industri');
        $Teknik_Penerbangan = $this->probRepo->getByTypeandLabel(2, 'Teknik Penerbangan');


        $data = [
            [$Akutansi],
            [$Manajemen],
            [$Manajemen_Informatika],
            [$Sistem_Informasi],
            [$Teknik_Aeronautika],
            [$Teknik_Elektro],
            [$Teknik_Industri],
            [$Teknik_Penerbangan],
        ];
        return $data;
    }
    public function storeByQuestion($q)
    {
        $cpcp = intval(count($this->datasetRepo->getByCategory('training', 'q'.$q, 4, 'CUKUP PUAS'))) + intval(count($this->datasetRepo->getByCategory('training', 'q'.$q, 5, 'CUKUP PUAS')));
        $cpp = intval(count($this->datasetRepo->getByCategory('training', 'q'.$q, 4, 'PUAS'))) + intval(count($this->datasetRepo->getByCategory('training', 'q'.$q, 5, 'PUAS')));
        $cptp = intval(count($this->datasetRepo->getByCategory('training', 'q'.$q, 4, 'TIDAK PUAS'))) + intval(count($this->datasetRepo->getByCategory('training', 'q'.$q, 5, 'TIDAK PUAS')));

        $pcp = intval(count($this->datasetRepo->getByCategory('training', 'q'.$q, 3, 'CUKUP PUAS')));
        $pp = intval(count($this->datasetRepo->getByCategory('training', 'q'.$q, 3, 'PUAS')));
        $ptp = intval(count($this->datasetRepo->getByCategory('training', 'q'.$q, 3, 'TIDAK PUAS')));

        $tpcp = intval(count($this->datasetRepo->getByCategory('training', 'q'.$q, 2, 'CUKUP PUAS'))) + intval(count($this->datasetRepo->getByCategory('training', 'q'.$q, 1, 'CUKUP PUAS')));
        $tpp = intval(count($this->datasetRepo->getByCategory('training', 'q'.$q, 2, 'PUAS'))) + intval(count($this->datasetRepo->getByCategory('training', 'q'.$q, 1, 'PUAS')));
        $tptp = intval(count($this->datasetRepo->getByCategory('training', 'q'.$q, 2, 'TIDAK PUAS'))) + intval(count($this->datasetRepo->getByCategory('training', 'q'.$q, 1, 'TIDAK PUAS')));

        $data = [
            [ 'label_id' => $q+2, 'type' => 'CUKUP PUAS', 'cukup_puas' => $pcp, 'puas' => $pp, 'tidak_puas' => $ptp ],
            [ 'label_id' => $q+2, 'type' => 'PUAS', 'cukup_puas' => $cpcp, 'puas' => $cpp, 'tidak_puas' => $cptp ],
            [ 'label_id' => $q+2, 'type' => 'TIDAK PUAS', 'cukup_puas' => $tpcp, 'puas' => $tpp, 'tidak_puas' => $tptp ],
        ];

        return $data;
    }
    public function getByQuestion($q)
    {
        $cukup = $this->probRepo->getByTypeandLabel($q+2, 'CUKUP PUAS');
        $puas = $this->probRepo->getByTypeandLabel($q+2, 'PUAS');
        $tidak = $this->probRepo->getByTypeandLabel($q+2, 'TIDAK PUAS');

        $data = [
            [ $cukup ],
            [ $puas ],
            [ $tidak ]
        ];
        return $data;
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
}
