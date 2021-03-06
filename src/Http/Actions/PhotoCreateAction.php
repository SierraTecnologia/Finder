<?php

namespace Finder\Http\Actions;

use Finder\Http\Resources\PhotoResource;
use Population\Manipule\Managers\PhotoManager;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * Class PhotoCreateAction.
 *
 * @package Finder\Http\Actions
 */
class PhotoCreateAction
{
    /**
     * @var ResponseFactory
     */
    private $responseFactory;

    /**
     * @var PhotoManager
     */
    private $photoManager;

    /**
     * PhotoCreateAction constructor.
     *
     * @param ResponseFactory $responseFactory
     * @param PhotoManager    $photoManager
     */
    public function __construct(ResponseFactory $responseFactory, PhotoManager $photoManager)
    {
        $this->responseFactory = $responseFactory;
        $this->photoManager = $photoManager;
    }

    /**
     * @apiVersion        1.0.0
     * @api               {post} /v1/photos Create
     * @apiName           Create
     * @apiGroup          Photos
     * @apiHeader         {String} Accept application/json
     * @apiHeader         {String} Content-type multipart/form-data
     * @apiParam          {File{1KB..20MB}=JPEG} file Photo file.
     * @apiParam          {Object} location Photo location.
     * @apiParam          {Number{-90-90}} location.latitude Photo location latitude.
     * @apiParam          {Number{-180-180}} location.longitude Photo location longitude.
     * @apiSuccessExample {json} Success-Response:
     * HTTP/1.1 201 Created
     * {
     *     "id": 1,
     *     "created_by_user_id" 1,
     *     "avg_color": "#000000",
     *     "created_at": "2099-12-31T23:59:59+00:00",
     *     "location": {
     *         "latitude": 49.85,
     *         "longitude": 24.0166666667
     *     }
     *     "exif": {
     *         "manufacturer": "Manufacturer Name",
     *         "model": "Model Number",
     *         "exposure_time": "1/160",
     *         "aperture": "f/11.0",
     *         "iso": 200,
     *         "taken_at": "2099-12-31T23:59:59+00:00",
     *         "software": "Software Name"
     *     },
     *     "thumbnails": [
     *         "medium": {
     *             "url": "http://path/to/photo/thumbnail/medium_file"
     *             "width": 500,
     *             "height": 500
     *         },
     *         "large": {
     *              "url": "http://path/to/photo/thumbnail/large_file"
     *              "width": 1000,
     *              "height": 1000
     *         }
     *     ]
     * }
     */

    /**
     * Create a photo.
     *
     * @param  Request $request
     * @return JsonResponse
     */
    public function __invoke(Request $request): JsonResponse
    {
        $request->merge(['created_by_user_id' => $request->user()->id]);

        $photo = $this->photoManager->create($request->all());

        return $this->responseFactory->json(new PhotoResource($photo), JsonResponse::HTTP_CREATED);
    }
}
