@for( $i = 0; $i < 15; $i++ )
<div class="card mx-md-5 p-3 border shadow-lg table-responsive mb-3">
    <table class="table table-bordered border-dark text-dark">
        <thead>
            <tr class="bg-primary">
                <th class="text-white" colspan="4">
                    @php
                        $label = \DB::table('probabilitas_labels')->where('id', $i+3)->first();
                    @endphp
                    
                    {{ $label->label }}
                        
                </th>
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
                <th>CUKUP PUAS</th>
                <th>
                    @if(isset($question[0])) 
                        @if($kelas['PUAS'] == 0)
                            0
                        @else
                            {{ number_format(($question[$i][0][0]->puas/$kelas['PUAS']), 1, '.', '') }} 
                        @endif
                    @else 
                        0 
                    @endif
                </th>
                <th>
                    @if(isset($question[0])) 
                        @if($kelas['CUKUP PUAS'] == 0)
                            0
                        @else
                            {{ number_format(($question[$i][0][0]->cukup_puas/$kelas['CUKUP PUAS']), 1, '.', '') }} 
                        @endif
                    @else 
                        0 
                    @endif
                </th>
                <th>
                    @if(isset($question[0])) 
                        @if($kelas['TIDAK PUAS'] == 0)
                            0
                        @else
                            {{ number_format(($question[$i][0][0]->tidak_puas/$kelas['TIDAK PUAS']), 1, '.', '') }} 
                        @endif
                    @else 
                        0 
                    @endif
                </th>
            </tr>
            <tr>
                <th>PUAS</th>
                <th>
                    @if(isset($question[0])) 
                        @if($kelas['PUAS'] == 0)
                            0
                        @else
                            {{ number_format(($question[$i][1][0]->puas/$kelas['PUAS']), 1, '.', '') }} 
                        @endif
                    @else 
                        0 
                    @endif
                </th>
                <th>
                    @if(isset($question[0])) 
                        @if($kelas['CUKUP PUAS'] == 0)
                            0
                        @else
                            {{ number_format(($question[$i][1][0]->cukup_puas/$kelas['CUKUP PUAS']), 1, '.', '') }} 
                        @endif
                    @else 
                        0 
                    @endif
                </th>
                <th>
                    @if(isset($question[0])) 
                        @if($kelas['TIDAK PUAS'] == 0)
                            0
                        @else
                            {{ number_format(($question[$i][1][0]->tidak_puas/$kelas['TIDAK PUAS']), 1, '.', '') }} 
                        @endif
                    @else 
                        0 
                    @endif
                </th>
            </tr>
            <tr>
                <th>TIDAK PUAS</th>
                <th>
                    @if(isset($question[0])) 
                        @if($kelas['PUAS'] == 0)
                            0
                        @else
                            {{ number_format(($question[$i][2][0]->puas/$kelas['PUAS']), 1, '.', '') }} 
                        @endif
                    @else 
                        0 
                    @endif
                </th>
                <th>
                    @if(isset($question[0])) 
                        @if($kelas['CUKUP PUAS'] == 0)
                            0
                        @else
                            {{ number_format(($question[$i][2][0]->cukup_puas/$kelas['CUKUP PUAS']), 1, '.', '') }} 
                        @endif
                    @else 
                        0 
                    @endif
                </th>
                <th>
                    @if(isset($question[0])) 
                        @if($kelas['TIDAK PUAS'] == 0)
                            0
                        @else
                            {{ number_format(($question[$i][2][0]->tidak_puas/$kelas['TIDAK PUAS']), 1, '.', '') }} 
                        @endif
                    @else 
                        0 
                    @endif
                </th>
            </tr>
            <tr class="bg-secondary">
                <th class="text-white">TOTAL</th>
                <th class="text-white">@if(isset($question[0])) @if($kelas['PUAS'] == 0) 0 @else 1 @endif @else 0 @endif</th>
                <th class="text-white">@if(isset($question[0])) @if($kelas['CUKUP PUAS'] == 0) 0 @else 1 @endif @else 0 @endif</th>
                <th class="text-white">@if(isset($question[0])) @if($kelas['TIDAK PUAS'] == 0) 0 @else 1 @endif @else 0 @endif</th>
            </tr>
        </tbody>
    </table>
</div>
@endfor