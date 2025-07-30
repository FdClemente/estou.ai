<?php

namespace App\Http\Livewire;

use App\Mail\ContactMessage;
use App\Models\Biography;
use App\Models\Project;
use App\Models\Setting;
use App\Models\Skill;
use App\Models\Testimonial;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

/**
 * HomePage Livewire component
 *
 * This component powers the public facing portfolio. It loads the
 * configuration and content from the database, handles language selection and
 * submits contact form messages via email. Because it relies on
 * Livewire, the front‑end remains dynamic without page reloads when sending
 * messages.
 */
class HomePage extends Component
{
    /**
     * Current locale ("pt" or "en"). Defaults to Portuguese.
     */
    public string $locale = 'pt';

    /**
     * Contact form fields.
     */
    public string $name = '';
    public string $email = '';
    public string $message = '';

    /**
     * Flash messages for form submission.
     */
    public ?string $successMessage = null;
    public ?string $errorMessage = null;

    /**
     * Initialise the component and set the locale.
     */
    public function mount(string $locale = null): void
    {
        if ($locale && in_array($locale, ['pt', 'en'])) {
            $this->locale = $locale;
        }
    }

    /**
     * Handle updates to the locale selector. When the locale changes the
     * component triggers a redirect to the appropriate URL so the page can be
     * translated.
     */
    public function updatedLocale($value): void
    {
        if (in_array($value, ['pt', 'en'])) {
            // persist locale selection by redirecting to the same page with locale parameter
            redirect('/' . $value);
        }
    }

    /**
     * Validation rules for the contact form.
     */
    protected function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required|string',
        ];
    }

    /**
     * Send the contact form via email.
     */
    public function submit(): void
    {
        $this->validate();

        try {
            $to = config('app.contact');
            if (! empty($to)) {
                Mail::to($to)->send(new ContactMessage($this->name, $this->email, $this->message));
            }
            $this->successMessage = __('strings.submit_success');
            $this->errorMessage = null;
        } catch (\Throwable $e) {
            $this->errorMessage = __('strings.submit_error');
            $this->successMessage = null;
        }

        $this->reset(['name', 'email', 'message']);
    }

    /**
     * Render the view and pass along all content.
     */
    public function render()
    {
        app()->setLocale($this->locale);

        return view('livewire.home-page', [
            'settings' => Setting::first(),
            'biography' => Biography::first(),
            'skills' => Skill::all(),
            'projects' => Project::orderByDesc('date')->get(),
            'testimonials' => Testimonial::all(),
            'locale' => $this->locale,
        ]);
    }
}
