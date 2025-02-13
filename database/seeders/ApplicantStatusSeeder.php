<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ApplicantStatus;
class ApplicantStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $statuses = [
            ['name' => 'Applied', 'description' => 'The applicant has submitted their application.'],
            ['name' => 'Pending', 'description' => 'The application has been received but is awaiting review.'],
            ['name' => 'Under Review', 'description' => 'The application is actively being reviewed.'],
            ['name' => 'Shortlisted', 'description' => 'The applicant has been shortlisted for further evaluation.'],
            ['name' => 'Screening', 'description' => 'The application is under initial review.'],
            ['name' => 'Interviewing', 'description' => 'The applicant is being interviewed.'],
            ['name' => 'Background Check', 'description' => 'The applicant is undergoing a background or reference check.'],
            ['name' => 'Offer Extended', 'description' => 'A job offer has been sent to the applicant.'],
            ['name' => 'Offer Accepted', 'description' => 'The applicant has accepted the job offer.'],
            ['name' => 'Offer Declined', 'description' => 'The applicant has declined the job offer.'],
            ['name' => 'On Hold', 'description' => 'The application process has been temporarily paused.'],
            ['name' => 'Withdrawn', 'description' => 'The applicant has withdrawn their application.'],
            ['name' => 'Waitlisted', 'description' => 'The applicant is waitlisted for future opportunities.'],
            ['name' => 'Not Qualified', 'description' => 'The applicant does not meet the qualifications for the role.'],
            ['name' => 'In Negotiation', 'description' => 'The applicant is negotiating the terms of the offer.'],
            ['name' => 'Hired', 'description' => 'The applicant has been hired.'],
            ['name' => 'Training', 'description' => 'The applicant has been hired and is undergoing training.'],
            ['name' => 'Probation', 'description' => 'The applicant is in a probationary employment period.'],
            ['name' => 'Terminated', 'description' => 'The applicant\'s employment was terminated during or after hiring.'],
            ['name' => 'Rejected', 'description' => 'The application has been rejected.']
        ];

        ApplicantStatus::insert($statuses);
    }
}
