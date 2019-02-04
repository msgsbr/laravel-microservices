<?php
namespace App\Http\Controllers;

use App\Services\ArmazemService;
use Beethoven\Http\Request;
use Beethoven\Routing\Controller;
use App\Http\Requests\ArmazemRequestAll;
use App\Http\Requests\ArmazemRequestGet;
use App\Http\Requests\ArmazemRequestAdd;
use App\Http\Requests\ArmazemRequestPut;
use App\Http\Requests\ArmazemRequestRemove;

/**
 * Class ArmazemController
 * @package App\Http\Controllers
 */
class ArmazemController extends Controller
{
    /**
     * @param \App\Services\ArmazemService         $service
     * @param \App\Http\Requests\ArmazemRequestAll $request
     * @return mixed
     */
    public function all(ArmazemRequestAll $request, ArmazemService $service)
    {
        $service = $service->read()->toArray();
        return $request->response($service);
    }
    
    /**
     * @param \App\Http\Requests\ArmazemRequestGet $request
     * @param                                      $id
     * @param \App\Services\ArmazemService         $service
     * @return mixed
     */
    public function get(ArmazemRequestGet $request, $id, ArmazemService $service)
    {
        $service = $service->findOneById($id);
        return $request->response($service);
    }

    /**
     * @param \App\Http\Requests\ArmazemRequestAdd $request
     * @param                                      $id
     * @param \App\Services\ArmazemService         $service
     * @return mixed
     */
    public function add(ArmazemRequestAdd $request, ArmazemService $service)
    {  
        $armazem = $service->addArmazem($request->getBody()->toArray());
        return $request->response($armazem);
    }
    
    /**
     * @param \App\Http\Requests\ArmazemRequestPut $request
     * @param                                      $id
     * @param \App\Services\ArmazemService         $service
     * @return mixed
     */
    public function put(ArmazemRequestPut $request, $id, ArmazemService $service)
    {
        $response = $service->putArmazem($id,$request->getBody()->toArray());
        return $request->response($response); 
    }
    
    /**
     * @param \App\Http\Requests\ArmazemRequestRemove $request
     * @param                                    $id
     * @param \App\Services\ArmazemService         $service
     * @return mixed
     */
    public function remove(ArmazemRequestRemove $request, $id, ArmazemService $service)
    {
        $response = $service->removeArmazem($id);
        return $request->response($response);
    }
}