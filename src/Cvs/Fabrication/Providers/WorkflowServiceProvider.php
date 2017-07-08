<?php

namespace Cvs\Fabrication\Providers;

use Litepie\Contracts\Workflow\Workflow as WorkflowContract;
use Litepie\Foundation\Support\Providers\WorkflowServiceProvider as ServiceProvider;

class WorkflowServiceProvider extends ServiceProvider
{
    /**
     * The validators mappings for the package.
     *
     * @var array
     */
    protected $validators = [
        // Bind Material validator
        \Cvs\Fabrication\Models\Material::class => \Cvs\Fabrication\Workflow\MaterialValidator::class,

        // Bind Product validator
        \Cvs\Fabrication\Models\Product::class => \Cvs\Fabrication\Workflow\ProductValidator::class,
    ];

    /**
     * The actions mappings for the package.
     *
     * @var array
     */
    protected $actions = [
        // Bind Material actions
        \Cvs\Fabrication\Models\Material::class => \Cvs\Fabrication\Workflow\MaterialAction::class,

        // Bind Product actions
        \Cvs\Fabrication\Models\Product::class => \Cvs\Fabrication\Workflow\ProductAction::class,
    ];

    /**
     * The notifiers mappings for the package.
     *
     * @var array
     */
    protected $notifiers = [
       // Bind Material notifiers
        \Cvs\Fabrication\Models\Material::class => \Cvs\Fabrication\Workflow\MaterialNotifier::class,

        // Bind Product notifiers
        \Cvs\Fabrication\Models\Product::class => \Cvs\Fabrication\Workflow\ProductNotifier::class,
    ];

    /**
     * Register any package workflow validation services.
     *
     * @param \Litepie\Contracts\Workflow\Workflow $workflow
     *
     * @return void
     */
    public function boot(WorkflowContract $workflow)
    {
        parent::registerValidators($workflow);
        parent::registerActions($workflow);
        parent::registerNotifiers($workflow);
    }
}
