<?php

namespace App\Http\Controllers\Swagger;

use App\Http\Controllers\Controller;


/**
 * @OA\Post(
 *      path="/books/sortbytitlebottom/",
 *      summary="Sort book by title Z-A",
 *      tags={"SortController"},
 * 
 *      @OA\RequestBody(
 *          @OA\JsonContent(
 *              allOf={
 *                 @OA\Schema(
 *                     @OA\Property(property="title", type="string", example="Some title"),
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
 * 
 * @OA\Post(
 *      path="/books/sortbytitletop/",
 *      summary="Sort book by title A-Z",
 *      tags={"SortController"},
 * 
 *      @OA\RequestBody(
 *          @OA\JsonContent(
 *              allOf={
 *                 @OA\Schema(
 *                     @OA\Property(property="title", type="string", example="Some title"),
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
 * 
 * @OA\Post(
 *      path="/books/sortbyyearbottom/",
 *      summary="Sort book by year 10-1",
 *      tags={"SortController"},
 * 
 *      @OA\RequestBody(
 *          @OA\JsonContent(
 *              allOf={
 *                 @OA\Schema(
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
 * 
 * 
 * @OA\Post(
 *      path="/books/sortbyyeartop/",
 *      summary="Sort book by year 1-10",
 *      tags={"SortController"},
 * 
 *      @OA\RequestBody(
 *          @OA\JsonContent(
 *              allOf={
 *                 @OA\Schema(
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
class SortController extends Controller
{

}
