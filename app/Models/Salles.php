<?php

namespace App\Models;

use Illuminate\Support\Str;
use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;

class Salles extends Model
{
    use CrudTrait;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'salles';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    protected $guarded = ['id'];
    protected $fillable = ['image','name','description','status','nbre_place'];
    // protected $hidden = [];
    // protected $dates = [];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */
    public function setImageAttribute($value)
    {
        $attribute_name = "image";
        $disk = "public"; // or use your own disk, defined in config/filesystems.php
        $destination_path = "salles"; // path relative to the disk above
        $this->uploadFileToDisk($value,$attribute_name,$disk,$destination_path);
        // dd($this->uploadFileToDisk($value,$attribute_name,$disk,$destination_path));
        // $filename=$value->getClientOriginalName();
        //     $destination_path = "img"; // path
        //     $value->move($destination_path,$filename);

    }
    // public function setImageAttribute($value)
    // {
    //     $attribute_name = "image";
    //     // or use your own disk, defined in config/filesystems.php
    //     $disk = config('backpack.base.root_disk_name');
    //     // destination path relative to the disk above
    //     $destination_path = "public/img/salles";

    //     // if the image was erased
    //     if ($value==null) {
    //         // delete the image from disk
    //         \Storage::disk($disk)->delete($this->{$attribute_name});

    //         // set null in the database column
    //         $this->attributes[$attribute_name] = null;
    //     }

    //     // if a base64 was sent, store it in the db
    //     if (Str::startsWith($value, 'data:image'))
    //     {
    //         // 0. Make the image
    //         $image = \Image::make($value)->encode('jpg', 90);

    //         // 1. Generate a filename.
    //         $filename = md5($value.time()).'.jpg';

    //         // 2. Store the image on disk.
    //         \Storage::disk($disk)->put($destination_path.'/'.$filename, $image->stream());

    //         // 3. Delete the previous image, if there was one.
    //         \Storage::disk($disk)->delete($this->{$attribute_name});

    //         // 4. Save the public path to the database
    //         // but first, remove "public/" from the path, since we're pointing to it
    //         // from the root folder; that way, what gets saved in the db
    //         // is the public URL (everything that comes after the domain name)
    //         $public_destination_path = Str::replaceFirst('public/', '', $destination_path);
    //         $this->attributes[$attribute_name] = $public_destination_path.'/'.$filename;
    //     }
    // }
    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */
    public function user()
    {
        return $this->belongsToMany('App\Models\Users','salles_has_users','salle_id','user_id');
    }
    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | ACCESSORS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */
}
