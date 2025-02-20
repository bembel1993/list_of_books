<?php

namespace App\Http\Controllers\Swagger;
use App\Http\Controllers\Controller;
/**
 * @OA\Post(
 *      path="/addindb/",
 *      summary="Create book",
 *      tags={"CrudController"},
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
 * @OA\Get(
 *      path="/books/",
 *      summary="Read book",
 *      tags={"CrudController"},
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
 *          description="OK",
 *          @OA\JsonContent(
 *              @OA\Property(property="data", type="array", @OA\Items(
 *                  @OA\Property(property="id", type="integer", example=1),
 *                  @OA\Property(property="title", type="string", example="Some title"),
 *                  @OA\Property(property="author", type="string", example="Some author"),
 *                  @OA\Property(property="published_year", type="integer", example=2025),
 *                  @OA\Property(property="isbn", type="string", example="Some isbn"),
 *              )),
 *          ),
 *      ),
 * ),
 * 
 * 
 * @OA\Get(
 *      path="/books.delete/{id}/",
 *      summary="Delete book",
 *      tags={"CrudController"},
 *      @OA\Parameter(
 *          description="ID book",
 *          in="path",
 *          name="id",
 *          required=true,
 *          example=1
 *      ),
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
 * @OA\Get(
 *      path="/books.formedit/{id}/",
 *      summary="Show form update book",
 *      tags={"CrudController"},
 *      @OA\Parameter(
 *          description="ID book",
 *          in="path",
 *          name="id",
 *          required=true,
 *          example=1
 *      ),
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
class CrudController extends Controller
{

}
