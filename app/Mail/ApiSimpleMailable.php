<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Sichikawa\LaravelSendgridDriver\SendGrid;

class ApiSimpleMailable extends Mailable
{
    use Queueable, SerializesModels, SendGrid;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->view([], [
                'name' => 's-ichikawa'
            ])
            ->to(env('AUTHOR_EMAIL'), 'tester')
            ->subject('api sample mailable')
            ->sendgrid([
                'personalizations' => [
                    [
                        'dynamic_template_data' => [
                            'title' => 'Test Title',
                            'name' => 's-ichikawa',
                        ],
                    ],
                ],
                'categories' => [
                    'api_simple_mailable'
                ],
                'template_id' => config('services.sendgrid.templates.dynamic_sample'),
            ]);
    }
}
