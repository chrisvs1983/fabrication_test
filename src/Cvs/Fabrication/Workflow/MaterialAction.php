<?php

namespace Cvs\Fabrication\Workflow;

use Exception;
use Litepie\Workflow\Exceptions\WorkflowActionNotPerformedException;

use Cvs\Fabrication\Models\Material;

class MaterialAction
{
    /**
     * Perform the complete action.
     *
     * @param Material $material
     *
     * @return Material
     */
    public function complete(Material $material)
    {
        try {
            $material->status = 'complete';
            return $material->save();
        } catch (Exception $e) {
            throw new WorkflowActionNotPerformedException();
        }
    }

    /**
     * Perform the verify action.
     *
     * @param Material $material
     *
     * @return Material
     */public function verify(Material $material)
    {
        try {
            $material->status = 'verify';
            return $material->save();
        } catch (Exception $e) {
            throw new WorkflowActionNotPerformedException();
        }
    }

    /**
     * Perform the approve action.
     *
     * @param Material $material
     *
     * @return Material
     */public function approve(Material $material)
    {
        try {
            $material->status = 'approve';
            return $material->save();
        } catch (Exception $e) {
            throw new WorkflowActionNotPerformedException();
        }
    }

    /**
     * Perform the publish action.
     *
     * @param Material $material
     *
     * @return Material
     */public function publish(Material $material)
    {
        try {
            $material->status = 'publish';
            return $material->save();
        } catch (Exception $e) {
            throw new WorkflowActionNotPerformedException();
        }
    }

    /**
     * Perform the archive action.
     *
     * @param Material $material
     *
     * @return Material
     */
    public function archive(Material $material)
    {
        try {
            $material->status = 'archive';
            return $material->save();
        } catch (Exception $e) {
            throw new WorkflowActionNotPerformedException();
        }
    }

    /**
     * Perform the unpublish action.
     *
     * @param Material $material
     *
     * @return Material
     */
    public function unpublish(Material $material)
    {
        try {
            $material->status = 'unpublish';
            return $material->save();
        } catch (Exception $e) {
            throw new WorkflowActionNotPerformedException();
        }
    }
}
