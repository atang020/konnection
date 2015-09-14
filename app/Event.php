<?php namespace App;

use Carbon\Carbon;

use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Event
 *
 * Events that end up on the calendar
 */
class Event extends Model implements SluggableInterface
{

    use SoftDeletes, SluggableTrait;

    protected $sluggable = array(
        'build_from' => 'title',
        'save_to'    => 'slug',
    );

    protected $dates = array(
        'start_time',
        'end_time',
        'open_time',
        'close_time'
    );

    protected $guarded = array('id');


    /**
     * Functions
     */

    /**
     * Checks whether or not the event is open for registration
     *
     * @return bool
     */
    public function isOpen()
    {
        return Carbon::now() > $this->open_time && Carbon::now() < $this->close_time;
    }

    /**
     * Checks whether or not the user is registered for the event
     *
     * @param $id User ID
     * @return bool
     */
    public function isRegistered($id)
    {
        return (bool) $this->registrations()->where('user_id', '=', $id)->first();
    }


    /**
     * Relationships
     */

    /**
     * Category that the event belongs to
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo('App\EventCategory');
    }

    /**
     * Event registrations
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function registrations()
    {
        return $this->hasMany('App\EventRegistration');
    }

    /**
     * Guest registrations
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function guests()
    {
        return $this->hasMany('App\GuestRegistration');
    }

    /**
     * Activity entries generated by event
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function activities()
    {
        return $this->hasMany('App\Activity');
    }

    /**
     * Tags assigned to event
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tags()
    {
        return $this->belongsToMany('App\EventTag', 'events_assigned_tags', 'event_id', 'tag_id');
    }

    /**
     * Creator of the event
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function creator()
    {
        return $this->belongsTo('App\User', 'creator_id');
    }

    /**
     * Chair of the event.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function chair() {
        return $this->belongsTo('App\User', 'chair_id');
    }

    /**
     * CERF associated with this event.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cerfs() {
        return $this->hasMany('App\Cerf');
    }

    /**
     * Returns all registrations as a single uniform collection, sorted by registration date.
     *
     * @return \Illuminate\Support\Collection
     */
    public function allRegistrations() {
        $registrations = $this->registrations()->getResults();

        $guests = $this->guests()->getResults();

        $results = [];

        foreach ($registrations as $registration) {
            $results[] = [
                'name' => $registration->user->first_name . ' ' . $registration->user->last_name,
                'avatar' => $registration->user->avatar->url(),
                'phone' => $registration->user->phone,
                'created_at' => $registration->created_at
            ];
        }

        foreach ($guests as $guest) {
            $results[] = [
                'name' => $guest->first_name . ' ' . $guest->last_name,
                'phone' => $guest->phone,
                'created_at' => $guest->created_at
            ];
        }

        $results = collect($results)->sortBy('created_at');

        return $results;
    }

    /**
     * Sets title of event
     * @param $title
     */
    public function setTitleAttribute($title)
    {
        $this->attributes['title'] = strip_tags($title);
    }

    /**
     * Sets location of event
     * @param $location_event
     */
    public function setEventLocationAttribute($event_location)
    {
        $this->attributes['event_location'] = strip_tags($event_location);
    }


    /**
     * Mutators
     */

    /**
     * Sets meeting location
     * @param $meeting_location
     */
    public function setMeetingLocationAttribute($meeting_location)
    {
        $this->attributes['meeting_location'] = strip_tags($meeting_location);
    }

    public function setStartTimeAttribute($value)
    {
        $this->attributes['start_time'] = Carbon::parse($value);
    }

    public function setEndTimeAttribute($value)
    {
        $this->attributes['end_time'] = Carbon::parse($value);
    }

    public function setOpenTimeAttribute($value)
    {
        $this->attributes['open_time'] = Carbon::parse($value);
    }

    public function setCloseTimeAttribute($value)
    {
        $this->attributes['close_time'] = Carbon::parse($value);
    }

    // TODO Consider adding get mutators for event times.
}
