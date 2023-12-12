<?php

namespace App\Http\Controllers\Swagger;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * @OA\Post(
 *      path="/api/user",
 *      summary="Create User",
 *      tags={"User"},
 * 
 * 
 *      @OA\RequestBody(
 *          @OA\JsonContent(
 *              allOf={
 *                  @OA\Schema(
 *                      @OA\Property(property="name", type="string",example="Alex"),
 *                      @OA\Property(property="email", type="string",example="alex@gmail.com"),
 *                      @OA\Property(property="password", type="string",example="qwerty123_"),
 *                  )    
 *              }      
 *          )
 *      ),
 * 
 *      @OA\Response(
 *      response=200,
 *      description="Ok"
 *      )
 * )
 */
class UserController extends Controller
{
    //
}
