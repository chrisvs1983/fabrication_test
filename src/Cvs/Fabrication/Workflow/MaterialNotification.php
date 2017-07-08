<?php

namespace Cvs\Fabrication\Workflow;

use Cvs\Fabrication\Models\Material;
use Cvs\Fabrication\Notifications\Material as MaterialNotifyer;
use Notification;

class MaterialNotification
{

    /**
     * Send the notification to the users after complete.
     *
     * @param Material $material
     *
     * @return void
     */
    public function complete(Material $material)
    {
        return Notification::send($material->user, new MaterialNotifyer($material, 'complete'));;
    }

    /**
     * Send the notification to the users after verify.
     *
     * @param Material $material
     *
     * @return void
     */
    public function verify(Material $material)
    {
        return Notification::send($material->user, new MaterialNotifyer($material, 'verify'));;
    }

    /**
     * Send the notification to the users after approve.
     *
     * @param Material $material
     *
     * @return void
     */
    public function approve(Material $material)
    {
        return Notification::send($material->user, new MaterialNotifyer($material, 'approve'));;

    }

    /**
     * Send the notification to the users after publish.
     *
     * @param Material $material
     *
     * @return void
     */
    public function publish(Material $material)
    {
        return Notification::send($material->user, new MaterialNotifyer($material, 'publish'));;
    }

    /**
     * Send the notification to the users after archive.
     *
     * @param Material $material
     *
     * @return void
     */
    public function archive(Material $material)
    {
        return Notification::send($material->user, new MaterialNotifyer($material, 'archive'));;

    }

    /**
     * Send the notification to the users after unpublish.
     *
     * @param Material $material
     *
     * @return void
     */
    public function unpublish(Material $material)
    {
        return Notification::send($material->user, new MaterialNotifyer($material, 'unpublish'));;

    }
}
