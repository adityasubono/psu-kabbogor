<?php

namespace App\Http\Controllers;

use App\KoordinatPerumahan;
use App\Perumahans;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Finder\Finder;

class KoordinatPerumahansController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index($id)
    {
        $data_perumahan = Perumahans::find($id);
        $data_koordinat_perumahan = DB::select('SELECT * FROM koordinatperumahans
                                                JOIN perumahans
                                                ON perumahans.id = koordinatperumahans.perumahan_id');


        $data_koordinat_perumahan_group_by = DB::select("SELECT *, COUNT(perumahan_id)
                                                         FROM perumahans
                                                         JOIN koordinatperumahans
                                                         ON perumahans.id = koordinatperumahans.perumahan_id
                                                         GROUP BY koordinatperumahans.perumahan_id
                                                         HAVING COUNT(perumahan_id > 1)");


        $data_koordinat_sarana = DB::select('SELECT * FROM koordinatsaranas
                                             JOIN perumahans
                                             ON perumahans.id = koordinatsaranas.perumahan_id');


        $data_koordinat_sarana_group_by = DB::select('SELECT * FROM koordinatsaranas
                                                      JOIN perumahans
                                                      ON perumahans.id = koordinatsaranas.perumahan_id
                                                      JOIN saranas
                                                      ON saranas.perumahan_id = perumahans.id
                                                      GROUP BY koordinatsaranas.sarana_id');


        $data_koordinat_jalansaluran = DB::select('SELECT * FROM koordinatjalansalurans
                                                   JOIN jalansalurans
                                                   ON jalansalurans.id = koordinatjalansalurans.jalansaluran_id');


        $data_koordinat_jalansaluran_group_by = DB::select('SELECT * FROM koordinatjalansalurans
                                                            JOIN jalansalurans
                                                            ON jalansalurans.id = koordinatjalansalurans.jalansaluran_id
                                                            JOIN perumahans
                                                            ON perumahans.id = jalansalurans.perumahan_id
                                                            GROUP BY koordinatjalansalurans.jalansaluran_id');

        $data_koordinat_taman = DB::select('SELECT * FROM koordinattamans
                                            JOIN tamans
                                            ON tamans.id = koordinattamans.taman_id');


        $data_koordinat_taman_group_by = DB::select('SELECT * FROM koordinattamans
                                                     JOIN tamans
                                                     ON tamans.id = koordinattamans.taman_id
                                                     JOIN perumahans
                                                     ON perumahans.id = tamans.perumahan_id
                                                     GROUP BY koordinattamans.taman_id');


        return view(
            'PSU_Perumahan.koordinat_perumahan.koordinat_perumahan',
            compact('data_perumahan', 'data_koordinat_perumahan','data_koordinat_perumahan_group_by',
            'data_koordinat_taman','data_koordinat_taman_group_by','data_koordinat_jalansaluran',
            'data_koordinat_sarana','data_koordinat_sarana_group_by',
            'data_koordinat_jalansaluran_group_by','data_koordinat_taman','data_koordinat_taman_group_by')
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        //
        $rules = [
            'data_koordinat.*.longitude' => 'required',
            'data_koordinat.*.latitude' => 'required',
        ];

        $customMessages = [
            'required' => 'Masukan Data :attribute ini ?.',
            'data_koordinat.*.longitude.required' => "Masukan Koordinat Longitude ?",
            'data_koordinat.*.latitude.required' => "Masukan Koordinat Latitude ?",
        ];

        $this->validate($request, $rules, $customMessages);

        foreach ($request->data_koordinat as $key => $value) {
            KoordinatPerumahan::create($value);
        }

        $perumahan_id = $request->data_koordinat[0]['perumahan_id'];

        return redirect()->action('PerumahansController@edit', ['id' => $perumahan_id])
            ->with('status', 'Data Dengan ID ' . $perumahan_id . ' Berhasil Di Update');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\KoordinatPerumahan  $koordinatPerumahan
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {

        $koordinat = \DB::table('koordinatperumahans')
            ->join('perumahans', 'perumahans.id', '=', 'koordinatperumahans.perumahan_id')
            ->select(
                'koordinatperumahans.perumahan_id',
                'koordinatperumahans.latitude',
                'koordinatperumahans.longitude',
                'perumahans.id',
                'perumahans.nama_perumahan',
                'perumahans.nama_perumahan',
                'perumahans.lokasi',
                'perumahans.kecamatan',
                'perumahans.kelurahan',
                'perumahans.status_perumahan'
            )
            ->where('koordinatperumahans.perumahan_id', $id)
            ->get();

        $perumahans = Perumahans::select(\DB::raw("SELECT * FROM perumahans a, koordinatperumahans b WHERE a.id = b.perumahan_id"));

        $data_perumahan = Perumahans::find($id);
        return view('PSU_Perumahan.koordinat_perumahan.show', compact('koordinat', 'perumahans', 'data_perumahan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\KoordinatPerumahan  $koordinatPerumahan
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(KoordinatPerumahan $koordinatPerumahan)
    {
        //
        return view('PSU_Perumahan.koordinat_perumahan.edit', compact('koordinatPerumahan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\KoordinatPerumahan  $koordinatPerumahan
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, KoordinatPerumahan $koordinatPerumahan)
    {
        //
        $rules = [
            'longitude' => 'required',
            'latitude' => 'required',
        ];

        $customMessages = [
            'required' => 'Masukan Data :attribute ini ?.',
        ];

        $this->validate($request, $rules, $customMessages);

        $perumahan_id = $request->get('perumahan_id');
        KoordinatPerumahan::where('id', $koordinatPerumahan->id)->update([
            'longitude' => $request->longitude,
            'latitude' => $request->latitude
        ]);
        return redirect()->action('KoordinatPerumahansController@index', ['id' => $perumahan_id])
            ->with('status', 'Data Dengan ID ' . $koordinatPerumahan->id . ' Berhasil Di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\KoordinatPerumahan  $koordinatPerumahan
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request, KoordinatPerumahan $koordinatPerumahan)
    {
        //
        $perumahan_id = $request->get('perumahan_id');
        KoordinatPerumahan::destroy($koordinatPerumahan->id);
        return redirect()->action(
            'PerumahansController@edit',
            ['id' => $perumahan_id]
        )
            ->with('status', 'Data Berhasil Dihapus Dengan ID : ' . $koordinatPerumahan->id);
    }
}
