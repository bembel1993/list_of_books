<?php

namespace App\Http\Controllers\Swagger;
use App\Http\Controllers\Controller;
/**
 * @OA\Post(
 *      path="/addindb/",
 *      summary="Add book in DB",
 *      tags={"Post"},
 * 
 *      @OA\RequestBody(
 *          @OA\JsonContent(
 *              allOf={
 *                 @OA\Schema(
 *                     @OA\Property(property="title", type="string", example="Some title"),
 *                     @OA\Property(property="author", type="string", example="Some author"),
 *                     @OA\Property(property="published_year", type="integer", example=2025),
 *                     @OA\Property(property="isbn", type="string", example="Some isbn"),   
 *                 )
 *             },
 *          )
 *      ),
 * 
 *      @OA\Response(
 *          response=200,
 *          description="OK"
 *      )
 * ),
 */
class CrudController extends Controller
{

}
