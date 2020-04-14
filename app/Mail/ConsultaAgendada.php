<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\User;
use App\Patient;
use App\Schedule;

class ConsultaAgendada extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $user;
    public $patient;
    public $schedule;
    public $date;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, Patient $patient,Schedule $schedule, $date)
    {
        $this->user = $user;
        $this->patient = $patient;
        $this->schedule = $schedule;
        $this->date = $date;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.consulta_agendada')
        ->with([
            'user' => $this->user,
            'patient' => $this->patient,
            'date' => $this->date,
            'hour_start' => $this->schedule->hour_start,
            'hour_end' => $this->schedule->hour_end,
        ]);
    }
}
