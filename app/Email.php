<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;




class Email extends Model
{
    //
    use SoftDeletes;
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at','date'];

    protected $guarded = ['id','created_at','updated_at','deleted_at'];


    public static function fake_new_approved_email()
    {
        $faker = \Faker\Factory::create();
        $send_domain = $faker->domainName;
            $to_domain = $faker->domainName;

            $from_user = $faker->username.'@'.$send_domain;
            $to_user = $faker->username.'@'.$to_domain;

            $email_copy = $faker->paragraphs(3);

            $email = Email::create([
                    'subject' => $faker->words(4,true),
                    'date'    => $faker->dateTimeBetween('-30 days','now'),
                    'from'    => $faker->name.' <'.$from_user.'>',
                    'to'      => $faker->name.' <'.$to_user.'>',
                    'sender'  => $from_user,
                    'recipient'  => $to_user,
                    'message_id'  => $faker->bothify('#####').'.'.$faker->bothify('#####').'@'.$send_domain ,
                    'reply_to_message_id'  => $faker->bothify('#####').'.'.$faker->bothify('#####').'@'.$to_domain,
                    'body_html' => '<p>'.implode('</p><p>',$email_copy).'</p>',
                    'body_plain' => implode('\n\n',$email_copy),
                    'direction' => 'Recieved',
                    'moderation_status' => 'Accepted',
                    'is_read' => $faker->boolean(),
                    'is_replied' => $faker->boolean(),
                    'is_forwarded' => $faker->boolean(),
                    'is_starred' => $faker->boolean()
                    //'additional_headers' => $request->{'message-headers'}
                ]);
            event(new \App\Events\NewEmail($email));
            return $email;
    }

     /**
     * Scope a query to only include inbound email.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeRecieved($query)
    {
        return $query->where('direction', 'Recieved');
    }

    /**
     * Scope a query to only include outbound email.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeSent($query)
    {
        return $query->where('direction', 'Sent');
    }

    /**
     * Scope a query to only include unmoderated email.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeQueued($query)
    {
        return $query->where('moderation_status', 'Queued');
    }

    /**
     * Scope a query to only include moderater-approved email.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeAccepted($query)
    {
        return $query->where('moderation_status', 'Accepted');
    }

    /**
     * Scope a query to only include moderater-approved email.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeRejected($query)
    {
        return $query->where('moderation_status', 'Rejected');
    }


}
