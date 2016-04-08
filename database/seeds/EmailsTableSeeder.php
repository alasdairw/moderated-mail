<?php

use Illuminate\Database\Seeder;
use App\Email;

class EmailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        for($i=0;$i<100;$i++)
        {
            
            $send_domain = $faker->domainName;
            $to_domain = $faker->domainName;

            $from_user = $faker->username.'@'.$send_domain;
            $to_user = $faker->username.'@'.$to_domain;

            $email_copy = $faker->paragraphs(3);

            Email::create([
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
                    'direction' => $faker->randomElement(array('Recieved','Sent')),
                    'moderation_status' => $faker->randomElement(array('Queued','Accepted','Rejected')),
                    'is_read' => $faker->boolean(),
                    'is_replied' => $faker->boolean(),
                    'is_forwarded' => $faker->boolean(),
                    'is_starred' => $faker->boolean()
                    //'additional_headers' => $request->{'message-headers'}
                ]);
        }
    }
}
