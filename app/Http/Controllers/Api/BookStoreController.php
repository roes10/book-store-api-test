<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBookStoreRequest;
use App\Http\Requests\UpdateBookStoreRequest;
use App\Http\Resources\BookStoreResource;
use App\Repositories\BookStore\BookStoreRepositoryInterface;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class BookStoreController extends Controller
{
    public function __construct(private BookStoreRepositoryInterface $bookStoreRepository)
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return AnonymousResourceCollection
     */
    public function index()
    {
        return BookStoreResource::collection($this->bookStoreRepository->all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreBookStoreRequest $request
     * @return BookStoreResource
     */
    public function store(StoreBookStoreRequest $request)
    {
        $validatedData = $request->validated();
        $bookStore = $this->bookStoreRepository->create($validatedData);
        return new BookStoreResource($bookStore);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return BookStoreResource|JsonResponse
     */
    public function show(int $id)
    {
        try {
            return new BookStoreResource($this->bookStoreRepository->byId($id));
        } catch (Exception $exception) {
            return response()->json(['data' => $exception->getMessage()], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateBookStoreRequest $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(UpdateBookStoreRequest $request, int $id)
    {
        $this->bookStoreRepository->update($id, $request->all());
        return response()->json(null, 204);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function destroy(int $id)
    {
        try {
            $this->bookStoreRepository->delete($id);
            return response()->json(null, 204);
        } catch (Exception $exception) {
            return response()->json(['data' => $exception->getMessage()], 404);
        }
    }
}
