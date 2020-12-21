<?php


namespace app\controller;


use app\core\BaseController;
use app\core\Request;
use app\model\GuideModel;
use app\model\UserModel;
use Exception;

class CreateGuideController extends BaseController {

    private const VIEW = 'create_guide.twig';
    private const VIEW_SUCCESS = 'success_guide_upload.html';

    private UserModel $userModel;

    public function __construct() {
        parent::__construct();
        $this->userModel = new UserModel();
    }

    function render() {
        $this->__render(self::VIEW);
    }

    function processGuideUpload(Request $request) {
        $guideModel = new GuideModel();
        $guideModel->loadData($request->getBody());

        try {
            $guideModel->validate();
            $fileName = $guideModel->uploadFile($request);
            $userId = $this->userModel->getUserId($this->session->getUsername());
            $guideModel->addGuideToDatabase($fileName, $userId);
        } catch (Exception $exception) {
            print $exception->getMessage();
            $this->__render(self::VIEW,
                [
                    'error' => $exception->getMessage(),
                    'formData' => $guideModel->getFormData()
                ]);
            return;
        }

        # jinak vyrenderujeme success
        $this->__render(self::VIEW_SUCCESS);
    }
}