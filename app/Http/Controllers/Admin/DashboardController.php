<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Repositories\DatasetRepository;
use App\Repositories\UserRepository;
use App\Repositories\VisitorRepository;

class DashboardController extends Controller
{
    private $repo, $repoData, $visitorRepository;
    public function __construct(UserRepository $repo, DatasetRepository $repoData, VisitorRepository $visitorRepository)
    {
        $this->repo = $repo;
        $this->repoData = $repoData;
        $this->visitor = $visitorRepository;
    }
    public function index()
    {
        $user = $this->repo->getAll();
        $count = [
            'user' => count($user),
        ];
        return view('pages.admin.home.index', compact(['count']));
    }
    public function dashboard()
    {
        $startTime = microtime(true);
        $user = $this->repo->getAll();
        $jenis_kelamin = $this->jenisKelamin();
        $result = $this->result();
        $count = [
            'jenis_kelamin' => $jenis_kelamin,
            'result' => $result,
            'user' => count($user),
        ];
        $endTime = microtime(true);
        $executionTime = $endTime - $startTime;
        return view('pages.admin.dashboard.index', compact(['count', 'executionTime']));
    }
    public function visitorJson(){
        return $this->visitor->showByDays(now()->subDays(6), now());
    }
    public function jenisKelamin()
    {
        $ajklk = count($this->repoData->forDashboardByJurusan('jenis_kelamin', 'Akutansi', 'training', 'Laki - Laki'));
        $mjklk = count($this->repoData->forDashboardByJurusan('jenis_kelamin', 'Manajemen', 'training', 'Laki - Laki'));
        $mijklk = count($this->repoData->forDashboardByJurusan('jenis_kelamin', 'Manajemen Informatika', 'training', 'Laki - Laki'));
        $sijklk = count($this->repoData->forDashboardByJurusan('jenis_kelamin', 'Sistem Informasi', 'training', 'Laki - Laki'));
        $tajklk = count($this->repoData->forDashboardByJurusan('jenis_kelamin', 'Teknik Aeronautika', 'training', 'Laki - Laki'));
        $tejklk = count($this->repoData->forDashboardByJurusan('jenis_kelamin', 'Teknik Elektro', 'training', 'Laki - Laki'));
        $tijklk = count($this->repoData->forDashboardByJurusan('jenis_kelamin', 'Teknik Industri', 'training', 'Laki - Laki'));
        $tpjklk = count($this->repoData->forDashboardByJurusan('jenis_kelamin', 'Teknik Penerbangan', 'training', 'Laki - Laki'));

        $ajkpr = count($this->repoData->forDashboardByJurusan('jenis_kelamin', 'Akutansi', 'training', 'Perempuan'));
        $mjkpr = count($this->repoData->forDashboardByJurusan('jenis_kelamin', 'Manajemen', 'training', 'Perempuan'));
        $mijkpr = count($this->repoData->forDashboardByJurusan('jenis_kelamin', 'Manajemen Informatika', 'training', 'Perempuan'));
        $sijkpr = count($this->repoData->forDashboardByJurusan('jenis_kelamin', 'Sistem Informasi', 'training', 'Perempuan'));
        $tajkpr = count($this->repoData->forDashboardByJurusan('jenis_kelamin', 'Teknik Aeronautika', 'training', 'Perempuan'));
        $tejkpr = count($this->repoData->forDashboardByJurusan('jenis_kelamin', 'Teknik Elektro', 'training', 'Perempuan'));
        $tijkpr = count($this->repoData->forDashboardByJurusan('jenis_kelamin', 'Teknik Industri', 'training', 'Perempuan'));
        $tpjkpr = count($this->repoData->forDashboardByJurusan('jenis_kelamin', 'Teknik Penerbangan', 'training', 'Perempuan'));

        $laki = [ $ajklk, $mjklk, $mijklk, $sijklk, $tajklk, $tejklk, $tijklk, $tpjklk];
        $perempuan = [ $ajkpr, $mjkpr, $mijkpr, $sijkpr, $tajkpr, $tejkpr, $tijkpr, $tpjkpr];
        
        $data = [ $laki, $perempuan ];
        return $data;
    }

    public function result()
    {
        $arcp = count($this->repoData->forDashboardByJurusan('result', 'Akutansi', 'training', 'CUKUP PUAS'));
        $mrcp = count($this->repoData->forDashboardByJurusan('result', 'Manajemen', 'training', 'CUKUP PUAS'));
        $mircp = count($this->repoData->forDashboardByJurusan('result', 'Manajemen Informatika', 'training', 'CUKUP PUAS'));
        $sircp = count($this->repoData->forDashboardByJurusan('result', 'Sistem Informasi', 'training', 'CUKUP PUAS'));
        $tarcp = count($this->repoData->forDashboardByJurusan('result', 'Teknik Aeronautika', 'training', 'CUKUP PUAS'));
        $tercp = count($this->repoData->forDashboardByJurusan('result', 'Teknik Elektro', 'training', 'CUKUP PUAS'));
        $tircp = count($this->repoData->forDashboardByJurusan('result', 'Teknik Industri', 'training', 'CUKUP PUAS'));
        $tprcp = count($this->repoData->forDashboardByJurusan('result', 'Teknik Penerbangan', 'training', 'CUKUP PUAS'));

        $arp = count($this->repoData->forDashboardByJurusan('result', 'Akutansi', 'training', 'PUAS'));
        $mrp = count($this->repoData->forDashboardByJurusan('result', 'Manajemen', 'training', 'PUAS'));
        $mirp = count($this->repoData->forDashboardByJurusan('result', 'Manajemen Informatika', 'training', 'PUAS'));
        $sirp = count($this->repoData->forDashboardByJurusan('result', 'Sistem Informasi', 'training', 'PUAS'));
        $tarp = count($this->repoData->forDashboardByJurusan('result', 'Teknik Aeronautika', 'training', 'PUAS'));
        $terp = count($this->repoData->forDashboardByJurusan('result', 'Teknik Elektro', 'training', 'PUAS'));
        $tirp = count($this->repoData->forDashboardByJurusan('result', 'Teknik Industri', 'training', 'PUAS'));
        $tprp = count($this->repoData->forDashboardByJurusan('result', 'Teknik Penerbangan', 'training', 'PUAS'));

        $artp = count($this->repoData->forDashboardByJurusan('result', 'Akutansi', 'training', 'TIDAK PUAS'));
        $mrtp = count($this->repoData->forDashboardByJurusan('result', 'Manajemen', 'training', 'TIDAK PUAS'));
        $mirtp = count($this->repoData->forDashboardByJurusan('result', 'Manajemen Informatika', 'training', 'TIDAK PUAS'));
        $sirtp = count($this->repoData->forDashboardByJurusan('result', 'Sistem Informasi', 'training', 'TIDAK PUAS'));
        $tartp = count($this->repoData->forDashboardByJurusan('result', 'Teknik Aeronautika', 'training', 'TIDAK PUAS'));
        $tertp = count($this->repoData->forDashboardByJurusan('result', 'Teknik Elektro', 'training', 'TIDAK PUAS'));
        $tirtp = count($this->repoData->forDashboardByJurusan('result', 'Teknik Industri', 'training', 'TIDAK PUAS'));
        $tprtp = count($this->repoData->forDashboardByJurusan('result', 'Teknik Penerbangan', 'training', 'TIDAK PUAS'));

        $cukup_puas = [ $arcp, $mrcp, $mircp, $sircp, $tarcp, $tercp, $tircp, $tprcp];
        $puas = [ $arp, $mrp, $mirp, $sirp, $tarp, $terp, $tirp, $tprp];
        $tidak_puas = [ $artp, $mrtp, $mirtp, $sirtp, $tartp, $tertp, $tirtp, $tprtp];
        
        $data = [ $puas, $cukup_puas, $tidak_puas ];
        return $data;
    }
}
