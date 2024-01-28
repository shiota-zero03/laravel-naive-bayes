<div class="card mx-md-5 p-3 border shadow-lg table-responsive mb-3">
    <table class="table table-bordered border-dark text-dark">
        <thead>
            <tr class="bg-primary">
                <th class="text-white" colspan="4">JENIS KELAMIN</th>
            </tr>
            <tr class="bg-dark">
                <th class="text-white">#</th>
                <th class="text-white">PUAS</th>
                <th class="text-white">CUKUP PUAS</th>
                <th class="text-white">TIDAK PUAS</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th>Laki - Laki</th>
                <th>
                    @if(isset($jenis_kelamin[0])) 
                        @if($kelas['PUAS'] == 0)
                            0
                        @else 
                            {{ number_format(($jenis_kelamin[0][0]->puas/$kelas['PUAS']), 1, '.', '') }} 
                        @endif
                    @else 
                        0 
                    @endif
                </th>
                <th>
                    @if(isset($jenis_kelamin[0]))
                        @if($kelas['CUKUP PUAS'] == 0)
                            0
                        @else 
                            {{ number_format(($jenis_kelamin[0][0]->cukup_puas/$kelas['CUKUP PUAS']), 1, '.', '') }} 
                        @endif
                    @else 
                        0 
                    @endif
                </th>
                <th>
                    @if(isset($jenis_kelamin[0])) 
                        @if($kelas['TIDAK PUAS'] == 0)
                            0
                        @else 
                            {{ number_format(($jenis_kelamin[0][0]->tidak_puas/$kelas['TIDAK PUAS']), 1, '.', '') }} 
                        @endif
                    @else 
                        0 
                    @endif
                </th>
            </tr>
            <tr>
                <th>Perempuan</th>
                <th>
                    @if(isset($jenis_kelamin[0]))
                        @if($kelas['PUAS'] == 0)
                            0
                        @else 
                            {{ number_format(($jenis_kelamin[1][0]->puas/$kelas['PUAS']), 1, '.', '') }}
                        @endif
                    @else
                        0 
                    @endif
                </th>
                <th>
                    @if(isset($jenis_kelamin[0]))
                        @if($kelas['CUKUP PUAS'] == 0)
                            0
                        @else 
                            {{ number_format(($jenis_kelamin[1][0]->cukup_puas/$kelas['CUKUP PUAS']), 1, '.', '') }}
                        @endif
                    @else
                        0 
                    @endif
                </th>
                <th>
                    @if(isset($jenis_kelamin[0]))
                        @if($kelas['TIDAK PUAS'] == 0)
                            0
                        @else 
                            {{ number_format(($jenis_kelamin[1][0]->tidak_puas/$kelas['TIDAK PUAS']), 1, '.', '') }}
                        @endif
                    @else
                        0 
                    @endif
                </th>
            </tr>
            <tr class="bg-secondary">
                <th class="text-white">TOTAL</th>
                <th class="text-white">@if(isset($jenis_kelamin[0])) @if($kelas['PUAS'] == 0) 0 @else 1 @endif @else 0 @endif</th>
                <th class="text-white">@if(isset($jenis_kelamin[0])) @if($kelas['CUKUP PUAS'] == 0) 0 @else 1 @endif @else 0 @endif</th>
                <th class="text-white">@if(isset($jenis_kelamin[0])) @if($kelas['TIDAK PUAS'] == 0) 0 @else 1 @endif @else 0 @endif</th>
            </tr>
        </tbody>
    </table>
</div>