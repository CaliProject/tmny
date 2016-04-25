<?php

namespace App\Traits;

trait APIResponse {

    /**
     * Return success response accordingly.
     *
     * @param array $attributes
     * @param null  $to
     * @return array
     *
     * @author Cali
     */
    protected function successResponse($attributes = [], $to = null)
    {
        if (request()->ajax())
            return $this->ajaxSuccessResponse($attributes);

        return is_null($to) ? redirect()->back()->with($this->ajaxSuccessResponse($attributes)) :
                redirect($to)->with($this->ajaxSuccessResponse($attributes));
    }

    /**
     * Return error response accordingly.
     *
     * @param array $attributes
     * @param null  $to
     * @return array
     *
     * @author Cali
     */
    protected function errorResponse($attributes = [], $to = null)
    {
        if (request()->ajax())
            return $this->ajaxErrorResponse($attributes);

        return is_null($to) ? redirect()->back()->with($this->ajaxErrorResponse($attributes)) :
                redirect($to)->with($this->ajaxErrorResponse($attributes));
    }

    /**
     * Return success response for AJAX request.
     *
     * @param array|string $attributes
     * @return array
     *
     * @author Cali
     */
    protected function ajaxSuccessResponse($attributes)
    {
        return is_string($attributes) ? [
            'status' => 'success',
            'message' => $attributes
        ] : array_merge(
            ['status' => 'success'],
            $attributes
        );
    }

    /**
     * Return error response for AJAX request.
     *
     * @param array|string $attributes
     * @return array
     *
     * @author Cali
     */
    protected function ajaxErrorResponse($attributes)
    {
        return is_string($attributes) ? [
            'status' => 'success',
            'message' => $attributes
        ] : array_merge(
            ['status' => 'error'],
            $attributes
        );
    }
}