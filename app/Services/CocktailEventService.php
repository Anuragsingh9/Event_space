<?php

namespace App\Services;
use App\BlueJeans;
use App\Services\Service;
// use Modules\Events\Entities\Event;

// class CocktailEventService extends Service {
class CocktailEventService {

    public static function getInstance()
    {
        static $instance = NULL;
        if (NULL === $instance) {
            $instance = new static();
        }
        return $instance;
    }
    /**
     * For updating the keep contact setting to set the
     * event_fields = [
     *      .... => [...],
     *      .... => [...],
     *      'keepContact' => [.....]
     * ]
     *
     * @param $param
     * @param $eventId
     * @return Event
     */ 
    public function updateKeepContactSetting($param, $event_uuid) {

        return $this->addOrUpdateEventField(Event::find($event_uuid), 'keepContact', $param);
    }
    
    public function updateRegistrationForm($param, $event_uuid) {

        return $this->addOrUpdateEventField(BlueJeans::find($event_uuid), 'registration_form', $param);

    }
    /**
     * to set the fields in event_fields column like
     * event_fields = [
     *      $oldFieldName = $value,
     *      $oldFieldName = $value,
     *      $oldFieldName = $value,
     *      $fieldName = $value,
     * ]
     * This will keep the old values and if field name already there then it will update its value
     * otherwise it will add extra key to array so previous will be persists and add new column
     *
     * @param $event
     * @param $fieldName
     * @param $value
     * @return Event
     */
    public function addOrUpdateEventField($event, $fieldName, $value) {

        // $oldData = $event->event_fields;
        $oldData = $event->event_fields;
        $oldData[$fieldName] = $value;
        // uncomment following if shows array to string conversion
        // $oldData = json_encode($oldData, true);
        $event->update(['event_fields' => $oldData,]);
// dd($event);
        return $event;
    }
    
    public function updateBlueJeansSetting($param, $bluejeans_settings) {

        return $this->addOrUpdateBlueJeansField(BlueJeans::find($bluejeans_settings), 'bluejeans', $param,$event_fields);
    }

    public function addOrUpdateBlueJeansField($event, $fieldName, $column_name,$value) {
        $oldData = $event->$column_name;
        $oldData[$fieldName] = $value;
        // uncomment following if shows array to string conversion
        // $oldData = json_encode($oldData, true);
        $event->update(['event_fields' => $oldData,]);
        return $event;
    }
    
}