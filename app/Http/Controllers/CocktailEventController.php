<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
// use Modules\Cocktail\Http\Requests\KeepContactRequest;
use App\Services\CocktailEventService;
use Exception;
use Illuminate\Support\Facades\DB;
// use Modules\Events\Entities\Event;
use Ramsey\Uuid\Uuid;

class CocktailEventController extends Controller {
    
    public function __construct() {
        $this->service = CocktailEventService::getInstance();
    }
   

//    public function create() {
//        try {
//            DB::connection('tenant')->beginTransaction();
//
//            DB::connection('tenant')->commit();
//        } catch (Exception $e) {
//            DB::connection('tenant')->rollback();
//            return response()->json(['status' => FALSE, 'msg' => 'Internal Server Error'], 200);
//        }
//    }
    public function updateKeepContactSetting(KeepContactRequest $request) {
        try {
            DB::connection('tenant')->beginTransaction();
            $param = [
                    'page_customisation' => [
                    'keepContact_page_title'       => $request->keepContact_page_title,
                    'keepContact_page_description' => $request->keepContact_page_description,
                    'keepContact_page_logo'        => $request->keepContact_page_logo,
                    'website_page_link'            => $request->website_page_link,
                    'twitter_page_link'            => $request->twitter_page_link,
                    'linkedIn_page_link'           => $request->linkedIn_page_link,
                    'facebook_page_link'           => $request->facebook_page_link,
                    'instagram_page_link'          => $request->instagram_page_link,
                ],
                'graphics_setting'   => [
                    'main_background_color'                  => json_decode($request->main_background_color, TRUE),
                    'texts_color'                            => json_decode($request->texts_color, TRUE),
                    'keepContact_color_1'                    => json_decode($request->keepContact_color_1, TRUE),
                    'keepContact_color_2'                    => json_decode($request->keepContact_color_2, TRUE),
                    'keepContact_background_color_1'         => json_decode($request->keepContact_background_color_1, TRUE),
                    'keepContact_background_color_2'         => json_decode($request->keepContact_background_color_2, TRUE),
                    'keepContact_selected_space_color'       => json_decode($request->keepContact_selected_space_color, TRUE),
                    'keepContact_unselected_space_color'     => json_decode($request->keepContact_unselected_space_color, TRUE),
                    'keepContact_closed_space_color'         => json_decode($request->keepContact_closed_space_color, TRUE),
                    'keepContact_text_space_color'           => json_decode($request->keepContact_text_space_color, TRUE),
                    'keepContact_names_color'                => json_decode($request->keepContact_names_color, TRUE),
                    'keepContact_thumbnail_color'            => json_decode($request->keepContact_thumbnail_color, TRUE),
                    'keepContact_countdown_background_color' => json_decode($request->keepContact_countdown_background_color, TRUE),
                    'keepContact_countdown_text_color'       => json_decode($request->keepContact_countdown_text_color, TRUE),
                    'hover_border_color'                     => json_decode($request->hover_border_color, TRUE),
                ],
                'section_text'       => [
                    'reply_text'                => $request->reply_text,
                    'keepContact_section_line1' => $request->keepContact_section_line1,
                    'keepContact_section_line2' => $request->keepContact_section_line2,
                ]
               
            ];
            $event = $this->service->updateKeepContactSetting($param, $request->event_id);
            DB::connection('tenant')->commit();
            return $event;
        } catch (Exception $e) {
            DB::connection('tenant')->rollback();
            return response()->json(['status' => FALSE, 'msg' => 'Internal Server Error ', 'error' => $e->getMessage()], 200);
        }
    }
    
//    public function getEvent(Request $request) {
//        dd(Event::find($request->id)->event_fields);
//        $param = [
//            'a' => [
//                'aa' => 'http://google.com',
//                'ab' => 'https://google.com',
//            ],
//            'b' => [
//                'ba' => 1,
//                'bb' => 2,
//            ],
//            'c' => 3,
//            'd' => 'text',
//            'e' => 'https://google.com',
//        ];
//        $this->service->addOrUpdateEventField(Event::find($request->id), 'test_fields', $param);
//    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try{
            $param =[
                'event_uses_bluejeans_event'=>$request->event_uses_bluejeans_event,
                'event_chat '=>$request->event_chat,
                'attendee_search '=>$request->attendee_search,
                'q_a '=>$request->q_a,
                'allow_anonymous_questions ' => $request->allow_anonymous_questions,
                'auto_approve_questions'=>$request->auto_approve_questions,
                'auto_recording'=>$request->auto_recording,
                'phone_dial_in'=>$request->phone_dial_in,
                'raise_hand'=>$request->raise_hand,
                'display_attendee_count'=>$request->display_attendee_count,
            ];
            $event = $this->service->updateBlueJeansSetting($param, $request->bluejeans_settings);
            return $event;
            DB::commit();
        }catch(\Exception $e){
            DB::rollback();
        }
    } 

    public function updateRegistrationFormDetail(Request $request){

        DB::beginTransaction();
        try{
            $param =[
                    'display'                   =>$request->display, 
                    'title'                     =>$request->title,
                    'points'                    =>$request->points,
                    'event_uuid'                =>$request->event_uuid,

            ];
            
            $event = $this->service->updateRegistrationForm($param, $request->event_id);

            return $event;
            DB::commit();
        }catch(\Exception $e){
            DB::rollback();
        }

    }
 



}


 
    

    