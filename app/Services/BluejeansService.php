<?php

namespace Modules\Cocktail\Services;

use App\Services\Service;
use Modules\Events\Entities\Event;

class CocktailEventService extends Service {
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
    public function updateKeepContactSetting($param, $eventId) {
        return $this->addOrUpdateEventField(Event::find($eventId), 'keepContact', $param);
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
        $oldData = $event->event_fields;
        $oldData[$fieldName] = $value;
        // uncomment following if shows array to string conversion
        // $oldData = json_encode($oldData, true);
        $event->update(['event_fields' => $oldData,]);
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