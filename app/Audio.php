<?php namespace App;

use DB;

class Audio extends \Eloquent {
	
	protected $table = 'audios';
	
	protected $appends = ['rows','names','locations','columns'];
	
	protected $fillable = [ 'date','tape' , 'digital' , 'title' , 'bible' , 'theme' , 'memo' , 'contact_id' , 'genre' , 'created_at' , 'updated_at' ];
	
	public static $rules = array(
	'date'=> 'required|AlphaNum',
	'tape'=> 'Integer', 
	'digital'=> 'Integer', 
	'title'=> '', 
	'bible'=> '', 
	'theme'=> '', 
	'genre'=> '', 
	'created_at'=> '', 
	'updated_at'=> '', 
	'contact_id'=> 'Integer',
	'memo'=>''
    );
	
	public $autoHydrateEntityFromInput = true;    // hydrates on new entries' validation
	public $forceEntityHydrationFromInput = true; // hydrates whenever validation is called
	public $autoPurgeRedundantAttributes = true;
	
	public function chapters()
    {
         return $this->belongsToMany('Chapter', 'audio_chapter', 'audio_id', 'chapter_id');
    }
	
	public function contact()
	{
		return $this->belongsTo('Contact', 'contact_id');
	}

	 public function spotlight()
    {
        return $this->hasOne('Spotlight', 'audios_id');
    }
	
	public static function featured()
    {
	   		return DB::table('spotlights')
            ->join('audios', 'audios.id', '=', 'spotlights.audios_id')
			->join('contacts', 'contacts.id', '=', 'audios.contact_id')
            ->select('audios.date','audios.title','audios.bible','contacts.firstname','contacts.lastname','contacts.id','contacts.image','spotlights.orderBy','contacts.suffix')
			->orderBy('spotlights.orderBy','ASC')
			->where('spotlights.active','>',0)
			->where('audios.digital','>',0)
            ->get();
    }

	public function searchAllFields($search,$per_page=15)
    {
	   		return DB::table('audios')
			->join('contacts', 'contacts.id', '=', 'audios.contact_id')
            ->select('audios.date','audios.title','audios.bible','contacts.firstname','contacts.lastname','contacts.id','contacts.image','contacts.suffix')
			->orderBy('audios.date','DESC')
			->where('audios.date', 'LIKE', '%'.$search.'%')
            ->orWhere('audios.title', 'LIKE', '%'.$search.'%')
            ->orWhere('contacts.firstname', 'LIKE', '%'.$search.'%')
			->orWhere('contacts.lastname', 'LIKE', '%'.$search.'%')
			->orWhere('audios.bible', 'LIKE', '%'.$search.'%')
			->orWhere('audios.theme', 'LIKE', '%'.$search.'%')
            ->paginate($per_page);
    }

	 public function getRowsAttribute()
    {
		return $this->orderBy('id','DESC')->paginate(15);
    }	

	public function search($search_field = NULL, $search_string = NULL)
    {
        if ($search_string == NULL || $search_field == NULL){
		return $this->orderBy('id','DESC')->paginate(15);  
		}else{
		return $this->where($search_field,'LIKE', '%'.$search_string.'%')->orderBy('id','DESC')->paginate(15);
		}
    }	
	
    public function getNamesAttribute()
    {
        return ['one'=>'Audio','many'=>'Audios','url'=>'audios'];  
    }	
   
   		public function getLocationsAttribute(){

		return ['0' => 'http://www.deliverance.me/mp3/', '1' => 'http://www.youtube.com/'];

	}
   
   public function getColumnsAttribute()
    {	   
	   return Schema::getColumnListing($this->table);
    }
	
}