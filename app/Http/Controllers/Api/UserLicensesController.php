<?php
declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Helpers\ImageHelper;
use App\Http\Requests\Api\Users\Licenses\CreateLicense;
use App\Models\User;
use App\Models\UserLicense;
use Illuminate\Http\JsonResponse;

class UserLicensesController extends Controller
{
    /** @var ImageHelper */
    private $imageHelper;

    /**
     * UserLicensesController constructor.
     * @param ImageHelper $imageHelper
     */
    public function __construct(ImageHelper $imageHelper)
    {
        $this->imageHelper = $imageHelper;
    }


    public function create(CreateLicense $request): JsonResponse
    {
        /** @var User $user */
        $user = Auth('api')->user();

        $frontPhoto = $this->imageHelper->save($request->frontPhoto, 'licenses/');
        $backPhoto = $this->imageHelper->save($request->backPhoto, 'licenses/');

        $user->licenses()->attach(
            $request->courseId,
            [
                'license_number' => $request->licenseNumber,
                'front_photo' => $frontPhoto,
                'back_photo' => $backPhoto
            ]
        );

        return response()->json('Added Successfully', 200);
    }

    public function delete($id): JsonResponse
    {
        /** @var UserLicense|null $license */
        $license = UserLicense::where(['id' => $id, 'user_id' => Auth('api')->user()->id])->first();

        if (null === $license) {
            return response()->json(['message' => 'license not found'], 404);
        }
        $license->delete();
        return response()->json('Deleted Successfully', 200);
    }

    public function setDefault($id): JsonResponse
    {
        $license = UserLicense::where(['id' => $id, 'user_id' => Auth('api')->user()->id])->first();
        if (null === $license) {
            return response()->json(['message' => 'license not found'], 404);
        }
        /** @var User $user */
        $user = Auth('api')->user();
        $user->default_license = $id;
        $user->save();
        return response()->json('Sat Successfully', 200);
    }
}
