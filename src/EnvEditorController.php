<?php

namespace Mohkoma\LaravelEnvEditor;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\Response;

class EnvEditorController extends Controller
{
    /**
     *  Get the editor page
     *
     * @return \Illuminate\View\View
     */
    public function editor(): View
    {
        // Rteurn view
        return view('env-editor::editor', ['environment' => null]);
    }

    /**
     *  Fetch the environment file
     *
     * @return \Illuminate\Http\Response
     */
    public function fetch(): Response
    {
        // Get the store value
        $env = new EnvEditor(
            config('env_editor.file.disk'),
            config('env_editor.file.path')
        );
        // Rteurn response
        return response([
            'env' => $env->getContent(),
        ]);
    }

    /**
     *  Save the environment file
     *
     * @return \Illuminate\Http\Response
     */
    public function save(Request $request): Response
    {
        // Get the validation rules
        $rules = config('env_editor.validation.rules');
        // Inline validation
        $request->validate(['env' => $rules]);
        // Validate the giving content
        EnvEditor::validate($request->env);
        // Set the env instance
        $env = new EnvEditor(
            config('env_editor.file.disk'),
            config('env_editor.file.path')
        );
        // Write it up
        $env->setContent($request->env);
        // Return response
        return response([
            'env' => $env->getContent(),
        ]);
    }
}
