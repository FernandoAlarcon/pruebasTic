<?php

namespace App\Http\Controllers;

use App\Models\Productos;
use Illuminate\Http\Request;

class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {
            $data = $request->input('data');
            $productos = Productos::join( 'categorias AS C', 'C.id','=','productos.categoria' )
            ->where( 'productos.nombre', 'LIKE','%'.$data.'%' )
            ->orWhere( 'productos.descripcion', 'LIKE','%'.$data.'%' )
            ->orWhere( 'productos.peso', 'LIKE','%'.$data.'%' )
            ->orWhere( 'C.nombre','LIKE','%'.$data.'%' )
            ->paginate(5);


            return [
                'pagination' => [
                    'total'         => $productos->total(),
                    'current_page'  => $productos->currentPage(),
                    'per_page'      => $productos->perPage(),
                    'last_page'     => $productos->lastPage(),
                    'from'          => $productos->firstItem(),
                    'to'            => $productos->lastItem(),
                ],
                'productos' => $productos
            ];
        } catch (\Exception $e) {
			return $this->capturar($e, 'Error al consultar listados de productos');
		}
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
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function show(Productos $productos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function edit(Productos $productos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Productos $productos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Productos $productos)
    {
        //
    }
}
