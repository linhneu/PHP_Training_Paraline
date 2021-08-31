<?php
class BaseController
{
    const VIEW_FOLDER_NAME = 'views';
    const MODEL_FOLDER_NAME = 'models';
    public function view($viewPath, array $data = [])
    {
        foreach ($data as $key => $value) {
            $$key = $value; 
        }
        $viewPath = self::VIEW_FOLDER_NAME . '/' . str_replace('.', '/', $viewPath) . '.php';

        require_once($viewPath);
    }
    public function loadModel($modelPath)
    {
        $modelPath = self::MODEL_FOLDER_NAME . '/' . $modelPath . '.php';

        require_once($modelPath);
    }
}
