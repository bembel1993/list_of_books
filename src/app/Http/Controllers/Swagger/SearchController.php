<?php

namespace App\Http\Controllers\Swagger;

use App\Http\Controllers\Controller;


/**
 * @OA\Post(
 *      path="/books/search/",
 *      summary="Search book",
 *      tags={"SearchController"},
 * 
 *      @OA\RequestBody(
 *          @OA\JsonContent(
 *              allOf={
 *                 @OA\Schema(
 *                     @OA\Property(property="author", type="string", example="Some author"),
 *                     @OA\Property(property="published_year", type="integer", example=2025),
 *                 ),
 *             },
 *          )
 *      ),
 * 
 *      @OA\Response(
 *          response=200,
 *          description="OK",
 *          @OA\JsonContent(
 *              @OA\Property(property="data", type="object",
 *                  @OA\Property(property="id", type="integer", example=1),
 *                  @OA\Property(property="title", type="string", example="Some title"),
 *                  @OA\Property(property="author", type="string", example="Some author"),
 *                  @OA\Property(property="published_year", type="integer", example=2025),
 *                  @OA\Property(property="isbn", type="string", example="Some isbn"),
 *              ),
 *          ),
 *      ),
 * ),
 */
class SearchController extends Controller
{

}
