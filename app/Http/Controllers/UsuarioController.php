  <?php

namespace App\Http\Controllers;

use App\Http\Controller\Controller;
use App\Http\Requests;

use Illuminate\Http\Request;
use App\Models\usuario;
/*
use response;

use Illuminate\Support\Facades\Cache;

*/
class UsuarioController extends Controller
{

    public function __construct(){
    $this->middleware('auth.basic',['only'=>['store','login']]);
  }


  public function index(){
    $usuariosList = usuario::all();
    $usuarios = response()->json($usuariosList);
    return $usuarios;
  }

  public function store(Request $request){

    if(!$request->get('nombre') || !$request->get('clave') || !$request->get('tipo') || !$request->get('fecha_registro')){
      return response()->json(['datos'=>'Datos invalidados'],202);
    }
    usuario::create([$request->all()]);
    return response()->json(['datos'=>'El usuario a sido creado'],202);
  }

  public function login(Request $request){

      try{

      $nombre = $request->get('nombre');
      $clave = $request->get('clave');

      $nombreUsu = usuario::where('nombre','=',$nombre)->get();
      $claveUsu = usuario::where('clave','=',$clave)->get();

          if($nombreUsu==$claveUsu){
              return response()->json(['type' => 'success', 'message' => 'Usuario valido'], 200);
          }

          throw new \Exception('Usuario no encontrado');

      }catch(\Exception $exception){
          return response()->json(['type' => 'error', 'message' => $exception->getMessage()], 500);
      }

  }

     public function show($id){
      try{
          $usuario = usuario::find($id);

          if($usuario == null)
              throw new \Exception('Usuario no encontrado');

          return $usuario;

      }catch(\Exception $exception){
          return response()->json(['type' => 'error', 'message' => $exception->getMessage()], 500);
      }
  }

/*
public function store(Request $request)
    {
        if (!is_array($request->all())) {
            return ['error' => 'request must be an array'];
        }

        $rules = [
            'nombre'     => 'required',
            'clave'  => 'required|email'
            ];

        try {

            $validator = \Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return [
                    'created' => false,
                    'errors'  => $validator->errors()->all()
                ];
            }

            User::create($request->all());
            return ['created' => true];
        } catch (Exception $e) {
            // Si algo sale mal devolvemos un error.
            \Log::info('Error creating user: '.$e);
            return \Response::json(['created' => false], 500);
        }
    }


*/

}
