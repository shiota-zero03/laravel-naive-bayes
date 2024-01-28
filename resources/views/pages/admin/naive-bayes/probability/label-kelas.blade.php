<div class="mx-md-5 card p-3 border shadow-lg table-responsive">
    <table class="table table-bordered border-dark text-dark rounded">
        <thead>
            <tr class="bg-primary">
                <th class="text-white">Atribut</th>
                <th class="text-white">Nilai Probabilitas</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>PUAS</td>
                <td>
                    @if( ($kelas['PUAS'] + $kelas['CUKUP PUAS'] + $kelas['TIDAK PUAS']) > 0 )
                        {{ number_format($kelas['PUAS'] / ($kelas['PUAS'] + $kelas['CUKUP PUAS'] + $kelas['TIDAK PUAS']), 1, '.', '') }}</td>
                    @else
                        0
                    @endif
            </tr>
            <tr>
                <td>CUKUP PUAS</td>
                <td>
                    @if( ($kelas['PUAS'] + $kelas['CUKUP PUAS'] + $kelas['TIDAK PUAS']) > 0 )
                        {{ number_format($kelas['CUKUP PUAS'] / ($kelas['PUAS'] + $kelas['CUKUP PUAS'] + $kelas['TIDAK PUAS']), 1, '.', '') }}</td>
                    @else
                        0
                    @endif
            </tr>
            <tr>
                <td>TIDAK PUAS</td>
                <td>
                    @if( ($kelas['PUAS'] + $kelas['CUKUP PUAS'] + $kelas['TIDAK PUAS']) > 0 )
                        {{ number_format($kelas['TIDAK PUAS'] / ($kelas['PUAS'] + $kelas['CUKUP PUAS'] + $kelas['TIDAK PUAS']), 1, '.', '') }}</td>
                    @else
                        0
                    @endif
            </tr>
            <tr class="bg-secondary">
                <td class="text-white">TOTAL</td>
                <td class="text-white">
                    @if( ($kelas['PUAS'] + $kelas['CUKUP PUAS'] + $kelas['TIDAK PUAS']) > 0 )
                        1
                    @else
                        0
                    @endif
                </td>
            </tr>
        </tbody>
    </table>
</div>