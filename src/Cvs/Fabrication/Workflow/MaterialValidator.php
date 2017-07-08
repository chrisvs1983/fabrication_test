<?php

namespace Cvs\Fabrication\Workflow;

use Cvs\Fabrication\Models\Material;
use Validator;

class MaterialValidator
{

    /**
     * Determine if the given material is valid for complete status.
     *
     * @param Material $material
     *
     * @return bool / Validator
     */
    public function complete(Material $material)
    {
        return Validator::make($material->toArray(), [
            'title' => 'required|min:15',
        ]);
    }

    /**
     * Determine if the given material is valid for verify status.
     *
     * @param Material $material
     *
     * @return bool / Validator
     */
    public function verify(Material $material)
    {
        return Validator::make($material->toArray(), [
            'title'  => 'required|min:15',
            'status' => 'in:complete',
        ]);
    }

    /**
     * Determine if the given material is valid for approve status.
     *
     * @param Material $material
     *
     * @return bool / Validator
     */
    public function approve(Material $material)
    {
        return Validator::make($material->toArray(), [
            'title'  => 'required|min:15',
            'status' => 'in:verify',
        ]);

    }

    /**
     * Determine if the given material is valid for publish status.
     *
     * @param Material $material
     *
     * @return bool / Validator
     */
    public function publish(Material $material)
    {
        return Validator::make($material->toArray(), [
            'title'       => 'required|min:15',
            'description' => 'required|min:50',
            'status'      => 'in:approve,archive,unpublish',
        ]);

    }

    /**
     * Determine if the given material is valid for archive status.
     *
     * @param Material $material
     *
     * @return bool / Validator
     */
    public function archive(Material $material)
    {
        return Validator::make($material->toArray(), [
            'title'       => 'required|min:15',
            'description' => 'required|min:50',
            'status'      => 'in:approve,publish,unpublish',
        ]);

    }

    /**
     * Determine if the given material is valid for unpublish status.
     *
     * @param Material $material
     *
     * @return bool / Validator
     */
    public function unpublish(Material $material)
    {
        return Validator::make($material->toArray(), [
            'title'       => 'required|min:15',
            'description' => 'required|min:50',
            'status'      => 'in:publish',
        ]);

    }
}
