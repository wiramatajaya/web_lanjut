<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SuratMasukController extends Controller
{

   public function index(){
    $suratMasuk = [
        [
            'id' => 1,
            'nomor_surat' => '002/BAA/X/2026',
            'tanggal'     => '14-10-2026',
            'pengirim'    => 'BAA',
            'perihal'     => 'Edaran Akademik',
        ],
        [
            'id'          => 2,
            'nomor_surat' => '003/LPM/X/2026',
            'tanggal'     => '18-10-2026',
            'pengirim'    => 'LPM',
            'perihal'     => 'Sosialisasi Pedoman',
        ]
    ];

    return view ('surat-masuk.index', compact('suratMasuk'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()    
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {   
         $suratMasukShow = [1=>[
            'id' => 1,
            'nomor_surat' => '002/BAA/X/2026',
            'tanggal'     => '14-10-2026',
            'pengirim'    => 'BAA',
            'perihal'     => 'Edaran Akademik',
        ],3=>[
            'id'          => 2,
            'nomor_surat' => '003/LPM/X/2026',
            'tanggal'     => '18-10-2026',
            'pengirim'    => 'LPM',
            'perihal'     => 'Sosialisasi Pedoman',
        ]
    ];
        $surat = $suratMasukShow[$id]??null;
    
        return view('surat-masuk.show',compact('surat'));

    
    }
    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
