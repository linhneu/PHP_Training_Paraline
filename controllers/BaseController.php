
<?php
class BaseController
{
    const VIEW_FOLDER_NAME = 'views';
    const MODEL_FOLDER_NAME = 'models';
    /*
    path name: foldername.fileName.name
    lấy từ sau thư mục view
    */
    protected function view($viewPath, array $data = []) {
        foreach($data as $key => $value) {
            $$key = $value;
        }
        $viewPath = self::VIEW_FOLDER_NAME . '/'. str_replace('.','/', $viewPath).'.php';
        
         require ($viewPath);

    }
    protected function loadModel($modelPath) {
        $modelPath = self::MODEL_FOLDER_NAME . '/' . $modelPath . '.php';
        
        require ($modelPath);

    }
}